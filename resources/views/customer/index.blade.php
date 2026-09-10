<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Dashboard - Viola Shoe Store</title>

    <!-- Tailwind CSS CDN -->
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

    <!-- ========================================================= -->
    <!-- LEFT SIDEBAR -->
    <!-- ========================================================= -->

    <aside class="w-full md:w-64 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col justify-between min-h-screen">

        <div>

            <!-- Store Branding -->
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

                <!-- Dashboard -->
                <a
                    href="{{ route('customer.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all"
                >

                    <svg class="w-5 h-5 text-brand-gold"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                        />

                    </svg>

                    My Dashboard

                </a>


                <!-- Orders -->
                <a
                    href="{{ route('customer.orders.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg class="w-5 h-5 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                        />

                    </svg>

                    My Orders

                </a>


                <!-- Reviews -->
                <a
                    href="{{ route('customer.reviews.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg class="w-5 h-5 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                        />

                    </svg>

                    My Reviews

                </a>


                <!-- Settings -->
                <a
                    href="{{ route('customer.settings') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg class="w-5 h-5 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                        />

                    </svg>

                    Account Settings

                </a>
                            <!-- Shop New Shoes -->
            <a
                href="{{ route('customer.shop') }}"
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
                        d="M3 3h18v6H3V3zm0 8h18v10H3V11zm4 2v6m6-6v6"
                    />
                </svg>

                Shop New Shoes
            </a>
            </nav>

        </div>


        <!-- ===================================================== -->
        <!-- SIDEBAR FOOTER -->
        <!-- ===================================================== -->

        <div class="p-4 border-t border-gray-100 space-y-3">

            @if(in_array(auth()->user()->role ?? '', ['Staff', 'Admin']))

                <a
                    href="{{ route('staff.index') }}"
                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-bold text-white bg-brand-magenta border-b-2 border-brand-darkgold rounded-lg shadow-sm hover:bg-[#A0004E] transition-all"
                >

                    <svg class="w-4 h-4 text-brand-gold"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"
                        />

                    </svg>

                    Switch to Staff Portal

                </a>

            @endif


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

                    <svg class="w-4 h-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"
                        />

                    </svg>

                    Logout

                </button>

            </form>

        </div>

    </aside>



    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <main class="flex-1 p-6 lg:p-10 space-y-8">


        <!-- ===================================================== -->
        <!-- TOP HEADER -->
        <!-- ===================================================== -->

        <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-200 pb-4">

            <div>

                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                    Customer Dashboard
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Track orders, monitor deliveries, and submit reviews for Viola Shoe Store.
                </p>

            </div>


            <a
                href="{{ route('customer.shop') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold text-white bg-brand-magenta rounded-lg shadow-sm hover:bg-[#A0004E] transition-all"
            >

                <svg class="w-4 h-4 text-brand-gold"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4"
                    />

                </svg>

                Shop New Shoes

            </a>

        </header>



        <!-- ===================================================== -->
        <!-- METRICS -->
        <!-- ===================================================== -->

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


            <!-- Total Orders -->
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Total Orders
                    </p>

                    <h3 class="text-2xl font-extrabold text-gray-800 mt-1">
                        {{ $orders->count() }}
                    </h3>

                </div>


                <div class="w-12 h-12 rounded-lg bg-brand-magenta/10 flex items-center justify-center text-brand-magenta">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                        />

                    </svg>

                </div>

            </div>



            <!-- Pending -->
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Pending
                    </p>

                    <h3 class="text-2xl font-extrabold text-brand-darkgold mt-1">
                        {{ $orders->whereIn('status', ['pending', 'processing'])->count() }}
                    </h3>

                </div>


                <div class="w-12 h-12 rounded-lg bg-brand-gold/15 flex items-center justify-center text-brand-darkgold">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />

                    </svg>

                </div>

            </div>



            <!-- Shipped -->
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        In Transit
                    </p>

                    <h3 class="text-2xl font-extrabold text-blue-600 mt-1">
                        {{ $orders->where('status', 'shipped')->count() }}
                    </h3>

                </div>


                <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        />

                    </svg>

                </div>

            </div>



            <!-- Completed -->
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Completed
                    </p>

                    <h3 class="text-2xl font-extrabold text-green-600 mt-1">
                        {{ $orders->whereIn('status', ['completed', 'delivered'])->count() }}
                    </h3>

                </div>


                <div class="w-12 h-12 rounded-lg bg-green-50 flex items-center justify-center text-green-600">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />

                    </svg>

                </div>

            </div>

        </section>



        <!-- ===================================================== -->
        <!-- ORDERS -->
        <!-- ===================================================== -->

        <section class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">


            <!-- Filter Header -->
            <div class="border-b border-gray-100 px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gray-50/50">

                <div class="flex items-center gap-2 overflow-x-auto pb-1 sm:pb-0">

                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg bg-brand-magenta text-white shadow-sm"
                    >
                        All Orders
                    </button>

                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg text-gray-600 hover:bg-gray-200/60 transition-colors"
                    >
                        Pending
                    </button>

                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg text-gray-600 hover:bg-gray-200/60 transition-colors"
                    >
                        Shipped
                    </button>

                    <button
                        class="px-3 py-1.5 text-xs font-bold rounded-lg text-gray-600 hover:bg-gray-200/60 transition-colors"
                    >
                        Completed
                    </button>

                </div>


                <span class="text-xs font-semibold text-gray-400">
                    Showing {{ $orders->count() }} orders
                </span>

            </div>



            <!-- ================================================= -->
            <!-- REAL DATABASE ORDERS -->
            <!-- ================================================= -->

            <div class="divide-y divide-gray-100">

                @forelse($orders as $order)

                    <!-- Order -->
                    <div class="p-6 hover:bg-pink-50/20 transition-colors space-y-4">


                        <!-- ===================================== -->
                        <!-- ORDER HEADER -->
                        <!-- ===================================== -->

                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-gray-100 pb-3">

                            <div class="flex items-center gap-3">

                                <span class="text-xs font-extrabold px-2.5 py-1 rounded bg-gray-100 text-gray-700">

                                    #{{ $order->order_number }}

                                </span>


                                <span class="text-xs text-gray-400">

                                    Placed on {{ $order->created_at->format('d M Y') }}

                                </span>

                            </div>


                            @php

                                $status = strtolower($order->status);

                                $badgeStyle = match($status) {

                                    'completed',
                                    'delivered'
                                        => 'bg-green-100 text-green-800 border-green-300',

                                    'shipped'
                                        => 'bg-blue-100 text-blue-800 border-blue-300',

                                    'processing',
                                    'pending'
                                        => 'bg-brand-gold/20 text-brand-darkgold border-brand-gold',

                                    'cancelled'
                                        => 'bg-red-100 text-red-800 border-red-300',

                                    default
                                        => 'bg-brand-magenta/10 text-brand-magenta border-brand-magenta/30',

                                };

                            @endphp


                            <span
                                class="px-3 py-1 text-xs font-extrabold rounded-full border self-start sm:self-auto {{ $badgeStyle }}"
                            >

                                {{ ucfirst($order->status) }}

                            </span>

                        </div>



                        <!-- ===================================== -->
                        <!-- ORDER ITEMS -->
                        <!-- ===================================== -->

                        <div class="space-y-4">

                            @forelse($order->items as $item)

                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">


                                    <!-- Product -->
                                    <div class="flex items-center gap-4">

                                        <!-- Thumbnail -->
                                        <div class="w-16 h-16 rounded-xl
                                                    bg-brand-magenta/10
                                                    border border-brand-magenta/20
                                                    flex items-center justify-center
                                                    text-brand-magenta
                                                    flex-shrink-0">

                                            <svg class="w-8 h-8"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                                />

                                            </svg>

                                        </div>


                                        <!-- Details -->
                                        <div>

                                            <h4 class="text-base font-bold text-gray-900">

                                                {{ $item->product_name }}

                                            </h4>


                                            <p class="text-xs text-gray-500 mt-0.5">

                                                Brand:

                                                <span class="font-semibold text-gray-700">

                                                    {{ $item->product_brand ?? 'N/A' }}

                                                </span>

                                                &nbsp;|&nbsp;

                                                Size:

                                                <span class="font-semibold text-gray-700">

                                                    {{ $item->size }}

                                                </span>

                                                &nbsp;|&nbsp;

                                                Quantity:

                                                <span class="font-bold text-gray-700">

                                                    {{ $item->quantity }}

                                                </span>

                                            </p>


                                            <p class="text-sm font-extrabold text-brand-magenta mt-1">

                                                RM{{ number_format($item->price, 2) }}

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            @empty

                                <p class="text-sm text-gray-400">
                                    No items found for this order.
                                </p>

                            @endforelse

                        </div>



                        <!-- ===================================== -->
                        <!-- ORDER TOTAL -->
                        <!-- ===================================== -->

                        <div class="border-t border-gray-100 pt-3 flex justify-end">

                            <div class="text-right">

                                <p class="text-xs text-gray-400">
                                    Order Total
                                </p>

                                <p class="text-lg font-black text-brand-magenta">

                                    RM{{ number_format($order->total, 2) }}

                                </p>

                            </div>

                        </div>



                        <!-- ===================================== -->
                        <!-- ACTIONS -->
                        <!-- ===================================== -->

                        <div class="flex items-center justify-end gap-2">


                            <!-- Track -->
                            @if($status === 'shipped')

                                <a
                                    href="{{ route('customer.orders.track', $order->id) }}"
                                    class="text-xs font-bold px-4 py-2 rounded-lg bg-blue-50 text-blue-700 border border-blue-200 hover:bg-blue-100 transition-colors flex items-center gap-1"
                                >

                                    <svg class="w-4 h-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                        />

                                    </svg>

                                    Track Parcel

                                </a>

                            @endif



                            <!-- Review -->
                            @if(in_array($status, ['completed', 'delivered']))

                                @foreach($order->items as $item)

                                    <button
                                        type="button"
                                        onclick="openReviewModal(
                                            '{{ $order->id }}',
                                            '{{ addslashes($item->product_name) }}'
                                        )"
                                        class="text-xs font-bold px-4 py-2 rounded-lg
                                               bg-brand-magenta
                                               text-white
                                               border-b-2
                                               border-brand-darkgold
                                               hover:bg-[#A0004E]
                                               transition-colors
                                               flex items-center gap-1"
                                    >

                                        <svg class="w-3.5 h-3.5 text-brand-gold"
                                             fill="currentColor"
                                             viewBox="0 0 20 20">

                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            />

                                        </svg>

                                        Review {{ $item->product_name }}

                                    </button>

                                @endforeach

                            @endif



                            <!-- View Details -->
                            <a
                                href="{{ route('customer.orders.show', $order->id) }}"
                                class="text-xs font-semibold px-3 py-2 rounded-lg text-gray-500 hover:bg-gray-100 transition-colors"
                            >

                                View Details &rarr;

                            </a>

                        </div>

                    </div>

                @empty


                    <!-- ========================================= -->
                    <!-- NO ORDERS -->
                    <!-- ========================================= -->

                    <div class="p-12 text-center text-gray-500 space-y-3">

                        <svg
                            class="mx-auto h-12 w-12 text-brand-gold"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                            />

                        </svg>


                        <p class="text-base font-bold text-gray-700">
                            No Orders Found
                        </p>


                        <p class="text-xs text-gray-400">
                            Looks like you haven't made any purchases yet.
                        </p>


                        <a
                            href="{{ route('customer.shop') }}"
                            class="inline-flex items-center gap-2 mt-2 px-4 py-2 text-xs font-bold text-white bg-brand-magenta rounded-lg hover:bg-[#A0004E] transition-all"
                        >

                            Shop Now

                        </a>

                    </div>

                @endforelse

            </div>

        </section>

    </main>



    <!-- ========================================================= -->
    <!-- REVIEW MODAL -->
    <!-- ========================================================= -->

    <div
        id="reviewModal"
        class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/50 backdrop-blur-sm flex items-center justify-center p-4"
    >

        <div class="bg-white rounded-xl shadow-xl max-w-md w-full overflow-hidden border border-gray-100 transform transition-all">


            <!-- Modal Header -->
            <div class="px-6 py-4 bg-brand-magenta flex items-center justify-between text-white">

                <h3 class="text-lg font-bold">
                    Leave a Review
                </h3>


                <button
                    type="button"
                    onclick="closeReviewModal()"
                    class="text-white/80 hover:text-white text-xl font-bold"
                >
                    &times;
                </button>

            </div>



            <!-- Modal Form -->
            <form
                action="{{ route('customer.reviews.store') }}"
                method="POST"
                class="p-6 space-y-4"
            >

                @csrf


                <input
                    type="hidden"
                    name="order_id"
                    id="modalOrderId"
                >


                <!-- Product -->
                <div>

                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">
                        Product
                    </label>

                    <p
                        id="modalProductName"
                        class="text-sm font-bold text-gray-800"
                    ></p>

                </div>



                <!-- Rating -->
                <div>

                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                        Rating
                    </label>


                    <div
                        class="flex items-center gap-1"
                        id="starContainer"
                    >

                        @for($i = 1; $i <= 5; $i++)

                            <button
                                type="button"
                                onclick="setRating({{ $i }})"
                                class="star-btn text-gray-300 hover:text-brand-gold transition-colors focus:outline-none"
                                data-value="{{ $i }}"
                            >

                                <svg
                                    class="w-8 h-8 fill-current"
                                    viewBox="0 0 20 20"
                                >

                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />

                                </svg>

                            </button>

                        @endfor

                    </div>


                    <input
                        type="hidden"
                        name="rating"
                        id="selectedRating"
                        value="5"
                        required
                    >

                </div>



                <!-- Comment -->
                <div>

                    <label
                        for="comment"
                        class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1"
                    >
                        Your Feedback
                    </label>


                    <textarea
                        name="comment"
                        id="comment"
                        rows="3"
                        required
                        placeholder="Tell us how the shoes fit and your experience..."
                        class="w-full rounded-lg border-gray-300 focus:border-brand-magenta focus:ring focus:ring-brand-magenta/20 text-sm p-3 border"
                    ></textarea>

                </div>



                <!-- Modal Actions -->
                <div class="flex items-center justify-end gap-3 pt-2">

                    <button
                        type="button"
                        onclick="closeReviewModal()"
                        class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-gray-800"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="px-5 py-2 text-sm font-semibold text-white bg-brand-magenta border-b-2 border-brand-darkgold rounded-lg shadow hover:bg-[#A0004E] transition-all"
                    >
                        Submit Review
                    </button>

                </div>

            </form>

        </div>

    </div>



    <!-- ========================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        function openReviewModal(orderId, productName)
        {
            document.getElementById('modalOrderId').value = orderId;

            document.getElementById('modalProductName').innerText = productName;

            document.getElementById('reviewModal').classList.remove('hidden');

            setRating(5);
        }


        function closeReviewModal()
        {
            document.getElementById('reviewModal').classList.add('hidden');
        }


        function setRating(rating)
        {
            document.getElementById('selectedRating').value = rating;

            const stars = document.querySelectorAll('.star-btn');


            stars.forEach((star, index) => {

                if (index < rating)
                {
                    star.classList.remove('text-gray-300');

                    star.classList.add('text-brand-gold');
                }
                else
                {
                    star.classList.remove('text-brand-gold');

                    star.classList.add('text-gray-300');
                }

            });
        }

    </script>

</body>
</html>