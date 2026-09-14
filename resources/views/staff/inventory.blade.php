<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Inventory Management - Viola Shoe Store</title>

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
                        Staff Portal
                    </p>

                </div>

            </div>


            <!-- Navigation -->

            <nav class="p-4 space-y-1">

                <!-- Dashboard -->

                <a
                    href="{{ route('staff.index') }}"
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
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1-1h-3m-6 0a1 1 0 011-1v4a1 1 0 001 1h6"
                        />

                    </svg>

                    Dashboard

                </a>


                <!-- Orders -->

                <a
                    href="{{ route('staff.orders.index') }}"
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
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                        />

                    </svg>

                    Order Management

                </a>


                <!-- Inventory -->

                <a
                    href="{{ route('staff.inventory.index') }}"
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
                            d="M20 7l-8-4-8 4m0 0l8 4 8-4m0 0v10l-8 4-8-4V7m8 4l8-4"
                        />

                    </svg>

                    Inventory

                </a>


                <!-- Reports -->

                <a
                    href="{{ route('staff.reports.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg
                        class="w-5 h-5 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />

                    </svg>

                    Reports & Analytics

                </a>

            </nav>

        </div>


        <!-- Logout -->

        <div class="p-4 border-t border-gray-100">

            <form
                action="{{ route('logout') }}"
                method="POST"
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
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
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

    <main class="flex-1 p-6 lg:p-10 space-y-6 overflow-y-auto">


        <!-- Header -->

        <header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 border-b border-gray-200 pb-4">

            <div>

                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                    Inventory Management
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Track shoe stock levels, manage sizes, and add new footwear products.
                </p>

            </div>


            <!-- Add Product -->

            <button
                type="button"
                onclick="openAddModal()"
                class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-brand-magenta text-white text-xs font-bold rounded-lg hover:bg-[#A0004E] transition-all shadow-sm"
            >

                <svg
                    class="w-4 h-4 text-brand-gold"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4"
                    />

                </svg>

                Add New Product

            </button>

        </header>



        <!-- =========================================================
             SUCCESS MESSAGE
        ========================================================== -->

        @if(session('success'))

            <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 text-sm">

                {{ session('success') }}

            </div>

        @endif



        <!-- =========================================================
             VALIDATION ERRORS
        ========================================================== -->

        @if($errors->any())

            <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-sm">

                <ul class="list-disc list-inside space-y-1">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <!-- =========================================================
             INVENTORY STATISTICS
        ========================================================== -->

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


            <!-- Total Products -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Total Products
                </p>

                <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                    {{ $stats['total_items'] ?? 0 }}
                </h3>

            </div>


            <!-- In Stock -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    In Stock Units
                </p>

                <h3 class="text-3xl font-extrabold text-green-600 mt-2">
                    {{ number_format($stats['total_stock'] ?? 0) }}
                </h3>

            </div>


            <!-- Low Stock -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Low Stock Warning
                </p>

                <h3 class="text-3xl font-extrabold text-amber-600 mt-2">
                    {{ $stats['low_stock'] ?? 0 }}
                </h3>

            </div>


            <!-- Out Of Stock -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Out of Stock
                </p>

                <h3 class="text-3xl font-extrabold text-red-600 mt-2">
                    {{ $stats['out_of_stock'] ?? 0 }}
                </h3>

            </div>

        </section>



        <!-- =========================================================
             CATEGORY FILTERS
        ========================================================== -->

        <div class="flex flex-col gap-4">


            <div class="flex items-center gap-1 bg-white p-1 rounded-xl border border-gray-200 shadow-sm overflow-x-auto">

                <a
                    href="{{ route('staff.inventory.index') }}"
                    class="px-4 py-2 text-xs font-bold rounded-lg whitespace-nowrap {{ !request('category') ? 'bg-brand-magenta text-white' : 'text-gray-600 hover:text-brand-magenta' }}"
                >
                    All Footwear
                </a>


                <a
                    href="{{ route('staff.inventory.index', ['category' => 'heels']) }}"
                    class="px-4 py-2 text-xs font-bold rounded-lg whitespace-nowrap {{ request('category') == 'heels' ? 'bg-brand-magenta text-white' : 'text-gray-600 hover:text-brand-magenta' }}"
                >
                    Heels
                </a>


                <a
                    href="{{ route('staff.inventory.index', ['category' => 'flats']) }}"
                    class="px-4 py-2 text-xs font-bold rounded-lg whitespace-nowrap {{ request('category') == 'flats' ? 'bg-brand-magenta text-white' : 'text-gray-600 hover:text-brand-magenta' }}"
                >
                    Flats
                </a>


                <a
                    href="{{ route('staff.inventory.index', ['category' => 'sandals']) }}"
                    class="px-4 py-2 text-xs font-bold rounded-lg whitespace-nowrap {{ request('category') == 'sandals' ? 'bg-brand-magenta text-white' : 'text-gray-600 hover:text-brand-magenta' }}"
                >
                    Sandals
                </a>


                <a
                    href="{{ route('staff.inventory.index', ['category' => 'sneakers']) }}"
                    class="px-4 py-2 text-xs font-bold rounded-lg whitespace-nowrap {{ request('category') == 'sneakers' ? 'bg-brand-magenta text-white' : 'text-gray-600 hover:text-brand-magenta' }}"
                >
                    Sneakers
                </a>


                <a
                    href="{{ route('staff.inventory.index', ['category' => 'boots']) }}"
                    class="px-4 py-2 text-xs font-bold rounded-lg whitespace-nowrap {{ request('category') == 'boots' ? 'bg-brand-magenta text-white' : 'text-gray-600 hover:text-brand-magenta' }}"
                >
                    Boots
                </a>

            </div>


            <!-- Search -->

            <form
                action="{{ route('staff.inventory.index') }}"
                method="GET"
                class="flex gap-2 w-full"
            >

                @if(request('category'))

                    <input
                        type="hidden"
                        name="category"
                        value="{{ request('category') }}"
                    >

                @endif


                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search Product..."
                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-brand-magenta outline-none bg-white"
                >


                <button
                    type="submit"
                    class="px-4 py-2 bg-brand-magenta text-white text-xs font-bold rounded-lg hover:bg-[#A0004E] transition-all"
                >
                    Search
                </button>

            </form>

        </div>



        <!-- =========================================================
             INVENTORY TABLE
        ========================================================== -->

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="bg-gray-50 border-b border-gray-200">

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Product
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Category
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Price
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Stock Qty
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Stock Status
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($products as $product)

                            @php

                                $stock =
                                    (int) ($product['stock'] ?? 0);

                                $productName =
                                    $product['name'] ?? 'Product';

                                $brand =
                                    $product['brand'] ?? '';

                                $initials =
                                    strtoupper(
                                        substr(
                                            $productName,
                                            0,
                                            2
                                        )
                                    );

                            @endphp


                            <tr class="hover:bg-gray-50 transition-all">


                                <!-- Product -->

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-12 h-12 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center overflow-hidden shrink-0">

                                            @if(!empty($product['image']))
                                                <img
                                                    src="{{ asset('storage/' . $product['image']) }}"
                                                    alt="{{ $productName }}"
                                                    class="w-full h-full object-cover"
                                                >
                                            @else
                                                <span class="font-bold text-xs text-brand-magenta">
                                                    {{ $initials }}
                                                </span>
                                            @endif

                                        </div>


                                        <div>

                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $productName }}
                                            </p>


                                            @if($brand)

                                                <p class="text-xs text-gray-500">
                                                    Brand: {{ $brand }}
                                                </p>

                                            @endif


                                            <p class="text-xs text-gray-400">
                                                Sizes: {{ $product['sizes'] ?: 'N/A' }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- Category -->

                                <td class="px-6 py-4">

                                    <span class="text-xs text-gray-600 bg-gray-100 px-2.5 py-1 rounded-md font-medium">

                                        {{ $product['category'] ?: 'Uncategorized' }}

                                    </span>

                                </td>


                                <!-- Price -->

                                <td class="px-6 py-4">

                                    <span class="text-sm font-bold text-gray-900">

                                        RM {{ number_format((float) $product['price'], 2) }}

                                    </span>

                                </td>


                                <!-- Stock -->

                                <td class="px-6 py-4">

                                    <span class="text-xs font-bold text-gray-900">

                                        {{ number_format($stock) }} units

                                    </span>

                                </td>


                                <!-- Status -->

                                <td class="px-6 py-4">

                                    @if($stock <= 0)

                                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-red-50 text-red-600 border border-red-200">
                                            Out of Stock
                                        </span>

                                    @elseif($stock <= 5)

                                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-amber-50 text-amber-600 border border-amber-200">
                                            Low Stock
                                        </span>

                                    @else

                                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-50 text-green-600 border border-green-200">
                                            In Stock
                                        </span>

                                    @endif

                                </td>


                                <!-- Action -->

                                <td class="px-6 py-4">

                                    <button
                                        type="button"
                                        onclick="openEditModal(
                                            {{ $product['id'] }},
                                            @js($productName),
                                            {{ (int) $product['stock'] }},
                                            {{ (float) $product['price'] }},
                                            @js($product['image'] ?? '')
                                        )"
                                        class="text-xs font-bold text-brand-magenta hover:underline"
                                    >

                                        Edit

                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="px-6 py-12 text-center"
                                >

                                    <div class="flex flex-col items-center gap-2">

                                        <svg
                                            class="w-12 h-12 text-gray-300"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M20 7l-8-4-8 4m0 0l8 4 8-4m0 0v10l-8 4-8-4V7m8 4l8-4"
                                            />

                                        </svg>

                                        <p class="text-gray-500 text-sm">
                                            No products found in inventory.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>



    <!-- =========================================================
         ADD PRODUCT MODAL
    ========================================================== -->

    <div
        id="addProductModal"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50"
    >

        <div class="bg-white rounded-xl shadow-xl max-w-lg w-full max-h-[90vh] overflow-y-auto">


            <!-- Modal Header -->

            <div class="p-6 border-b border-gray-200 flex items-center justify-between">

                <div>

                    <h2 class="text-xl font-bold text-gray-900">
                        Add New Product
                    </h2>

                    <p class="text-xs text-gray-500 mt-1">
                        Add a new shoe product to inventory.
                    </p>

                </div>


                <button
                    type="button"
                    onclick="closeAddModal()"
                    class="text-gray-400 hover:text-gray-700 text-2xl leading-none"
                >
                    &times;
                </button>

            </div>


            <!-- Add Product Form -->

            <form
                action="{{ route('staff.inventory.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-6 space-y-4"
            >

                @csrf


                <!-- Product Name -->

                <div>

                    <label
                        for="add_name"
                        class="block text-sm font-semibold text-gray-700 mb-1"
                    >
                        Product Name
                    </label>

                    <input
                        type="text"
                        id="add_name"
                        name="name"
                        value="{{ old('name') }}"
                        maxlength="255"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none"
                        placeholder="e.g. Air Jordan 1"
                    >

                </div>


                <!-- Brand -->

                <div>

                    <label
                        for="add_brand"
                        class="block text-sm font-semibold text-gray-700 mb-1"
                    >
                        Brand
                    </label>

                    <input
                        type="text"
                        id="add_brand"
                        name="brand"
                        value="{{ old('brand') }}"
                        maxlength="100"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none"
                        placeholder="e.g. Jordan"
                    >

                </div>


                <!-- Category -->

                <div>

                    <label
                        for="add_category"
                        class="block text-sm font-semibold text-gray-700 mb-1"
                    >
                        Category
                    </label>

                    <select
                        id="add_category"
                        name="category"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-magenta outline-none"
                    >

                        <option value="">
                            Select Category
                        </option>

                        <option
                            value="heels"
                            {{ old('category') === 'heels' ? 'selected' : '' }}
                        >
                            Heels
                        </option>

                        <option
                            value="flats"
                            {{ old('category') === 'flats' ? 'selected' : '' }}
                        >
                            Flats
                        </option>

                        <option
                            value="sandals"
                            {{ old('category') === 'sandals' ? 'selected' : '' }}
                        >
                            Sandals
                        </option>

                        <option
                            value="sneakers"
                            {{ old('category') === 'sneakers' ? 'selected' : '' }}
                        >
                            Sneakers
                        </option>

                        <option
                            value="boots"
                            {{ old('category') === 'boots' ? 'selected' : '' }}
                        >
                            Boots
                        </option>

                    </select>

                </div>


                <!-- Price / Stock -->

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


                    <!-- Price -->

                    <div>

                        <label
                            for="add_price"
                            class="block text-sm font-semibold text-gray-700 mb-1"
                        >
                            Price (RM)
                        </label>

                        <input
                            type="number"
                            id="add_price"
                            name="price"
                            value="{{ old('price') }}"
                            min="0"
                            step="0.01"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none"
                            placeholder="0.00"
                        >

                    </div>


                    <!-- Stock -->

                    <div>

                        <label
                            for="add_stock"
                            class="block text-sm font-semibold text-gray-700 mb-1"
                        >
                            Initial Stock
                        </label>

                        <input
                            type="number"
                            id="add_stock"
                            name="stock"
                            value="{{ old('stock', 0) }}"
                            min="0"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none"
                            placeholder="0"
                        >

                    </div>

                </div>


                <!-- Sizes -->

                <div>

                    <label
                        for="add_sizes"
                        class="block text-sm font-semibold text-gray-700 mb-1"
                    >
                        Available Sizes
                    </label>

                    <input
                        type="text"
                        id="add_sizes"
                        name="sizes"
                        value="{{ old('sizes') }}"
                        maxlength="255"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none"
                        placeholder="e.g. 35, 36, 37, 38, 39"
                    >

                    <p class="text-[11px] text-gray-400 mt-1">
                        Enter sizes separated by commas.
                    </p>

                </div>


                <!-- Product Image -->

                <div>

                    <label
                        for="add_image"
                        class="block text-sm font-semibold text-gray-700 mb-1"
                    >
                        Product Image
                    </label>

                    <input
                        type="file"
                        id="add_image"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-magenta outline-none"
                    >

                    <p class="text-[11px] text-gray-400 mt-1">
                        Upload a JPG, PNG, or WEBP image. Maximum size: 2 MB.
                    </p>

                    <div class="mt-3 hidden" id="imagePreviewContainer">
                        <img
                            id="imagePreview"
                            src=""
                            alt="Product image preview"
                            class="w-32 h-32 rounded-lg border border-gray-200 object-cover"
                        >
                    </div>

                </div>


                <!-- Buttons -->

                <div class="flex gap-2 pt-4 border-t border-gray-200">

                    <button
                        type="button"
                        onclick="closeAddModal()"
                        class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 text-sm font-bold rounded-lg hover:bg-gray-200 transition-all"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="flex-1 px-4 py-2 bg-brand-magenta text-white text-sm font-bold rounded-lg hover:bg-[#A0004E] transition-all"
                    >
                        Add Product
                    </button>

                </div>

            </form>

        </div>

    </div>



    <!-- =========================================================
         EDIT PRODUCT MODAL
    ========================================================== -->

    <div
        id="editStockModal"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50"
    >

        <div class="bg-white rounded-xl shadow-xl max-w-md w-full">


            <!-- Header -->

            <div class="p-6 border-b border-gray-200 flex items-center justify-between">

                <div>

                    <h2 class="text-xl font-bold text-gray-900">
                        Edit Product
                    </h2>

                    <p
                        id="modalProductName"
                        class="text-xs text-gray-500 mt-1"
                    ></p>

                </div>


                <button
                    type="button"
                    onclick="closeEditModal()"
                    class="text-gray-400 hover:text-gray-700 text-2xl leading-none"
                >
                    &times;
                </button>

            </div>


            <!-- Edit Form -->

            <form
                id="editStockForm"
                method="POST"
                action=""
                enctype="multipart/form-data"
                class="p-6 space-y-4"
            >

                @csrf

                @method('PUT')


                <!-- Stock -->

                <div>

                    <label
                        for="modalStockInput"
                        class="block text-sm font-semibold text-gray-700 mb-1"
                    >
                        Available Stock
                    </label>

                    <input
                        type="number"
                        id="modalStockInput"
                        name="stock"
                        min="0"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none"
                    >

                </div>


                <!-- Price -->

                <div>

                    <label
                        for="modalPriceInput"
                        class="block text-sm font-semibold text-gray-700 mb-1"
                    >
                        Unit Price (RM)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        id="modalPriceInput"
                        name="price"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none"
                    >

                </div>


                <!-- Product Image -->

                <div>

                    <label
                        for="modalImageInput"
                        class="block text-sm font-semibold text-gray-700 mb-1"
                    >
                        Product Image
                    </label>

                    <input
                        type="file"
                        id="modalImageInput"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white focus:ring-2 focus:ring-brand-magenta outline-none"
                    >

                    <p class="text-[11px] text-gray-400 mt-1">
                        Upload a JPG, PNG, or WEBP image. Maximum size: 2 MB. Leave empty to keep the current image.
                    </p>

                    <div
                        id="editImagePreviewContainer"
                        class="mt-3 hidden"
                    >
                        <img
                            id="editImagePreview"
                            src=""
                            alt="Product image preview"
                            class="w-32 h-32 rounded-lg border border-gray-200 object-cover"
                        >
                    </div>

                </div>


                <!-- Buttons -->

                <div class="flex gap-2 pt-4 border-t border-gray-200">

                    <button
                        type="button"
                        onclick="closeEditModal()"
                        class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 text-sm font-bold rounded-lg hover:bg-gray-200 transition-all"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="flex-1 px-4 py-2 bg-brand-magenta text-white text-sm font-bold rounded-lg hover:bg-[#A0004E] transition-all"
                    >
                        Save Changes
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
        | Add Product Modal
        |--------------------------------------------------------------------------
        */

        function openAddModal()
        {
            const modal =
                document.getElementById(
                    'addProductModal'
                );

            modal.classList.remove(
                'hidden'
            );

            modal.classList.add(
                'flex'
            );
        }


        function closeAddModal()
        {
            const modal =
                document.getElementById(
                    'addProductModal'
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
        | Product Image Preview
        |--------------------------------------------------------------------------
        */

        const imageInput =
            document.getElementById('add_image');

        const imagePreviewContainer =
            document.getElementById('imagePreviewContainer');

        const imagePreview =
            document.getElementById('imagePreview');

        if (imageInput) {
            imageInput.addEventListener(
                'change',
                function (event) {
                    const file =
                        event.target.files[0];

                    if (!file) {
                        imagePreviewContainer.classList.add('hidden');
                        imagePreview.src = '';
                        return;
                    }

                    const allowedTypes = [
                        'image/jpeg',
                        'image/png',
                        'image/webp'
                    ];

                    if (!allowedTypes.includes(file.type)) {
                        alert('Please select a JPG, PNG, or WEBP image.');
                        event.target.value = '';
                        imagePreviewContainer.classList.add('hidden');
                        imagePreview.src = '';
                        return;
                    }

                    if (file.size > 2 * 1024 * 1024) {
                        alert('Image size must not exceed 2 MB.');
                        event.target.value = '';
                        imagePreviewContainer.classList.add('hidden');
                        imagePreview.src = '';
                        return;
                    }

                    const reader =
                        new FileReader();

                    reader.onload =
                        function (e) {
                            imagePreview.src =
                                e.target.result;

                            imagePreviewContainer.classList.remove(
                                'hidden'
                            );
                        };

                    reader.readAsDataURL(file);
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Edit Product Modal
        |--------------------------------------------------------------------------
        */

        function openEditModal(
            productId,
            productName,
            currentStock,
            currentPrice,
            currentImage
        )
        {
            const modal =
                document.getElementById(
                    'editStockModal'
                );

            const form =
                document.getElementById(
                    'editStockForm'
                );

            const nameField =
                document.getElementById(
                    'modalProductName'
                );

            const stockField =
                document.getElementById(
                    'modalStockInput'
                );

            const priceField =
                document.getElementById(
                    'modalPriceInput'
                );


            nameField.textContent =
                productName;


            stockField.value =
                currentStock;


            priceField.value =
                currentPrice;


            const editImageInput =
                document.getElementById('modalImageInput');

            const editImagePreviewContainer =
                document.getElementById('editImagePreviewContainer');

            const editImagePreview =
                document.getElementById('editImagePreview');

            if (editImageInput) {
                editImageInput.value = '';
            }

            if (currentImage) {
                editImagePreview.src =
                    "{{ asset('storage') }}/" + currentImage;

                editImagePreviewContainer.classList.remove('hidden');
            } else {
                editImagePreview.src = '';
                editImagePreviewContainer.classList.add('hidden');
            }


            /*
             * PUT /staff/inventory/{id}/stock
             */

            form.action =
                "{{ url('/staff/inventory') }}"
                + "/"
                + productId
                + "/stock";


            modal.classList.remove(
                'hidden'
            );

            modal.classList.add(
                'flex'
            );
        }


        function closeEditModal()
        {
            const modal =
                document.getElementById(
                    'editStockModal'
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
        | Edit Product Image Preview
        |--------------------------------------------------------------------------
        */

        const editImageInputElement =
            document.getElementById('modalImageInput');

        const editImagePreviewContainerElement =
            document.getElementById('editImagePreviewContainer');

        const editImagePreviewElement =
            document.getElementById('editImagePreview');

        if (editImageInputElement) {
            editImageInputElement.addEventListener(
                'change',
                function (event) {
                    const file =
                        event.target.files[0];

                    if (!file) {
                        return;
                    }

                    const allowedTypes = [
                        'image/jpeg',
                        'image/png',
                        'image/webp'
                    ];

                    if (!allowedTypes.includes(file.type)) {
                        alert('Please select a JPG, PNG, or WEBP image.');
                        event.target.value = '';
                        return;
                    }

                    if (file.size > 2 * 1024 * 1024) {
                        alert('Image size must not exceed 2 MB.');
                        event.target.value = '';
                        return;
                    }

                    const reader =
                        new FileReader();

                    reader.onload =
                        function (e) {
                            editImagePreviewElement.src =
                                e.target.result;

                            editImagePreviewContainerElement.classList.remove('hidden');
                        };

                    reader.readAsDataURL(file);
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Close Add Modal By Clicking Outside
        |--------------------------------------------------------------------------
        */

        document
            .getElementById(
                'addProductModal'
            )
            .addEventListener(
                'click',
                function (event)
                {
                    if (
                        event.target ===
                        this
                    ) {

                        closeAddModal();

                    }
                }
            );


        /*
        |--------------------------------------------------------------------------
        | Close Edit Modal By Clicking Outside
        |--------------------------------------------------------------------------
        */

        document
            .getElementById(
                'editStockModal'
            )
            .addEventListener(
                'click',
                function (event)
                {
                    if (
                        event.target ===
                        this
                    ) {

                        closeEditModal();

                    }
                }
            );

    </script>


</body>

</html>