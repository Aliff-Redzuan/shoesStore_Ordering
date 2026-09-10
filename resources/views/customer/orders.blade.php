<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        My Orders - Viola Shoe Store
    </title>

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
         SIDEBAR
    ========================================================== -->

    <aside class="w-full md:w-64 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col justify-between min-h-screen">

        <div>


            <!-- Branding -->

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
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1-1h-3"
                        ></path>

                    </svg>

                    My Dashboard

                </a>


                <!-- Orders -->

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


                <!-- Reviews -->

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
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                        ></path>

                    </svg>

                    My Reviews

                </a>


                <!-- Settings -->

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
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7-7"
                        ></path>

                    </svg>

                    Account Settings

                </a>


                <!-- Shop -->

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
                        ></path>

                    </svg>

                    Shop New Shoes

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

                    Logout

                </button>

            </form>

        </div>

    </aside>


    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->

    <main class="flex-1 p-6 lg:p-10 space-y-6">


        <!-- Header -->

        <header class="border-b border-gray-200 pb-4">

            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                Order History
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                View and manage all your shoe purchases from Viola Shoe Store.
            </p>

        </header>


        <!-- Success -->

        @if(session('success'))

            <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg p-4 text-sm">

                {{ session('success') }}

            </div>

        @endif


        <!-- Error -->

        @if(session('error'))

            <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 text-sm">

                {{ session('error') }}

            </div>

        @endif


        <!-- Validation Errors -->

        @if($errors->any())

            <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 text-sm">

                @foreach($errors->all() as $error)

                    <p>
                        {{ $error }}
                    </p>

                @endforeach

            </div>

        @endif


        <!-- Filters -->

        <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-gray-200">


            <a
                href="{{ route('customer.orders.index') }}"
                class="px-4 py-2 text-xs font-bold rounded-lg {{ ($status ?? 'all') === 'all' ? 'bg-brand-magenta text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-100' }}"
            >
                All Orders
            </a>


            <a
                href="{{ route('customer.orders.index', ['status' => 'pending']) }}"
                class="px-4 py-2 text-xs font-bold rounded-lg {{ ($status ?? 'all') === 'pending' ? 'bg-brand-magenta text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-100' }}"
            >
                Pending
            </a>


            <a
                href="{{ route('customer.orders.index', ['status' => 'shipped']) }}"
                class="px-4 py-2 text-xs font-bold rounded-lg {{ ($status ?? 'all') === 'shipped' ? 'bg-brand-magenta text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-100' }}"
            >
                Shipped
            </a>


            <a
                href="{{ route('customer.orders.index', ['status' => 'completed']) }}"
                class="px-4 py-2 text-xs font-bold rounded-lg {{ ($status ?? 'all') === 'completed' ? 'bg-brand-magenta text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-100' }}"
            >
                Completed
            </a>

        </div>


        <!-- Orders -->

        <div class="space-y-4">


            @forelse($orders ?? [] as $order)


                @php

                    $orderStatus =
                        strtolower(
                            trim(
                                $order->status ?? 'pending'
                            )
                        );


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
                            => 'bg-gray-100 text-gray-700 border-gray-200'

                    };

                @endphp


                <!-- Order Card -->

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">


                    <!-- Order Header -->

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-gray-100 pb-4">

                        <div>

                            <span class="text-xs font-extrabold px-2.5 py-1 rounded bg-gray-100 text-gray-700">
                                #{{ $order->order_number }}
                            </span>

                            <span class="text-xs text-gray-400 ml-2">
                                Placed on
                                {{ $order->created_at ? $order->created_at->format('d M Y') : 'N/A' }}
                            </span>

                        </div>


                        <span class="px-3 py-1 text-xs font-extrabold rounded-full border {{ $statusClass }}">

                            {{ ucfirst($orderStatus) }}

                        </span>

                    </div>


                    <!-- Items -->

                    <div class="mt-4 space-y-4">


                        @forelse($order->items as $item)


                            @php

                                $hasReviewed =
                                    in_array(
                                        $item->id,
                                        $reviewedItemIds ?? [],
                                        true
                                    );

                                $canReview =
                                    in_array(
                                        $orderStatus,
                                        [
                                            'delivered',
                                            'completed'
                                        ],
                                        true
                                    );

                            @endphp


                            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-4 border-b border-gray-100 last:border-b-0">


                                <!-- Product -->

                                <div class="flex items-center gap-4">


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


                                    <div>

                                        <h3 class="text-base font-bold text-gray-900">
                                            {{ $item->product_name }}
                                        </h3>


                                        @if(!empty($item->product_brand))

                                            <p class="text-xs text-gray-500 mt-1">

                                                Brand:

                                                <span class="font-semibold text-gray-700">
                                                    {{ $item->product_brand }}
                                                </span>

                                            </p>

                                        @endif


                                        <p class="text-xs text-gray-500 mt-1">

                                            Quantity:

                                            <span class="font-semibold text-gray-700">
                                                {{ $item->quantity }}
                                            </span>

                                            <span class="mx-1">
                                                |
                                            </span>

                                            Size:

                                            <span class="font-semibold text-gray-700">
                                                {{ $item->size }}
                                            </span>

                                        </p>


                                        <p class="text-sm font-extrabold text-brand-magenta mt-1">

                                            RM {{ number_format((float) $item->price, 2) }}

                                        </p>

                                    </div>

                                </div>


                                <!-- Item Actions -->

                                <div class="flex flex-wrap items-center gap-2 self-start lg:self-center">


                                    @if($canReview)

                                        @if($hasReviewed)

                                            <span class="text-xs font-bold px-4 py-2 rounded-lg bg-green-50 text-green-700 border border-green-200">

                                                ✓ Reviewed

                                            </span>

                                        @else

                                            <button
                                                type="button"
                                                onclick="openReviewModal(
                                                    {{ $order->id }},
                                                    {{ $item->id }},
                                                    @js($item->product_name)
                                                )"
                                                class="text-xs font-bold px-4 py-2 rounded-lg bg-brand-magenta text-white hover:bg-[#A0004E] transition-all"
                                            >

                                                Review

                                            </button>

                                        @endif

                                    @endif


                                </div>

                            </div>


                        @empty

                            <p class="text-sm text-gray-400">
                                No items found for this order.
                            </p>

                        @endforelse

                    </div>


                    <!-- Order Footer -->

                    <div class="border-t border-gray-100 pt-4 mt-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">


                        <div>

                            <p class="text-xs text-gray-400">
                                Order Total
                            </p>

                            <p class="text-lg font-extrabold text-brand-magenta">
                                RM {{ number_format((float) $order->total, 2) }}
                            </p>

                        </div>


                        <div class="flex flex-wrap gap-2">


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


                </div>


            @empty


                <div class="bg-white rounded-xl border border-gray-200 p-12 text-center text-gray-500">

                    <h2 class="text-lg font-bold text-gray-700">
                        No orders found.
                    </h2>

                    <p class="text-sm text-gray-400 mt-1">
                        Looks like you haven't made any purchases yet.
                    </p>

                    <a
                        href="{{ route('customer.shop') }}"
                        class="inline-block mt-5 px-5 py-2.5 rounded-lg bg-brand-magenta text-white text-sm font-bold hover:bg-[#A0004E]"
                    >
                        Shop Now
                    </a>

                </div>


            @endforelse


        </div>

    </main>


    <!-- =========================================================
         REVIEW MODAL
    ========================================================== -->

    <div
        id="reviewModal"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50"
    >

        <div class="bg-white rounded-xl shadow-xl max-w-md w-full">


            <!-- Modal Header -->

            <div class="p-6 border-b border-gray-200 flex items-center justify-between">

                <div>

                    <h2 class="text-xl font-bold text-gray-900">
                        Write a Review
                    </h2>

                    <p
                        id="reviewProductName"
                        class="text-xs text-gray-500 mt-1"
                    ></p>

                </div>


                <button
                    type="button"
                    onclick="closeReviewModal()"
                    class="text-gray-400 hover:text-gray-700 text-2xl leading-none"
                >
                    &times;
                </button>

            </div>


            <!-- Review Form -->

            <form
                action="{{ route('customer.reviews.store') }}"
                method="POST"
                class="p-6 space-y-5"
            >

                @csrf


                <input
                    type="hidden"
                    id="reviewOrderId"
                    name="order_id"
                >


                <input
                    type="hidden"
                    id="reviewOrderItemId"
                    name="order_item_id"
                >


                <!-- Rating -->

                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">

                        Rating *

                    </label>


                    <div
                        id="starRating"
                        class="flex items-center gap-2"
                    >

                        @for($rating = 1; $rating <= 5; $rating++)

                            <button
                                type="button"
                                onclick="selectRating({{ $rating }})"
                                data-rating="{{ $rating }}"
                                class="review-star text-3xl text-gray-300 hover:text-brand-gold transition-all"
                            >
                                ★
                            </button>

                        @endfor

                    </div>


                    <input
                        type="hidden"
                        id="reviewRating"
                        name="rating"
                        value=""
                        required
                    >

                </div>


                <!-- Comment -->

                <div>

                    <label
                        for="reviewComment"
                        class="block text-sm font-semibold text-gray-700 mb-2"
                    >
                        Your Review *
                    </label>


                    <textarea
                        id="reviewComment"
                        name="comment"
                        rows="5"
                        maxlength="2000"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta focus:border-brand-magenta outline-none"
                        placeholder="Tell us what you think about this product..."
                    ></textarea>

                </div>


                <!-- Buttons -->

                <div class="flex gap-3 pt-3 border-t border-gray-200">

                    <button
                        type="button"
                        onclick="closeReviewModal()"
                        class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-200"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="flex-1 px-4 py-3 bg-brand-magenta text-white rounded-lg text-sm font-bold hover:bg-[#A0004E]"
                    >
                        Submit Review
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- =========================================================
         JAVASCRIPT
    ========================================================== -->

    <script>


        /*
        |--------------------------------------------------------------------------
        | Review Modal
        |--------------------------------------------------------------------------
        */

        function openReviewModal(
            orderId,
            orderItemId,
            productName
        ) {

            document.getElementById(
                'reviewOrderId'
            ).value = orderId;


            document.getElementById(
                'reviewOrderItemId'
            ).value = orderItemId;


            document.getElementById(
                'reviewProductName'
            ).textContent =
                productName;


            document.getElementById(
                'reviewRating'
            ).value = '';


            document.getElementById(
                'reviewComment'
            ).value = '';


            resetStars();


            const modal =
                document.getElementById(
                    'reviewModal'
                );


            modal.classList.remove(
                'hidden'
            );


            modal.classList.add(
                'flex'
            );
        }


        function closeReviewModal()
        {
            const modal =
                document.getElementById(
                    'reviewModal'
                );


            modal.classList.add(
                'hidden'
            );


            modal.classList.remove(
                'flex'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Rating
        |--------------------------------------------------------------------------
        */

        function selectRating(
            rating
        ) {

            document.getElementById(
                'reviewRating'
            ).value =
                rating;


            const stars =
                document.querySelectorAll(
                    '.review-star'
                );


            stars.forEach(
                function (star) {

                    const starRating =
                        parseInt(
                            star.dataset.rating
                        );


                    if (
                        starRating <= rating
                    ) {

                        star.classList.remove(
                            'text-gray-300'
                        );

                        star.classList.add(
                            'text-brand-gold'
                        );

                    } else {

                        star.classList.remove(
                            'text-brand-gold'
                        );

                        star.classList.add(
                            'text-gray-300'
                        );

                    }

                }
            );
        }


        function resetStars()
        {
            document
                .querySelectorAll(
                    '.review-star'
                )
                .forEach(
                    function (star) {

                        star.classList.remove(
                            'text-brand-gold'
                        );

                        star.classList.add(
                            'text-gray-300'
                        );

                    }
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Close Modal By Clicking Outside
        |--------------------------------------------------------------------------
        */

        document
            .getElementById(
                'reviewModal'
            )
            .addEventListener(
                'click',
                function (event) {

                    if (
                        event.target === this
                    ) {

                        closeReviewModal();

                    }

                }
            );

    </script>


</body>

</html>