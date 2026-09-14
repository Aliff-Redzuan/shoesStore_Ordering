<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display main customer dashboard.
     */
    public function index()
    {
        $orders = Order::with('items')
            ->where(
                'user_id',
                auth()->id()
            )
            ->latest()
            ->get();

        $reviewedItemIds = Review::where(
            'user_id',
            auth()->id()
        )
        ->pluck(
            'order_item_id'
        )
        ->toArray();

        return view(
            'customer.index',
            compact(
                'orders',
                'reviewedItemIds'
            )
        );
    }


    /**
     * Display customer orders page.
     */
    public function orders(Request $request)
    {
        $status = strtolower(
            trim(
                $request->input(
                    'status',
                    'all'
                )
            )
        );


        $query = Order::with('items')
            ->where(
                'user_id',
                auth()->id()
            );


        if ($status === 'pending') {

            $query->whereIn(
                'status',
                [
                    'pending',
                    'processing'
                ]
            );

        } elseif ($status === 'shipped') {

            $query->where(
                'status',
                'shipped'
            );

        } elseif ($status === 'completed') {

            $query->whereIn(
                'status',
                [
                    'completed',
                    'delivered'
                ]
            );
        }


        $orders =
            $query
                ->latest()
                ->get();


        /*
        |--------------------------------------------------------------------------
        | Get Already Reviewed Order Items
        |--------------------------------------------------------------------------
        */

        $reviewedItemIds =
            Review::where(
                'user_id',
                auth()->id()
            )
            ->pluck(
                'order_item_id'
            )
            ->toArray();


        return view(
            'customer.orders',
            compact(
                'orders',
                'status',
                'reviewedItemIds'
            )
        );
    }


    /**
     * Display a single order detail page.
     */
    public function showOrder($id)
    {
        $order = Order::with('items')
            ->where(
                'user_id',
                auth()->id()
            )
            ->findOrFail($id);


        return view(
            'customer.orders_show',
            compact('order')
        );
    }


    /**
     * Display tracking page for a single order.
     */
    public function trackOrder($id)
    {
        $order = Order::with('items')
            ->where(
                'user_id',
                auth()->id()
            )
            ->findOrFail($id);


        return view(
            'customer.orders_track',
            compact('order')
        );
    }


    /**
     * Display customer reviews page.
     */
    public function reviews()
    {
        $reviews = Review::with([
            'product',
            'order'
        ])
        ->where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->get();


        return view(
            'customer.reviews',
            compact('reviews')
        );
    }


    /**
     * Store a customer review.
     */
    public function storeReview(
        Request $request
    ) {

        /*
        |--------------------------------------------------------------------------
        | Validate Basic Request
        |--------------------------------------------------------------------------
        */

        $validated =
            $request->validate([

                'order_id' => [
                    'required',
                    'integer',
                    'exists:orders,id'
                ],

                'order_item_id' => [
                    'required',
                    'integer',
                    'exists:order_items,id'
                ],

                'rating' => [
                    'required',
                    'integer',
                    'min:1',
                    'max:5'
                ],

                'comment' => [
                    'required',
                    'string',
                    'max:2000'
                ],

            ]);


        /*
        |--------------------------------------------------------------------------
        | Make Sure Order Belongs To Customer
        |--------------------------------------------------------------------------
        */

        $order = Order::where(
            'id',
            $validated['order_id']
        )
        ->where(
            'user_id',
            auth()->id()
        )
        ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Only Delivered / Completed Orders Can Be Reviewed
        |--------------------------------------------------------------------------
        */

        $orderStatus =
            strtolower(
                trim(
                    $order->status
                )
            );


        if (
            !in_array(
                $orderStatus,
                [
                    'delivered',
                    'completed'
                ],
                true
            )
        ) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'You can only review items after the order has been delivered.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Verify Order Item Belongs To This Order
        |--------------------------------------------------------------------------
        */

        $orderItem =
            OrderItem::where(
                'id',
                $validated['order_item_id']
            )
            ->where(
                'order_id',
                $order->id
            )
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Prevent Duplicate Review
        |--------------------------------------------------------------------------
        */

        $alreadyReviewed =
            Review::where(
                'user_id',
                auth()->id()
            )
            ->where(
                'order_item_id',
                $orderItem->id
            )
            ->exists();


        if ($alreadyReviewed) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'You have already reviewed this item.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Create Review
        |--------------------------------------------------------------------------
        */

        Review::create([

            'user_id' =>
                auth()->id(),

            'order_id' =>
                $order->id,

            'order_item_id' =>
                $orderItem->id,

            'product_id' =>
                $orderItem->product_id,

            'rating' =>
                $validated['rating'],

            'comment' =>
                $validated['comment'],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Return Success
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->back()
            ->with(
                'success',
                'Your review has been submitted successfully!'
            );
    }


    /**
     * Delete customer review.
     */
    public function destroyReview($id)
    {
        $review =
            Review::where(
                'id',
                $id
            )
            ->where(
                'user_id',
                auth()->id()
            )
            ->firstOrFail();


        $review->delete();


        return redirect()
            ->route(
                'customer.reviews.index'
            )
            ->with(
                'success',
                'Review removed successfully.'
            );
    }


    /**
     * Display customer shop page.
     */
    public function shop(
        Request $request
    ) {

        $search =
            trim(
                $request->input(
                    'search',
                    ''
                )
            );


        $products =
            Product::query()
                ->when(
                    $search !== '',
                    function ($query)
                    use ($search) {

                        $query->where(
                            function ($q)
                            use ($search) {

                                $q->where(
                                    'name',
                                    'like',
                                    '%' . $search . '%'
                                )

                                ->orWhere(
                                    'category',
                                    'like',
                                    '%' . $search . '%'
                                )

                                ->orWhere(
                                    'brand',
                                    'like',
                                    '%' . $search . '%'
                                );

                            }
                        );
                    }
                )
                ->get();


        return view(
            'customer.shop',
            compact(
                'products',
                'search'
            )
        );
    }


    /**
     * Display customer settings.
     */
    public function settings()
    {
        $user =
            auth()->user();


        return view(
            'customer.settings',
            compact('user')
        );
    }


    /**
     * Update customer settings.
     */
    public function updateSettings(
        Request $request
    ) {

        $validated =
            $request->validate([

                'name' => [
                    'required',
                    'string',
                    'max:255'
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255'
                ],

                'phone' => [
                    'nullable',
                    'string',
                    'max:30'
                ],

                'address' => [
                    'nullable',
                    'string',
                    'max:1000'
                ],

            ]);


        $user =
            auth()->user();


        $user->name =
            $validated['name'];

        $user->email =
            $validated['email'];

        $user->phone =
            $validated['phone'] ?? null;

        $user->address =
            $validated['address'] ?? null;


        $user->save();


        return redirect()
            ->route(
                'customer.settings'
            )
            ->with(
                'success',
                'Account information updated successfully.'
            );
    }


    /**
     * Add product to cart.
     */
    public function addToCart(
        Request $request
    ) {

        $validated =
            $request->validate([

                'product_id' => [
                    'required',
                    'integer',
                    'exists:products,id'
                ],

                'size' => [
                    'required',
                    'string',
                    'max:50'
                ],

            ]);


        $cart =
            session()->get(
                'cart',
                []
            );


        $key =
            $validated['product_id']
            . '_'
            . $validated['size'];


        if (
            isset(
                $cart[$key]
            )
        ) {

            $cart[$key]['quantity']++;

        } else {

            $product =
                Product::findOrFail(
                    $validated['product_id']
                );


            $cart[$key] = [

                'product_id' =>
                    $product->id,

                'name' =>
                    $product->name,

                'brand' =>
                    $product->brand,

                'price' =>
                    $product->price,

                'size' =>
                    $validated['size'],

                'quantity' =>
                    1,

            ];
        }


        session()->put(
            'cart',
            $cart
        );


        return redirect()
            ->route(
                'customer.shop'
            )
            ->with(
                'success',
                'Product added to cart successfully!'
            );
    }


    /**
     * Display cart.
     */
    public function viewCart()
    {
        $cart =
            session()->get(
                'cart',
                []
            );


        $total =
            collect($cart)
                ->sum(
                    function ($item) {

                        return
                            $item['price']
                            *
                            $item['quantity'];

                    }
                );


        return view(
            'customer.cart',
            compact(
                'cart',
                'total'
            )
        );
    }


    /**
     * Remove cart item.
     */
    public function removeFromCart($key)
    {
        $cart =
            session()->get(
                'cart',
                []
            );


        unset(
            $cart[$key]
        );


        session()->put(
            'cart',
            $cart
        );


        return redirect()
            ->route(
                'customer.cart.index'
            )
            ->with(
                'success',
                'Item removed from cart.'
            );
    }


    /**
     * Show checkout.
     */
    public function showCheckout()
    {
        if (
            !auth()->check()
        ) {

            return redirect()
                ->route('login')
                ->with(
                    'login_required',
                    'Please log in before checking out.'
                );
        }


        $cart =
            session()->get(
                'cart',
                []
            );


        if (
            empty($cart)
        ) {

            return redirect()
                ->route(
                    'customer.shop'
                )
                ->with(
                    'error',
                    'Your cart is empty!'
                );
        }


        $subtotal =
            collect($cart)
                ->sum(
                    function ($item) {

                        return
                            $item['price']
                            *
                            $item['quantity'];

                    }
                );


        $tax =
            $subtotal * 0.10;


        $total =
            $subtotal + $tax;


        $user =
            auth()->user();


        return view(
            'customer.checkout',
            compact(
                'cart',
                'subtotal',
                'tax',
                'total',
                'user'
            )
        );
    }


    /**
     * Process checkout.
     */
    public function processCheckout(
        Request $request
    ) {

        if (
            !auth()->check()
        ) {

            return redirect()
                ->route('login');
        }


        $validated =
            $request->validate([

                'customer_name' => [
                    'required',
                    'string',
                    'max:255'
                ],

                'customer_email' => [
                    'required',
                    'email',
                    'max:255'
                ],

                'customer_phone' => [
                    'required',
                    'string',
                    'max:30'
                ],

                'pickup_location' => [
                    'required',
                    'in:home,store'
                ],

                'payment_method' => [
                    'required',
                    'in:cash_on_delivery,cash_on_pickup,online_payment'
                ],

                'delivery_address' => [
                    'nullable',
                    'string',
                    'max:1000'
                ],

                'notes' => [
                    'nullable',
                    'string',
                    'max:2000'
                ],

            ]);


        /*
        |--------------------------------------------------------------------------
        | Validate Home Delivery
        |--------------------------------------------------------------------------
        */

        if (
            $validated['pickup_location']
            === 'home'
        ) {

            if (
                $validated['payment_method']
                !== 'cash_on_delivery'
            ) {

                return redirect()
                    ->back()
                    ->withErrors([
                        'payment_method' =>
                            'Home delivery currently supports Cash on Delivery only.'
                    ])
                    ->withInput();
            }


            if (
                empty(
                    trim(
                        $validated['delivery_address']
                        ?? ''
                    )
                )
            ) {

                return redirect()
                    ->back()
                    ->withErrors([
                        'delivery_address' =>
                            'Delivery address is required for home delivery.'
                    ])
                    ->withInput();
            }

        }


        /*
        |--------------------------------------------------------------------------
        | Validate Store Pickup
        |--------------------------------------------------------------------------
        */

        if (
            $validated['pickup_location']
            === 'store'
        ) {

            if (
                !in_array(
                    $validated['payment_method'],
                    [
                        'cash_on_pickup',
                        'online_payment'
                    ],
                    true
                )
            ) {

                return redirect()
                    ->back()
                    ->withErrors([
                        'payment_method' =>
                            'Please select a valid payment method for store pickup.'
                    ])
                    ->withInput();
            }
        }


        $cart =
            session()->get(
                'cart',
                []
            );


        if (
            empty($cart)
        ) {

            return redirect()
                ->route(
                    'customer.shop'
                )
                ->with(
                    'error',
                    'Your cart is empty!'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Rebuild Prices From Database
        |--------------------------------------------------------------------------
        */

        $subtotal =
            0;


        foreach (
            $cart as $key => $cartItem
        ) {

            $product =
                Product::findOrFail(
                    $cartItem['product_id']
                );


            $cart[$key]['name'] =
                $product->name;

            $cart[$key]['brand'] =
                $product->brand;

            $cart[$key]['price'] =
                $product->price;


            $subtotal +=
                (
                    (float) $product->price
                    *
                    (int) $cartItem['quantity']
                );
        }


        $tax =
            $subtotal * 0.10;


        $total =
            $subtotal + $tax;


        /*
        |--------------------------------------------------------------------------
        | Generate Order Number
        |--------------------------------------------------------------------------
        */

        $orderNumber =
            'VIO-'
            . now()->format('YmdHis')
            . '-'
            . strtoupper(
                substr(
                    uniqid(),
                    -5
                )
            );


        /*
        |--------------------------------------------------------------------------
        | Create Order
        |--------------------------------------------------------------------------
        */

        $order =
            Order::create([

                'user_id' =>
                    auth()->id(),

                'order_number' =>
                    $orderNumber,

                'customer_name' =>
                    $validated['customer_name'],

                'customer_email' =>
                    $validated['customer_email'],

                'customer_phone' =>
                    $validated['customer_phone'],

                'pickup_location' =>
                    $validated['pickup_location'],

                'payment_method' =>
                    $validated['payment_method'],

                'status' =>
                    'pending',

                'subtotal' =>
                    $subtotal,

                'tax' =>
                    $tax,

                'total' =>
                    $total,

                'notes' =>
                    $validated['notes'] ?? null,

            ]);


        /*
        |--------------------------------------------------------------------------
        | Add Delivery Address To Notes
        |--------------------------------------------------------------------------
        */

        if (
            $validated['pickup_location']
            === 'home'
            &&
            !empty(
                $validated['delivery_address']
            )
        ) {

            $deliveryNote =
                'Delivery Address: '
                . $validated['delivery_address'];


            $existingNotes =
                trim(
                    $validated['notes'] ?? ''
                );


            $order->notes =
                $existingNotes !== ''

                    ? $deliveryNote
                        . "\n\nNotes: "
                        . $existingNotes

                    : $deliveryNote;


            $order->save();
        }


        /*
        |--------------------------------------------------------------------------
        | Create Order Items
        |--------------------------------------------------------------------------
        */

        foreach (
            $cart as $item
        ) {

            OrderItem::create([

                'order_id' =>
                    $order->id,

                'product_id' =>
                    $item['product_id'],

                'product_name' =>
                    $item['name'],

                'product_brand' =>
                    $item['brand'],

                'size' =>
                    $item['size'],

                'quantity' =>
                    $item['quantity'],

                'price' =>
                    $item['price'],

                'subtotal' =>
                    (
                        $item['price']
                        *
                        $item['quantity']
                    ),

            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Clear Cart
        |--------------------------------------------------------------------------
        */

        session()->forget(
            'cart'
        );


        /*
        |--------------------------------------------------------------------------
        | Confirmation
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'customer.order.confirmation',
                $order->id
            )
            ->with(
                'success',
                'Order placed successfully!'
            );
    }


    /**
     * Display order confirmation.
     */
    public function orderConfirmation(
        $orderId
    ) {

        $order =
            Order::with('items')
                ->where(
                    'user_id',
                    auth()->id()
                )
                ->findOrFail(
                    $orderId
                );


        return view(
            'customer.order-confirmation',
            compact('order')
        );
    }
}