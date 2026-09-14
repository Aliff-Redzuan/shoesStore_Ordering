<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop New Shoes - Viola Shoe Store</title>

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

<body class="bg-gray-100 min-h-screen font-sans antialiased text-gray-900 flex flex-col">

    <!-- ========================================================= -->
    <!-- HEADER -->
    <!-- ========================================================= -->
    <header class="bg-brand-magenta sticky top-0 z-50 shadow-md">

        <!-- ===================================================== -->
        <!-- TOP UTILITY BAR -->
        <!-- ===================================================== -->
        <div class="border-b border-white/10 bg-black/10 text-xs text-white/90">

            <div class="max-w-7xl mx-auto px-4 py-1.5 flex justify-between items-center gap-4">

                <!-- LEFT SIDE -->
                <div class="flex items-center gap-4">

                    <!-- Notifications -->
                    <a href="#"
                       class="hover:opacity-80 flex items-center gap-1">

                        <svg class="w-3.5 h-3.5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>

                        Notifications
                    </a>


                    <!-- Help -->
                    <a href="#"
                       class="hover:opacity-80 flex items-center gap-1">

                        <svg class="w-3.5 h-3.5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>

                        Help
                    </a>

                </div>


                <!-- ================================================= -->
                <!-- RIGHT SIDE - ACCOUNT / LOGIN / LOGOUT -->
                <!-- ================================================= -->
                <div class="flex items-center">

@if(Auth::check())

    @php
        $accountRoute = match (auth()->user()->role ?? 'customer') {
            'admin' => route('admin.dashboard'),

            'staff',
            'inventory_manager',
            'fulfillment' => route('staff.index'),

            default => route('customer.settings'),
        };
    @endphp

    <!-- Combined Account / Logout Container -->
    <div class="flex items-center bg-white/10 border border-white/15 rounded-md overflow-hidden">

        <!-- Account -->
        <a href="{{ $accountRoute }}"
           class="flex items-center gap-1.5 px-3 py-1.5
                  hover:bg-white/10
                  text-white
                  font-semibold
                  transition-all">

            <svg class="w-3.5 h-3.5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0"/>

            </svg>

            Account

        </a>

        <!-- Divider -->
        <div class="h-4 w-px bg-white/20"></div>

        <!-- Logout -->
        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button type="submit"
                    class="flex items-center gap-1.5 px-3 py-1.5
                           hover:bg-white/10
                           text-white
                           font-semibold
                           transition-all">

                <svg class="w-3.5 h-3.5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>

                </svg>

                Logout

            </button>

        </form>

    </div>

