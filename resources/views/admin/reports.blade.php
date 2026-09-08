<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Reports & Analytics - Viola Shoe Store</title>

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
                        Admin Portal
                    </p>

                </div>

            </div>


            <!-- Navigation -->

            <nav class="p-4 space-y-1">


                <!-- Dashboard -->

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg
                        class="w-5 h-5 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />

                    </svg>

                    Dashboard

                </a>


                <!-- Staff Management -->

                <a
                    href="{{ route('admin.manage') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg
                        class="w-5 h-5 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />

                    </svg>

                    Staff Management

                </a>


                <!-- Logs -->

                <a
                    href="{{ route('admin.logs.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >

                    <svg
                        class="w-5 h-5 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a2 2 0 01.293.707V19a2 2 0 01-2 2z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />

                    </svg>

                    Activity Audit Logs

                </a>


                <!-- Reports -->

                <a
                    href="{{ route('admin.reports.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all"
                >

                    <svg
                        class="w-5 h-5 text-brand-gold"
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


                <!-- Storefront -->

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
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />

                    </svg>

                    View Storefront

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

    <main class="flex-1 p-6 lg:p-10 space-y-6 overflow-y-auto">


        <!-- Header -->

        <header class="border-b border-gray-200 pb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div>

                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                    Reports & Analytics
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Real-time store performance and sales analytics.
                </p>

            </div>


            <!-- Period Filter -->

            <form
                method="GET"
                action="{{ route('admin.reports.index') }}"
                class="flex items-center gap-2"
            >

                <label class="text-xs font-semibold text-gray-500">
                    Period
                </label>

                <select
                    name="period"
                    onchange="this.form.submit()"
                    class="px-3 py-2 bg-white border border-gray-300 rounded-lg text-xs font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-brand-magenta"
                >

                    <option value="7" {{ $period == 7 ? 'selected' : '' }}>
                        Last 7 Days
                    </option>

                    <option value="30" {{ $period == 30 ? 'selected' : '' }}>
                        Last 30 Days
                    </option>

                    <option value="90" {{ $period == 90 ? 'selected' : '' }}>
                        Last 90 Days
                    </option>

                    <option value="365" {{ $period == 365 ? 'selected' : '' }}>
                        Last 12 Months
                    </option>

                </select>

            </form>

        </header>



        <!-- =====================================================
             SUMMARY CARDS
        ====================================================== -->

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


            <!-- Revenue -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Sales Revenue
                </p>

                <h3 class="text-2xl font-extrabold text-gray-900 mt-2">

                    RM{{ number_format($totalRevenue ?? 0, 2) }}

                </h3>

                <span
                    class="text-xs font-semibold mt-1 inline-block {{ ($revenueChange ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}"
                >

                    {{ ($revenueChange ?? 0) >= 0 ? '↑' : '↓' }}

                    {{ number_format(abs($revenueChange ?? 0), 1) }}%

                    vs previous period

                </span>

            </div>


            <!-- Units Sold -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Units Sold
                </p>

                <h3 class="text-2xl font-extrabold text-gray-900 mt-2">

                    {{ number_format($unitsSold ?? 0) }} Pairs

                </h3>

                <span
                    class="text-xs font-semibold mt-1 inline-block {{ ($unitsChange ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}"
                >

                    {{ ($unitsChange ?? 0) >= 0 ? '↑' : '↓' }}

                    {{ number_format(abs($unitsChange ?? 0), 1) }}%

                    vs previous period

                </span>

            </div>


            <!-- Average Order -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Average Order Value
                </p>

                <h3 class="text-2xl font-extrabold text-gray-900 mt-2">

                    RM{{ number_format($averageOrderValue ?? 0, 2) }}

                </h3>

                <span class="text-xs text-gray-500 font-medium mt-1 inline-block">

                    Based on completed orders

                </span>

            </div>


            <!-- Orders -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Orders
                </p>

                <h3 class="text-2xl font-extrabold text-gray-900 mt-2">

                    {{ number_format($totalOrders ?? 0) }}

                </h3>

                <span class="text-xs text-gray-500 font-medium mt-1 inline-block">

                    {{ number_format($completedOrders ?? 0) }} completed

                    ·

                    {{ number_format($pendingOrders ?? 0) }} pending

                </span>

            </div>

        </section>



        <!-- =====================================================
             CATEGORY PERFORMANCE
        ====================================================== -->

        <section class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-5">

            <div>

                <h2 class="text-lg font-bold text-gray-900">
                    Top Performing Shoe Categories
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Revenue distribution for the selected period.
                </p>

            </div>


            @forelse($salesByCategory as $category)

                <div>

                    <div class="flex justify-between items-center text-xs font-bold mb-1">

                        <span class="text-gray-700">
                            {{ $category->category ?: 'Uncategorized' }}
                        </span>

                        <span class="text-brand-magenta">

                            RM{{ number_format($category->revenue, 2) }}

                            ({{ number_format($category->percentage, 1) }}%)

                        </span>

                    </div>


                    <div class="w-full bg-gray-100 rounded-full h-2.5">

                        <div
                            class="bg-brand-magenta h-2.5 rounded-full"
                            style="width: {{ min($category->percentage, 100) }}%"
                        ></div>

                    </div>

                </div>

            @empty

                <div class="py-8 text-center text-sm text-gray-500">

                    No completed sales found for this period.

                </div>

            @endforelse

        </section>



        <!-- =====================================================
             TOP PRODUCTS
        ====================================================== -->

        <section class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <div class="mb-5">

                <h2 class="text-lg font-bold text-gray-900">
                    Top Performing Products
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Highest-selling products during the selected period.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500 border-b border-gray-200">

                        <tr>

                            <th class="px-4 py-3">
                                #
                            </th>

                            <th class="px-4 py-3">
                                Product
                            </th>

                            <th class="px-4 py-3 text-right">
                                Units Sold
                            </th>

                            <th class="px-4 py-3 text-right">
                                Revenue
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($topProducts as $index => $product)

                            <tr class="hover:bg-gray-50/50">

                                <td class="px-4 py-3 font-bold text-gray-400">

                                    {{ $index + 1 }}

                                </td>

                                <td class="px-4 py-3 font-semibold text-gray-900">

                                    {{ $product->name }}

                                </td>

                                <td class="px-4 py-3 text-right text-gray-600">

                                    {{ number_format($product->units_sold) }}

                                </td>

                                <td class="px-4 py-3 text-right font-semibold text-gray-900">

                                    RM{{ number_format($product->revenue, 2) }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="px-4 py-8 text-center text-gray-500"
                                >

                                    No product sales found for this period.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>



        <!-- =====================================================
             SALES BY DATE
        ====================================================== -->

        <section class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <div class="mb-5">

                <h2 class="text-lg font-bold text-gray-900">
                    Sales by Date
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Daily completed-order performance.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500 border-b border-gray-200">

                        <tr>

                            <th class="px-4 py-3">
                                Date
                            </th>

                            <th class="px-4 py-3 text-right">
                                Orders
                            </th>

                            <th class="px-4 py-3 text-right">
                                Revenue
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($salesByDate as $sale)

                            <tr class="hover:bg-gray-50/50">

                                <td class="px-4 py-3 text-gray-700">

                                    {{ \Carbon\Carbon::parse($sale->date)->format('d M Y') }}

                                </td>

                                <td class="px-4 py-3 text-right font-semibold">

                                    {{ number_format($sale->order_count) }}

                                </td>

                                <td class="px-4 py-3 text-right font-semibold text-gray-900">

                                    RM{{ number_format($sale->revenue, 2) }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="3"
                                    class="px-4 py-8 text-center text-gray-500"
                                >

                                    No sales found for this period.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>



        <!-- =====================================================
             REPORT SUMMARY
        ====================================================== -->

        <section class="grid grid-cols-1 md:grid-cols-3 gap-4">


            <!-- Completed Orders -->

            <div class="bg-white rounded-xl border border-gray-200 p-5">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Completed Orders
                </p>

                <p class="text-2xl font-extrabold text-emerald-600 mt-2">

                    {{ number_format($completedOrders ?? 0) }}

                </p>

            </div>


            <!-- Pending Orders -->

            <div class="bg-white rounded-xl border border-gray-200 p-5">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Pending Orders
                </p>

                <p class="text-2xl font-extrabold text-brand-darkgold mt-2">

                    {{ number_format($pendingOrders ?? 0) }}

                </p>

            </div>


            <!-- Activities -->

            <div class="bg-white rounded-xl border border-gray-200 p-5">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Activity Records
                </p>

                <p class="text-2xl font-extrabold text-blue-600 mt-2">

                    {{ number_format($activityCount ?? 0) }}

                </p>

                <p class="text-xs text-gray-500 mt-1">
                    Logged during selected period
                </p>

            </div>

        </section>


    </main>

</body>

</html>
