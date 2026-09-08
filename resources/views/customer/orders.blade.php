<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Viola Shoe Store</title>
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

```
<!-- Left Sidebar -->
<aside class="w-full md:w-64 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col justify-between min-h-screen">

    <div>

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
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    ></path>
                </svg>

                My Dashboard
            </a>


            <!-- My Orders -->
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
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
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
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7-7h14a7 7 0 00-7-7z"
                    ></path>
                </svg>

                Account Settings
            </a>

        </nav>

    </div>

</aside>


<!-- Main Content -->
<main class="flex-1 p-6 lg:p-10 space-y-6">

    <!-- Page Header -->
    <header class="border-b border-gray-200 pb-4">

        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
            Order History
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            View and manage all your shoe purchases from Viola Shoe Store.
        </p>

    </header>


    <!-- Status Filter Bar -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-gray-200">

        <!-- All Orders -->
        <a
            href="{{ route('customer.orders.index') }}"
            class="px-4 py-2 text-xs font-bold rounded-lg {{ ($status ?? 'all') === 'all' ? 'bg-brand-magenta text-white shadow-sm' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-100' }}"
        >
            All Orders
        </a>


        <!-- Pending -->
        <a
            href="{{ route('customer.orders.index', ['status' => 'pending']) }}"
            class="px-4 py-2 text-xs font-bold rounded-lg {{ ($status ?? 'all') === 'pending' ? 'bg-brand-magenta text-white shadow-sm' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-100' }}"
        >
            Pending
        </a>


        <!-- Shipped -->
        <a
            href="{{ route('customer.orders.index', ['status' => 'shipped']) }}"
            class="px-4 py-2 text-xs font-bold rounded-lg {{ ($status ?? 'all') === 'shipped' ? 'bg-brand-magenta text-white shadow-sm' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-100' }}"
        >
            Shipped
        </a>


        <!-- Completed -->
        <a
            href="{{ route('customer.orders.index', ['status' => 'completed']) }}"
            class="px-4 py-2 text-xs font-bold rounded-lg {{ ($status ?? 'all') === 'completed' ? 'bg-brand-magenta text-white shadow-sm' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-100' }}"
        >
            Completed
        </a>

    </div>


    <!-- Orders Cards Container -->
    <div class="space-y-4">

        @forelse($orders ?? [] as $order)

            @php
                $orderStatus = strtolower(trim($order->status ?? 'processing'));

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


            <!-- Order Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4">

                <!-- Order Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-gray-100 pb-3">

                    <div class="flex items-center gap-3">

                        <!-- Real Order Number -->
                        <span class="text-xs font-extrabold px-2.5 py-1 rounded bg-gray-100 text-gray-700">
                            #{{ $order->order_number }}
                        </span>


                        <!-- Order Date -->
                        <span class="text-xs text-gray-400">
                            Placed on
                            {{ $order->created_at ? $order->created_at->format('d M Y') : 'N/A' }}
                        </span>

                    </div>


                    <!-- Order Status -->
                    <span class="px-3 py-1 text-xs font-extrabold rounded-full border {{ $statusClass }}">
                        {{ ucfirst($orderStatus) }}
                    </span>

                </div>


                <!-- Order Information -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                    <!-- Order Items -->
                    <div class="w-full">

                        @forelse($order->items as $item)

                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 {{ !$loop->last ? 'pb-4 mb-4 border-b border-gray-100' : '' }}">

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

                                        <!-- Product Name -->
                                        <h4 class="text-base font-bold text-gray-900">
                                            {{ $item->product_name }}
                                        </h4>


                                        <!-- Product Brand -->
                                        @if(!empty($item->product_brand))

                                            <p class="text-xs text-gray-500 mt-0.5">

                                                Brand:

                                                <span class="font-bold text-gray-700">
                                                    {{ $item->product_brand }}
                                                </span>

                                            </p>

                                        @endif


                                        <!-- Quantity and Size -->
                                        <p class="text-xs text-gray-500 mt-0.5">

                                            Quantity:

                                            <span class="font-bold text-gray-700">
                                                {{ $item->quantity }}
                                            </span>

                                            |

                                            Size:

                                            <span class="font-bold text-gray-700">
                                                {{ $item->size }}
                                            </span>

                                        </p>


                                        <!-- Item Price -->
                                        <p class="text-sm font-extrabold text-brand-magenta mt-1">
                                            RM {{ number_format((float) $item->price, 2) }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="text-sm text-gray-400">
                                No items found for this order.
                            </div>

                        @endforelse

                    </div>


                    <!-- Order Actions -->
                    <div class="flex items-center gap-2 self-end sm:self-center flex-shrink-0">

                        @if($orderStatus === 'shipped')

                            <a
                                href="{{ route('customer.orders.track', $order->id) }}"
                                class="text-xs font-bold px-4 py-2 rounded-lg bg-blue-50 text-blue-700 border border-blue-200 hover:bg-blue-100"
                            >
                                Track Order
                            </a>

                        @endif


                        <a
                            href="{{ route('customer.orders.show', $order->id) }}"
                            class="text-xs font-bold px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200"
                        >
                            Details
                        </a>

                    </div>

                </div>


                <!-- Order Total -->
                <div class="border-t border-gray-100 pt-3 flex justify-end">

                    <div class="text-right">

                        <p class="text-xs text-gray-400">
                            Order Total
                        </p>

                        <p class="text-base font-extrabold text-brand-magenta">
                            RM {{ number_format((float) $order->total, 2) }}
                        </p>

                    </div>

                </div>

            </div>


        @empty

            <!-- Empty State -->
            <div class="bg-white rounded-xl border border-gray-200 p-12 text-center text-gray-500 space-y-3">

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


                @if(($status ?? 'all') === 'pending')

                    <p class="text-base font-bold text-gray-700">
                        No orders are currently pending.
                    </p>

                    <p class="text-xs text-gray-400">
                        You don't have any pending orders right now.
                    </p>


                @elseif(($status ?? 'all') === 'shipped')

                    <p class="text-base font-bold text-gray-700">
                        No orders are currently shipped.
                    </p>

                    <p class="text-xs text-gray-400">
                        You don't have any orders that are currently in transit.
                    </p>


                @elseif(($status ?? 'all') === 'completed')

                    <p class="text-base font-bold text-gray-700">
                        No orders are currently completed.
                    </p>

                    <p class="text-xs text-gray-400">
                        You don't have any completed orders yet.
                    </p>


                @else

                    <p class="text-base font-bold text-gray-700">
                        No orders found.
                    </p>

                    <p class="text-xs text-gray-400">
                        Looks like you haven't made any purchases yet.
                    </p>

                @endif

            </div>

        @endforelse

    </div>

</main>
```

</body>
</html>