@else

                        <!-- Login -->
                        <a href="{{ route('login') }}"
                           class="flex items-center gap-1.5
                                  bg-white/10
                                  border border-white/15
                                  rounded-md
                                  px-3 py-1.5
                                  font-semibold
                                  text-white
                                  hover:bg-white/20
                                  transition-all">

                            <svg class="w-3.5 h-3.5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M11 16l-4-4m0 0l4-4m-4 4h14m-7 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>
                            </svg>

                            Login
                        </a>

                    @endif

                </div>

            </div>
        </div>


        <!-- ===================================================== -->
        <!-- MAIN NAVIGATION -->
        <!-- ===================================================== -->
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between gap-6">


            <!-- ================================================= -->
            <!-- BRAND -->
            <!-- ================================================= -->
            <a href="{{ route('customer.dashboard') }}"
               class="flex items-center gap-3 shrink-0">

                <!-- Logo -->
                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-md overflow-hidden">

                    <img src="{{ asset('images/ViolaLogo.png') }}"
                         alt="Viola Shoe Store Logo"
                         class="w-full h-full object-cover">

                </div>


                <!-- Brand Text -->
                <div class="text-white hidden sm:block">

                    <h2 class="font-black text-xl leading-none tracking-tight">
                        Viola
                    </h2>

                    <p class="text-[10px] text-brand-gold font-semibold uppercase tracking-wider">
                        Shoe Store
                    </p>

                </div>

            </a>


            <!-- ================================================= -->
            <!-- SEARCH -->
            <!-- ================================================= -->
            <div class="flex-1 max-w-2xl">

                <form action="{{ route('customer.shop') }}"
                      method="GET"
                      class="w-full bg-white p-1 rounded-sm shadow-inner flex items-center">

                    <input type="text"
                           name="search"
                           value="{{ $search ?? '' }}"
                           placeholder="Search for shoes, brands, or categories..."
                           class="min-w-0 flex-1 px-3 py-1.5
                                  text-sm
                                  text-gray-800
                                  outline-none
                                  border-none
                                  focus:ring-0">


                    <button type="submit"
                            class="shrink-0
                                   bg-brand-magenta
                                   text-white
                                   px-6
                                   py-2
                                   rounded-sm
                                   hover:bg-[#A0004E]
                                   transition-all
                                   flex items-center
                                   justify-center">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2.5"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>

                        </svg>

                    </button>

                </form>


                <!-- Quick Search Tags -->
                <div class="flex items-center gap-3
                            text-xs
                            text-white/80
                            mt-1.5
                            overflow-x-auto
                            whitespace-nowrap">

                    <a href="#" class="hover:text-brand-gold">
                        Sneakers
                    </a>

                    <a href="#" class="hover:text-brand-gold">
                        High Heels
                    </a>

                    <a href="#" class="hover:text-brand-gold">
                        Running Shoes
                    </a>

                    <a href="#" class="hover:text-brand-gold">
                        Leather Boots
                    </a>

                    <a href="#" class="hover:text-brand-gold">
                        Loafers
                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- CART -->
            <!-- ================================================= -->
            <div class="shrink-0 flex items-center">

                <a href="{{ route('customer.cart.index') }}"
                   class="relative p-2 text-white hover:opacity-90">

                    <svg class="w-8 h-8"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>

                    </svg>


                    @php
                        $cartCount = collect(session('cart', []))->sum('quantity');
                    @endphp


                    @if($cartCount > 0)

                        <span class="absolute top-0 right-0
                                     bg-brand-gold
                                     text-brand-magenta
                                     font-extrabold
                                     text-[10px]
                                     rounded-full
                                     h-5 w-5
                                     flex items-center justify-center
                                     border-2 border-brand-magenta">

                            {{ $cartCount }}

                        </span>

                    @endif

                </a>

            </div>

        </div>

    </header>



    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->
    <main class="flex-1 p-4 md:p-6 max-w-7xl mx-auto w-full space-y-6">


        <!-- ===================================================== -->
        <!-- HEADER CARD -->
        <!-- ===================================================== -->
        <div class="bg-white
                    p-5
                    rounded-lg
                    border border-gray-200
                    shadow-sm
                    flex flex-col md:flex-row
                    items-center
                    justify-between
                    gap-4">

            <div class="flex-1">

                @if($search)

                    <h1 class="text-xl
                               font-bold
                               text-gray-900
                               tracking-tight
                               flex items-center
                               gap-2">

                        <span class="px-2 py-0.5
                                     text-xs
                                     font-bold
                                     bg-brand-gold
                                     text-brand-darkgold
                                     rounded">

                            SEARCH

                        </span>

                        Results for "{{ $search }}"

                    </h1>


                    <p class="text-xs text-gray-500 mt-1">

                        Found

                        <span class="font-semibold">
                            {{ count($products) }}
                        </span>

                        product(s) matching your search

                    </p>

                @else

                    <h1 class="text-xl
                               font-bold
                               text-gray-900
                               tracking-tight
                               flex items-center
                               gap-2">

                        <span class="px-2 py-0.5
                                     text-xs
                                     font-bold
                                     bg-brand-magenta
                                     text-white
                                     rounded">

                            NEW

                        </span>

                        Shop New Shoes

                    </h1>


                    <p class="text-xs text-gray-500 mt-1">

                        Explore fresh arrivals with exclusive voucher discounts & free shipping!

                    </p>

                @endif

            </div>


            @if($search)

                <a href="{{ route('customer.shop') }}"
                   class="text-xs
                          font-semibold
                          text-brand-magenta
                          hover:text-[#A0004E]
                          transition-all
                          flex items-center
                          gap-1">

                    <svg class="w-4 h-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                    Clear Search

                </a>

            @endif

        </div>



        <!-- ===================================================== -->
        <!-- PRODUCT GRID -->
        <!-- ===================================================== -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">


            @forelse($products as $product)

                @php

                    $productId = is_array($product)
                        ? ($product['id'] ?? 1)
                        : $product->id;

                    $productName = is_array($product)
                        ? $product['name']
                        : $product->name;

                    $productCategory = is_array($product)
                        ? $product['category']
                        : $product->category;

                    $productPrice = is_array($product)
                        ? $product['price']
                        : $product->price;

                    $productImage = is_array($product)
                        ? ($product['image'] ?? null)
                        : ($product->image ?? null);

                    // Normalize product sizes so Blade always receives an array.
                    // A value like "35" is valid data for one size, but json_decode("35", true)
                    // returns the integer 35, which cannot be used in @forelse/@foreach.
                    $rawProductSizes = is_array($product)
                        ? ($product['sizes'] ?? null)
                        : ($product->sizes ?? null);

                    if (is_array($rawProductSizes)) {
                        $productSizes = $rawProductSizes;
                    } elseif (is_null($rawProductSizes) || $rawProductSizes === '') {
                        $productSizes = [6, 7, 8, 9, 10, 11, 12, 13];
                    } elseif (is_string($rawProductSizes)) {
                        $decodedSizes = json_decode($rawProductSizes, true);

                        if (json_last_error() === JSON_ERROR_NONE && is_array($decodedSizes)) {
                            $productSizes = $decodedSizes;
                        } elseif (json_last_error() === JSON_ERROR_NONE && is_scalar($decodedSizes)) {
                            $productSizes = [$decodedSizes];
                        } else {
                            // Support plain text such as "35, 36, 37" or a single size "35".
                            $productSizes = array_values(array_filter(
                                array_map('trim', explode(',', $rawProductSizes)),
                                static fn ($size) => $size !== ''
                            ));
                        }
                    } elseif (is_scalar($rawProductSizes)) {
                        $productSizes = [$rawProductSizes];
                    } else {
                        $productSizes = [];
                    }

                @endphp


                <!-- ================================================= -->
                <!-- PRODUCT CARD -->
                <!-- ================================================= -->
                <div class="bg-white
                            rounded-lg
                            border border-gray-200
                            shadow-sm
                            overflow-hidden
                            hover:shadow-lg
                            hover:border-brand-magenta
                            transition-all
                            flex flex-col
                            justify-between
                            group">


                    <div>

                        <!-- ========================================= -->
                        <!-- PRODUCT IMAGE -->
                        <!-- ========================================= -->
                        <div class="h-44
                                    bg-gradient-to-br
                                    from-pink-50
                                    via-white
                                    to-amber-50
                                    flex items-center
                                    justify-center
                                    relative">


                            <!-- Category -->
                            <span class="absolute
                                         top-2 left-2
                                         px-1.5 py-0.5
                                         text-[9px]
                                         font-bold
                                         bg-brand-gold/20
                                         text-brand-darkgold
                                         border
                                         border-brand-gold/40
                                         rounded">

                                {{ $productCategory }}

                            </span>


                            @if($productImage)

                                <img src="{{ asset('storage/' . ltrim($productImage, '/')) }}"
                                     alt="{{ $productName }}"
                                     class="w-full h-full object-contain p-3 group-hover:scale-105 transition-transform"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                                <!-- Placeholder fallback if image cannot be loaded -->
                                <div class="w-16 h-16
                                            rounded-full
                                            bg-brand-magenta/10
                                            text-brand-magenta
                                            items-center
                                            justify-center
                                            text-3xl
                                            font-bold
                                            group-hover:scale-110
                                            transition-transform"
                                     style="display: none;">

                                    {{ strtoupper(substr($productName, 0, 1)) }}

                                </div>

                            @else

                                <!-- Placeholder when no product image is available -->
                                <div class="w-16 h-16
                                            rounded-full
                                            bg-brand-magenta/10
                                            text-brand-magenta
                                            flex items-center
                                            justify-center
                                            text-3xl
                                            font-bold
                                            group-hover:scale-110
                                            transition-transform">

                                    {{ strtoupper(substr($productName, 0, 1)) }}

                                </div>

                            @endif

                        </div>



                        <!-- ========================================= -->
                        <!-- PRODUCT INFORMATION -->
                        <!-- ========================================= -->
                        <div class="p-3 space-y-2">

                            <h2 class="text-sm
                                       font-semibold
                                       text-gray-900
                                       line-clamp-2
                                       h-10">

                                {{ $productName }}

                            </h2>


                            <div class="flex items-baseline justify-between">

                                <p class="text-base
                                          font-black
                                          text-brand-magenta">

                                    RM{{ number_format($productPrice, 2) }}

                                </p>


                                <span class="text-[10px] text-gray-400">
                                    In Stock
                                </span>

                            </div>

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- ADD TO CART -->
                    <!-- ================================================= -->
                    <div class="p-3 pt-0">

                        <form action="{{ route('customer.cart.add') }}"
                              method="POST"
                              class="space-y-2">

                            @csrf


                            <input type="hidden"
                                   name="product_id"
                                   value="{{ $productId }}">


                            <!-- ========================================= -->
                            <!-- SIZE -->
                            <!-- ========================================= -->
                            <div class="flex items-center gap-1.5">
                                <label class="text-[10px] font-semibold text-gray-500">
                                    Size:
                                </label>

                                <select name="size"
                                        required
                                        class="w-full text-[11px] font-semibold rounded border-gray-200 p-1 bg-gray-50 focus:ring-brand-magenta focus:border-brand-magenta">

                                    <!-- Default: no size selected -->
                                    <option value="" selected disabled>
                                        0
                                    </option>

                                    @forelse($productSizes as $size)

                                        <option value="{{ $size }}">
                                            {{ $size }}
                                        </option>

                                    @empty

                                        <option value="" disabled>
                                            No size available
                                        </option>

                                    @endforelse

                                </select>
                            </div>



                            <!-- ========================================= -->
                            <!-- ADD TO CART BUTTON -->
                            <!-- ========================================= -->
                            <button type="submit"
                                    class="w-full
                                           py-2
                                           text-xs
                                           font-bold
                                           text-white
                                           rounded
                                           bg-brand-magenta
                                           hover:bg-[#A0004E]
                                           transition-all
                                           flex items-center
                                           justify-center
                                           gap-1.5
                                           shadow-sm">


                                <svg class="w-3.5 h-3.5 text-brand-gold"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>

                                </svg>


                                Add to Cart

                            </button>

                        </form>

                    </div>

                </div>


            @empty


                <!-- ================================================= -->
                <!-- NO PRODUCTS -->
                <!-- ================================================= -->
                <div class="col-span-full text-center py-12">

                    <svg class="w-16 h-16
                                mx-auto
                                text-gray-300
                                mb-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M20 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 10.5M13 10.5H3.5"/>

                    </svg>


                    <h3 class="text-lg
                               font-semibold
                               text-gray-900
                               mb-1">

                        No products found

                    </h3>


                    <p class="text-sm
                              text-gray-500
                              mb-4">

                        Sorry, we couldn't find any products matching "{{ $search }}"

                    </p>


                    <a href="{{ route('customer.shop') }}"
                       class="inline-flex
                              items-center
                              gap-2
                              bg-brand-magenta
                              text-white
                              text-xs
                              font-bold
                              px-4 py-2
                              rounded-lg
                              hover:bg-[#A0004E]
                              transition-all">

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M10 19l-7-7m0 0l7-7m-7 7h18"/>

                        </svg>

                        Back to Shop

                    </a>

                </div>

            @endforelse

        </div>

    </main>

</body>
</html>