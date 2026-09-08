<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display main customer dashboard.
     */
    public function index()
    {
        $orders = Order::with('items')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('customer.index', compact('orders'));
    }

    /**
     * Display customer orders page.
     */
    public function orders(Request $request)
    {
        $status = strtolower(trim($request->input('status', 'all')));

        $query = Order::with('items')
            ->where('user_id', auth()->id());

        if ($status === 'pending') {
            $query->whereIn('status', ['pending', 'processing']);
        } elseif ($status === 'shipped') {
            $query->where('status', 'shipped');
        } elseif ($status === 'completed') {
            $query->whereIn('status', ['completed', 'delivered']);
        }

        $orders = $query->latest()->get();

        return view('customer.orders', compact('orders', 'status'));
    }

    /**
     * Display a single order detail page.
     */
    public function showOrder($id)
    {
        $order = Order::with('items')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('customer.orders', [
            'orders' => collect([$order])
        ]);
    }

    /**
     * Display tracking page for a single order.
     */
    public function trackOrder($id)
    {
        $order = Order::with('items')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('customer.orders', [
            'orders' => collect([$order])
        ]);
    }

    /**
     * Display customer reviews page.
     */
    public function reviews()
    {
        $reviews = [];

        return view('customer.reviews', compact('reviews'));
    }

    /**
     * Display customer shop page.
     */
    public function shop(Request $request)
    {
        $search = trim($request->input('search', ''));

        $products = Product::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('brand', 'like', "%{$search}%");
                });
            })
            ->get();

        return view('customer.shop', compact('products', 'search'));
    }

    /**
     * Display customer settings page.
     */
    public function settings()
    {
    $user = auth()->user();
    return view('customer.settings', compact('user'));
    }

    /**
     * Handle review submission.
     */
    public function storeReview(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'rating'   => 'required|integer|min:1|max:5',
            'comment'  => 'required|string',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Review submitted successfully!');
    }

    /**
     * Delete a review.
     */
    public function destroyReview($id)
    {
        return redirect()
            ->route('customer.reviews.index')
            ->with('success', 'Review removed.');
    }

    /**
     * Add a product to the cart.
     */
    public function addToCart(Request $request)
    {
        if (!auth()->check()) {
            return redirect()
                ->route('login')
                ->with(
                    'login_required',
                    'Please log in first before adding items to your cart.'
                );
        }

        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'size'       => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        $key = $request->product_id . '_' . $request->size;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += 1;
        } else {
            $product = Product::findOrFail($request->product_id);

            $cart[$key] = [
                'product_id' => $request->product_id,
                'name'       => $product->name,
                'brand'      => $product->brand,
                'price'      => $product->price,
                'size'       => $request->size,
                'quantity'   => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('customer.shop')
            ->with('success', 'Product added to cart successfully!');
    }

    /**
     * Display the cart.
     */
    public function viewCart()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('customer.cart', compact('cart', 'total'));
    }

    /**
     * Remove item from cart.
     */
    public function removeFromCart($key)
    {
        $cart = session()->get('cart', []);

        unset($cart[$key]);

        session()->put('cart', $cart);

        return redirect()
            ->route('customer.cart.index')
            ->with('success', 'Item removed from cart.');
    }

    /**
     * Show checkout form.
     */
    public function showCheckout()
    {
        if (!auth()->check()) {
            return redirect()
                ->route('login')
                ->with(
                    'login_required',
                    'Please log in before checking out.'
                );
        }

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('customer.shop')
                ->with('error', 'Your cart is empty!');
        }

        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $tax = $subtotal * 0.1;

        $total = $subtotal + $tax;

        return view(
            'customer.checkout',
            compact('cart', 'subtotal', 'tax', 'total')
        );
    }

    /**
     * Process checkout and create order.
     */
    public function processCheckout(Request $request)
    {
        if (!auth()->check()) {
            return redirect()
                ->route('login')
                ->with(
                    'login_required',
                    'Please log in before placing your order.'
                );
        }

        $request->validate([
            'customer_name'   => 'required|string|max:255',
            'customer_email'  => 'required|email',
            'customer_phone'  => 'required|string',
            'pickup_location' => 'required|in:store',
            'payment_method'  => 'required|in:cash',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('customer.shop')
                ->with('error', 'Your cart is empty!');
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate totals
        |--------------------------------------------------------------------------
        */

        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $tax = $subtotal * 0.1;

        $total = $subtotal + $tax;

        /*
        |--------------------------------------------------------------------------
        | Generate order number
        |--------------------------------------------------------------------------
        */

        $orderNumber = 'ORD-'
            . date('Ymd')
            . '-'
            . strtoupper(substr(uniqid(), -6));

        /*
        |--------------------------------------------------------------------------
        | Create order
        |--------------------------------------------------------------------------
        */

        $order = Order::create([
            'user_id'        => auth()->id(),
            'order_number'   => $orderNumber,
            'customer_name'  => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'pickup_location'=> $request->pickup_location,
            'payment_method' => $request->payment_method,
            'status'         => 'pending',
            'subtotal'       => $subtotal,
            'tax'            => $tax,
            'total'          => $total,
            'notes'          => $request->notes ?? null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create order items
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'      => $order->id,
                'product_id'    => $item['product_id'],
                'product_name'  => $item['name'],
                'product_brand' => $item['brand'],
                'size'          => $item['size'],
                'quantity'      => $item['quantity'],
                'price'         => $item['price'],
                'subtotal'      => $item['price'] * $item['quantity'],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Clear cart
        |--------------------------------------------------------------------------
        */

        session()->forget('cart');

        /*
        |--------------------------------------------------------------------------
        | Redirect to confirmation
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('customer.order.confirmation', $order->id)
            ->with(
                'success',
                'Order placed successfully!'
            );
    }

    /**
     * Show order confirmation page.
     */
    public function orderConfirmation($orderId)
    {
        $order = Order::with('items')
            ->where('user_id', auth()->id())
            ->findOrFail($orderId);

        return view(
            'customer.order-confirmation',
            compact('order')
        );
    }
    
}