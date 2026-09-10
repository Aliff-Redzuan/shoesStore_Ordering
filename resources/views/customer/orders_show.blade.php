<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Details - Viola Shoe Store</title>

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


<body class="bg-gray-50 min-h-screen font-sans antialiased text-gray-900 flex flex-col md:flex-row">


    <!-- =========================================================
         LEFT SIDEBAR
    ========================================================== -->
    <aside class="w-full md:w-64 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col justify-between min-h-screen">

        <div>

            <!-- Logo / Branding -->
            <div class="p-6 border-b border-gray-100 flex items-center gap-3 bg-brand-magenta/5">

                <div class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-sm overflow-hidden">

                    <img
                        src="{{ asset('images/ViolaLogo.png') }}"
                        alt="Viola Shoe Store Logo"
                        class="w-full h-full object-cover"
                    >

                </div>

                <div>

                    <h2 class="font-bold text-gray-900 text-base leading-tight">
                        Viola Shoe Store
                    </h2>

                    <p class="text-xs text-brand-darkgold font-semibold">
                        Customer Portal
                    </p>

                </div>

            </div>


            <!-- Navigation -->
            <nav class="p-4 space-y-1">


                <!-- My Dashboard -->
                <a
                    href="{{ route('customer.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg
                        class="w-5 h-5 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001 1v4a1 1 0 001 1h2a1 1 0 001-1v-4a1 1 0 001-1v4a1 1 0 001 1h3"
                        ></path>
                    </svg>

                    My Dashboard

                </a>


                <!-- My Orders - ACTIVE -->
                <a
                    href="{{ route('customer.orders.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all"
                >

                    <svg
                        class="w-5 h-5 text-brand-gold"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                        ></path>
                    </svg>

                    My Orders

                </a>


                <!-- My Reviews -->
                <a
                    href="{{ route('customer.reviews.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg
                        class="w-5 h-5 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888a1 1 0 00.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                        ></path>
                    </svg>

                    My Reviews

                </a>


                <!-- Account Settings -->
                <a
                    href="{{ route('customer.settings') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg
                        class="w-5 h-5 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7-7h14a7 7 0 00-7 7z"
                        ></path>
                    </svg>

                    Account Settings

                </a>

            </nav>

        </div>


        <!-- Logout -->
        <div class="p-4 border-t border-gray-100">

            <form
                action="{{ route('logout') }}"
                method="POST"
                class="w-full"
            >

                @csrf

                <button
                    type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg border border-gray-200 transition-all"
                >

                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l-4 4m0 0l-4-4m4 4V7m6 13a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h6"
                        />
                    </svg>

                    Logout

                </button>

            </form>

        </div>

    </aside>


    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->
    <main class="flex-1 p-6 lg:p-10 space-y-6">


        <!-- Page Header -->
        <header class="border-b border-gray-200 pb-4">

            <a
                href="{{ route('customer.orders.index') }}"
                class="text-xs font-bold text-brand-magenta hover:underline"
            >
                ← Back to My Orders
            </a>

            <h1 class="text-2xl font-bold text-gray-900 tracking-tight mt-2">
                Order Details
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                View the complete details of your order.
            </p>

        </header>


        @php
            $orderStatus = strtolower(trim($order->status ?? 'pending'));

            $statusClass = match($orderStatus) {

                'completed',
                'delivered'
                    => 'bg-green-100 text-green-800 border-green-300',

                'shipped'
                    => 'bg-blue-100 text-blue-700 border-blue-200',

                'processing',
                'pending'
                    => 'bg-brand-gold/20 text-brand-darkgold border-brand-gold',

                'cancelled'
                    => 'bg-red-100 text-red-800 border-red-300',

                default
                    => 'bg-brand-magenta/10 text-brand-magenta border-brand-magenta/30',
            };
        @endphp


        <!-- =====================================================
             ORDER HEADER
        ====================================================== -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>

                    <p class="text-xs text-gray-400 uppercase font-semibold">
                        Order Number
                    </p>

                    <h2 class="text-3xl font-black text-brand-magenta mt-1">
                        #{{ $order->order_number }}
                    </h2>

                    <p class="text-sm text-gray-500 mt-2">

                        Placed on

                        {{ $order->created_at
                            ? $order->created_at->format('d M Y, g:i A')
                            : 'N/A'
                        }}

                    </p>

                </div>


                <span
                    class="inline-flex self-start md:self-center px-4 py-2 text-sm font-bold rounded-full border {{ $statusClass }}"
                >
                    {{ ucfirst($orderStatus) }}
                </span>

            </div>

        </div>


        <!-- =====================================================
             CUSTOMER INFORMATION
        ====================================================== -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <h2 class="text-lg font-bold text-gray-900 mb-5">
                Customer Information
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


                <!-- Name -->
                <div>

                    <p class="text-xs text-gray-400 uppercase font-semibold">
                        Full Name
                    </p>

                    <p class="text-sm font-semibold text-gray-900 mt-1">
                        {{ $order->customer_name }}
                    </p>

                </div>


                <!-- Email -->
                <div>

                    <p class="text-xs text-gray-400 uppercase font-semibold">
                        Email Address
                    </p>

                    <p class="text-sm text-gray-900 mt-1 break-words">
                        {{ $order->customer_email }}
                    </p>

                </div>


                <!-- Phone -->
                <div>

                    <p class="text-xs text-gray-400 uppercase font-semibold">
                        Phone Number
                    </p>

                    <p class="text-sm text-gray-900 mt-1">
                        {{ $order->customer_phone }}
                    </p>

                </div>


            </div>

        </div>


        <!-- =====================================================
             DELIVERY & PAYMENT
        ====================================================== -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <h2 class="text-lg font-bold text-gray-900 mb-5">
                Delivery & Payment
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                <!-- Fulfillment Method -->
                <div>

                    <p class="text-xs text-gray-400 uppercase font-semibold">
                        Fulfillment Method
                    </p>


                    @if($order->pickup_location === 'home')

                        <p class="text-sm font-bold text-gray-900 mt-1">
                            Home Delivery
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Your order will be delivered to your address.
                        </p>

                    @else

                        <p class="text-sm font-bold text-gray-900 mt-1">
                            Store Pickup
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            123 Shoe Street, Shopping Mall
                        </p>

                    @endif

                </div>


                <!-- Payment Method -->
                <div>

                    <p class="text-xs text-gray-400 uppercase font-semibold">
                        Payment Method
                    </p>


                    @if($order->payment_method === 'cash_on_delivery')

                        <p class="text-sm font-bold text-gray-900 mt-1">
                            💵 Cash on Delivery
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Pay in cash when your order is delivered.
                        </p>

                    @elseif($order->payment_method === 'cash_on_pickup')

                        <p class="text-sm font-bold text-gray-900 mt-1">
                            💵 Cash Upon Pickup
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Pay in cash when collecting your order from the store.
                        </p>

                    @elseif($order->payment_method === 'online_payment')

                        <p class="text-sm font-bold text-gray-900 mt-1">
                            💳 Online Payment
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Online payment gateway integration is planned for a future enhancement.
                        </p>

                    @else

                        <p class="text-sm font-bold text-gray-900 mt-1">
                            {{ ucwords(str_replace('_', ' ', $order->payment_method)) }}
                        </p>

                    @endif

                </div>


                <!-- Delivery Address -->
                @if($order->pickup_location === 'home' && !empty($order->delivery_address))

                    <div class="md:col-span-2">

                        <p class="text-xs text-gray-400 uppercase font-semibold">
                            Delivery Address
                        </p>

                        <div class="mt-2 p-4 bg-gray-50 border border-gray-200 rounded-lg">

                            <p class="text-sm text-gray-900 whitespace-pre-line">
                                {{ $order->delivery_address }}
                            </p>

                        </div>

                    </div>

                @endif

            </div>

        </div>


        <!-- =====================================================
             ORDER ITEMS
        ====================================================== -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <h2 class="text-lg font-bold text-gray-900 mb-5">
                Order Items
            </h2>


            <div class="divide-y divide-gray-100">

                @forelse($order->items as $item)

                    <div class="py-5 first:pt-0 last:pb-0">

                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">


                            <!-- Product -->
                            <div class="flex items-center gap-4">


                                <!-- Product Icon -->
                                <div class="w-16 h-16 rounded-xl bg-brand-magenta/10 border border-brand-magenta/20 flex items-center justify-center text-brand-magenta flex-shrink-0">

                                    <svg
                                        class="w-8 h-8"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                        ></path>
                                    </svg>

                                </div>


                                <!-- Product Details -->
                                <div>

                                    <h3 class="text-base font-bold text-gray-900">
                                        {{ $item->product_name }}
                                    </h3>


                                    @if(!empty($item->product_brand))

                                        <p class="text-sm text-gray-500 mt-1">

                                            Brand:

                                            <span class="font-semibold text-gray-700">
                                                {{ $item->product_brand }}
                                            </span>

                                        </p>

                                    @endif


                                    <div class="flex flex-wrap gap-3 mt-1 text-xs text-gray-500">

                                        <span>
                                            Size:

                                            <span class="font-semibold text-gray-700">
                                                {{ $item->size }}
                                            </span>
                                        </span>


                                        <span>
                                            Quantity:

                                            <span class="font-semibold text-gray-700">
                                                {{ $item->quantity }}
                                            </span>
                                        </span>

                                    </div>

                                </div>

                            </div>


                            <!-- Price -->
                            <div class="text-left sm:text-right">

                                <p class="text-sm text-gray-500">
                                    RM {{ number_format((float) $item->price, 2) }} each
                                </p>

                                <p class="text-lg font-extrabold text-brand-magenta">
                                    RM {{ number_format((float) $item->subtotal, 2) }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="py-8 text-center text-sm text-gray-400">
                        No items found for this order.
                    </div>

                @endforelse

            </div>

        </div>


        <!-- =====================================================
             ADDITIONAL NOTES
        ====================================================== -->
        @if(!empty($order->notes))

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                <h2 class="text-lg font-bold text-gray-900 mb-3">
                    Additional Notes
                </h2>

                <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">

                    <p class="text-sm text-gray-700 whitespace-pre-line">
                        {{ $order->notes }}
                    </p>

                </div>

            </div>

        @endif


        <!-- =====================================================
             ORDER SUMMARY
        ====================================================== -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <h2 class="text-lg font-bold text-gray-900 mb-5">
                Order Summary
            </h2>


            <div class="max-w-md ml-auto space-y-3">


                <!-- Subtotal -->
                <div class="flex justify-between text-sm">

                    <span class="text-gray-600">
                        Subtotal
                    </span>

                    <span class="font-semibold text-gray-900">
                        RM {{ number_format((float) $order->subtotal, 2) }}
                    </span>

                </div>


                <!-- Tax -->
                <div class="flex justify-between text-sm">

                    <span class="text-gray-600">
                        Tax (10%)
                    </span>

                    <span class="font-semibold text-gray-900">
                        RM {{ number_format((float) $order->tax, 2) }}
                    </span>

                </div>


                <!-- Total -->
                <div class="border-t border-gray-200 pt-4 mt-4">

                    <div class="flex justify-between items-center">

                        <span class="text-lg font-bold text-gray-900">
                            Total
                        </span>

                        <span class="text-3xl font-black text-brand-magenta">
                            RM {{ number_format((float) $order->total, 2) }}
                        </span>

                    </div>

                </div>

            </div>

        </div>


        <!-- =====================================================
             BOTTOM BUTTONS
        ====================================================== -->
        <div class="flex flex-col sm:flex-row gap-3 pb-6">

            <a
                href="{{ route('customer.orders.index') }}"
                class="flex-1 py-3 rounded-lg font-bold text-brand-magenta border-2 border-brand-magenta hover:bg-pink-50 transition-all text-center"
            >
                Back to My Orders
            </a>


            <a
                href="{{ route('customer.shop') }}"
                class="flex-1 py-3 rounded-lg font-bold text-white bg-brand-magenta hover:bg-[#A0004E] transition-all text-center shadow-md"
            >
                Continue Shopping
            </a>

        </div>


    </main>

</body>

</html>