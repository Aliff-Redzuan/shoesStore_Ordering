<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Viola Shoe Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            magenta: '#C2005F',
                            gold: '#F6B000',
                            darkgold: '#B87900'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased text-gray-900">

    <!-- Header -->
    <header class="bg-brand-magenta sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between gap-6">
            <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3 shrink-0">
                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-md overflow-hidden">
                    <img src="{{ asset('images/ViolaLogo.png') }}" alt="Viola Shoe Store Logo" class="w-full h-full object-cover">
                </div>
                <div class="text-white">
                    <h2 class="font-black text-xl leading-none tracking-tight">Viola</h2>
                    <p class="text-[10px] text-brand-gold font-semibold uppercase tracking-wider">Shoe Store</p>
                </div>
            </a>
            <h1 class="text-white text-2xl font-bold flex-1">Order Confirmation</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 py-8">
        <!-- Success Message -->
        <div class="mb-8">
            <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded-lg">
                <div class="flex items-start gap-4">
                    <div class="text-4xl">✓</div>
                    <div>
                        <h2 class="text-2xl font-bold text-green-800 mb-2">Order Placed Successfully!</h2>
                        <p class="text-green-700">Thank you for your purchase. Your order is confirmed and ready for pickup.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Order Info & Items -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Order Number Card -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-sm text-gray-500 uppercase font-semibold mb-2">Order Number</p>
                    <p class="text-3xl font-black text-brand-magenta mb-2">{{ $order->order_number }}</p>
                    <p class="text-sm text-gray-600">Order placed on {{ $order->created_at->format('M d, Y') }} at {{ $order->created_at->format('g:i A') }}</p>
                </div>

                <!-- Customer Information -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Customer Information</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Name</p>
                            <p class="text-gray-900 font-semibold">{{ $order->customer_name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Email</p>
                            <p class="text-gray-900">{{ $order->customer_email }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Phone</p>
                            <p class="text-gray-900">{{ $order->customer_phone }}</p>
                        </div>
                    </div>
                </div>

                <!-- Delivery Information -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Delivery Information</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Pickup Location</p>
                            <p class="text-gray-900 font-semibold">Store Pickup</p>
                            <p class="text-sm text-gray-600">123 Shoe Street, Shopping Mall</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Payment Method</p>
                            <p class="text-gray-900 font-semibold">💵 Cash at Pickup</p>
                            <p class="text-sm text-gray-600">Please bring the exact amount for faster checkout</p>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Order Items</h3>
                    <div class="space-y-4">
                        @foreach($order->items as $item)
                            <div class="flex justify-between items-center pb-4 border-b border-gray-200 last:border-b-0">
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">{{ $item->product_name }}</p>
                                    <p class="text-sm text-gray-500">{{ $item->product_brand }} - Size {{ $item->size }}</p>
                                    <p class="text-xs text-gray-400 mt-1">Quantity: {{ $item->quantity }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-600">${{ number_format($item->price, 2) }} each</p>
                                    <p class="font-bold text-brand-magenta">${{ number_format($item->subtotal, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- What's Next -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">What's Next?</h3>
                    <ol class="space-y-3 text-blue-900">
                        <li class="flex gap-3">
                            <span class="font-bold flex-shrink-0">1.</span>
                            <span>Confirmation email sent to {{ $order->customer_email }}</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="font-bold flex-shrink-0">2.</span>
                            <span>We'll prepare your order for pickup</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="font-bold flex-shrink-0">3.</span>
                            <span>Visit our store and show this order number</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="font-bold flex-shrink-0">4.</span>
                            <span>Pay cash and collect your items</span>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Right Column - Order Summary (Sticky) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Order Summary</h3>

                    <div class="space-y-3 pb-6 border-b border-gray-200 mb-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="text-gray-900 font-semibold">${{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Tax (10%):</span>
                            <span class="text-gray-900 font-semibold">${{ number_format($order->tax, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Shipping:</span>
                            <span class="text-green-600 font-semibold">FREE</span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-gray-900">Total:</span>
                            <span class="text-3xl font-black text-brand-magenta">${{ number_format($order->total, 2) }}</span>
                        </div>
                    </div>

                    <!-- Status Badge -->
                    <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <p class="text-xs text-yellow-800 font-semibold uppercase">Current Status</p>
                        <p class="text-lg font-bold text-yellow-700 mt-1">⏱ Pending</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <a href="{{ route('customer.shop') }}" class="w-full py-3 rounded-lg font-bold text-white bg-brand-magenta hover:bg-[#A0004E] transition-all text-center block">
                            Continue Shopping
                        </a>
                        <a href="{{ route('customer.dashboard') }}" class="w-full py-3 rounded-lg font-bold text-brand-magenta border-2 border-brand-magenta hover:bg-pink-50 transition-all text-center">
                            Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
