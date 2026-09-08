<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Viola Shoe Store</title>
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
            <h1 class="text-white text-2xl font-bold flex-1">Shopping Cart</h1>
            <a href="{{ route('customer.shop') }}" class="text-white hover:text-brand-gold font-semibold">Continue Shopping</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="border-b border-gray-200 p-6">
                            <h2 class="text-xl font-bold text-gray-900">Order Summary ({{ count($cart) }} items)</h2>
                        </div>

                        <div class="divide-y divide-gray-200">
                            @foreach($cart as $key => $item)
                                <div class="p-6 flex items-center justify-between hover:bg-gray-50 transition">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $item['name'] }}</h3>
                                        <p class="text-sm text-gray-500">{{ $item['brand'] }}</p>
                                        <p class="text-sm text-gray-600 mt-1">Size: <span class="font-semibold">{{ $item['size'] }}</span></p>
                                        <p class="text-sm text-gray-600">Unit Price: <span class="font-semibold text-brand-magenta">${{ number_format($item['price'], 2) }}</span></p>
                                    </div>

                                    <div class="flex items-center gap-4 ml-4">
                                        <div class="text-center">
                                            <p class="text-sm text-gray-500">Qty</p>
                                            <p class="text-2xl font-bold text-brand-magenta">{{ $item['quantity'] }}</p>
                                        </div>

                                        <div class="text-right">
                                            <p class="text-sm text-gray-500">Subtotal</p>
                                            <p class="text-lg font-bold text-brand-magenta">${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                                        </div>

                                        <form action="{{ route('customer.cart.remove', $key) }}" method="POST" class="ml-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-sm">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Order Total & Checkout -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-20">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Order Total</h2>

                        <div class="space-y-3 pb-6 border-b border-gray-200">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal:</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping:</span>
                                <span class="text-green-600 font-semibold">FREE</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Tax (Estimated):</span>
                                <span>${{ number_format($total * 0.1, 2) }}</span>
                            </div>
                        </div>

                        <div class="pt-6 mb-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-lg font-bold text-gray-900">Total:</span>
                                <span class="text-3xl font-black text-brand-magenta">${{ number_format($total * 1.1, 2) }}</span>
                            </div>
                        </div>

                        <a href="{{ route('customer.checkout.show') }}" class="block w-full text-center bg-brand-magenta text-white py-3 rounded-lg font-bold hover:bg-[#A0004E] transition-all shadow-md">
                            Proceed to Checkout
                        </a>

                        <a href="{{ route('customer.shop') }}" class="block w-full text-center mt-3 py-3 rounded-lg font-semibold text-brand-magenta border-2 border-brand-magenta hover:bg-brand-magenta hover:text-white transition-all">
                            Continue Shopping
                        </a>

                        <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                            <p class="text-xs text-blue-800">
                                <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                All orders include free shipping and a 30-day return guarantee.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Your cart is empty</h2>
                <p class="text-gray-600 mb-6">Add some amazing shoes to get started!</p>
                <a href="{{ route('customer.shop') }}" class="inline-block bg-brand-magenta text-white px-8 py-3 rounded-lg font-bold hover:bg-[#A0004E] transition-all">
                    Shop Now
                </a>
            </div>
        @endif
    </main>

</body>
</html>
