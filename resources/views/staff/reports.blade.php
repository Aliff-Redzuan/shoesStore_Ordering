<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports & Analytics - Viola Shoe Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
<aside class="w-full md:w-64 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col justify-between min-h-screen">
    <div>
        <div class="p-6 border-b border-gray-100 flex items-center gap-3 bg-brand-magenta/5">
            <div class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-sm overflow-hidden">
                <img src="/images/ViolaLogo.png" alt="Viola Shoe Store Logo" class="w-full h-full object-cover">
            </div>

            <div>
                <h2 class="font-bold text-gray-900 text-base leading-tight">Viola Shoe Store</h2>
                <p class="text-xs text-brand-darkgold font-semibold">Staff Portal</p>
            </div>
        </div>

        <nav class="p-4 space-y-1">

            <a href="{{ route('staff.index') }}"
               class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('staff.orders.index') }}"
               class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z">
                    </path>
                </svg>
                Order Management
            </a>

            <a href="{{ route('staff.inventory.index') }}"
               class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 7l-8-4-8 4m0 0l8 4 8-4m0 0v10l-8 4-8-4V7m8 4l8-4">
                    </path>
                </svg>
                Inventory
            </a>

            <a href="{{ route('staff.reports.index') }}"
               class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all">
                <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                Reports & Analytics
            </a>

        </nav>
    </div>

    <div class="p-4 border-t border-gray-100 space-y-3">
        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf

            <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg border border-gray-200 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>


<main class="flex-1 p-6 lg:p-10 space-y-6 overflow-y-auto">

    <header class="border-b border-gray-200 pb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                Reports & Analytics
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Sales metrics, order analytics, and business performance insights.
            </p>
        </div>

        <form action="{{ route('staff.reports.index') }}"
              method="GET"
              class="flex flex-wrap items-center gap-2">

            <input type="date"
                   name="date_from"
                   value="{{ $dateFrom ?? '' }}"
                   class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none bg-white">

            <span class="text-gray-400 text-sm">to</span>

            <input type="date"
                   name="date_to"
                   value="{{ $dateTo ?? '' }}"
                   class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none bg-white">

            <button type="submit"
                    class="px-4 py-2 bg-brand-magenta text-white text-xs font-bold rounded-lg hover:bg-[#A0004E] transition-all shadow-sm">
                Filter
            </button>

            <button type="button"
                    onclick="exportToCSV()"
                    class="px-4 py-2 bg-emerald-600 text-white text-xs font-bold rounded-lg hover:bg-emerald-700 transition-all shadow-sm flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Export CSV
            </button>

        </form>
    </header>


    <!-- Summary Cards -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <!-- Total Revenue -->
        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Total Revenue
                    </p>

                    <h3 class="text-2xl font-extrabold text-gray-800 mt-2">
                        RM{{ number_format((float) ($totalRevenue ?? 0), 2) }}
                    </h3>

                    <p class="text-xs text-gray-500 font-medium mt-1">
                        Completed & delivered orders
                    </p>
                </div>

                <div class="w-12 h-12 rounded-lg bg-brand-magenta/10 flex items-center justify-center text-brand-magenta">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>

            </div>
        </div>


        <!-- Total Orders -->
        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Total Orders
                    </p>

                    <h3 class="text-2xl font-extrabold text-blue-600 mt-2">
                        {{ number_format((int) ($totalOrders ?? 0)) }}
                    </h3>

                    <p class="text-xs text-gray-500 mt-1">
                        Avg: RM{{ number_format((float) ($averageOrderValue ?? 0), 2) }}
                    </p>
                </div>

                <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z">
                        </path>
                    </svg>
                </div>

            </div>
        </div>


        <!-- Conversion Rate -->
        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Conversion Rate
                    </p>

                    <h3 class="text-2xl font-extrabold text-purple-600 mt-2">
                        N/A
                    </h3>

                    <p class="text-xs text-gray-500 mt-1">
                        Visitor data unavailable
                    </p>
                </div>

                <div class="w-12 h-12 rounded-lg bg-purple-50 flex items-center justify-center text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 10V3L4 14h7v7l9-11h-7z">
                        </path>
                    </svg>
                </div>

            </div>
        </div>


        <!-- Satisfaction -->
        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Satisfaction
                    </p>

                    <h3 class="text-2xl font-extrabold text-amber-500 mt-2">
                        @if(isset($averageRating) && $averageRating !== null)
                            {{ number_format((float) $averageRating, 1) }}/5
                        @else
                            N/A
                        @endif
                    </h3>

                    <p class="text-xs text-gray-500 mt-1">
                        @if(isset($averageRating) && $averageRating !== null)
                            Based on {{ number_format((int) ($reviewCount ?? 0)) }} review{{ (($reviewCount ?? 0) == 1) ? '' : 's' }}
                        @else
                            No reviews available
                        @endif
                    </p>
                </div>

                <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center text-amber-500">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>

            </div>
        </div>

    </section>


    <!-- Revenue Trend -->
    <section class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">

        <h2 class="text-lg font-bold text-gray-900 mb-4">
            Revenue Trend
        </h2>

        <div class="h-64 w-full">
            <canvas id="revenueChart"></canvas>
        </div>

    </section>


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


        <!-- Top Selling Products -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-bold text-gray-900">
                    Top Selling Products
                </h2>

                <a href="{{ route('staff.inventory.index') }}"
                   class="text-xs font-bold text-brand-magenta hover:underline">
                    View Inventory →
                </a>
            </div>

            <div class="space-y-4">

                @forelse($topSellingProducts as $index => $product)

                    <div class="flex items-center justify-between pb-3 border-b border-gray-100 last:border-b-0 product-item">

                        <div class="flex items-center gap-3 flex-1">

                            <span class="w-6 h-6 rounded-full bg-gray-100 text-xs font-bold text-gray-500 flex items-center justify-center">
                                {{ $index + 1 }}
                            </span>

                            <div>
                                <p class="text-sm font-semibold text-gray-900 product-name">
                                    {{ $product->product_name }}
                                </p>

                                <p class="text-xs text-gray-500 product-sales">
                                    {{ number_format((int) $product->units_sold) }} units sold
                                </p>
                            </div>

                        </div>

                        <div class="text-right">
                            <p class="text-sm font-bold text-gray-900 product-revenue">
                                RM{{ number_format((float) $product->revenue, 2) }}
                            </p>
                        </div>

                    </div>

                @empty

                    <div class="py-8 text-center">
                        <p class="text-sm text-gray-500">
                            No sales data available for the selected period.
                        </p>
                    </div>

                @endforelse

            </div>
        </div>


        <!-- Sales by Category -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-900">
                    Sales by Category
                </h2>
            </div>

            <div class="space-y-4">

                @forelse($categorySales as $category)

                    <div class="flex items-center gap-3">

                        <div class="flex-1">

                            <div class="flex justify-between text-sm mb-1">

                                <span class="font-semibold text-gray-900">
                                    {{ $category->category ?: 'Uncategorized' }}
                                </span>

                                <span class="font-bold text-gray-700">
                                    {{ number_format((float) $category->percentage, 1) }}%
                                </span>

                            </div>

                            <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">

                                <div class="bg-brand-magenta rounded-full h-2"
                                     style="width: {{ min((float) $category->percentage, 100) }}%">
                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="py-8 text-center">
                        <p class="text-sm text-gray-500">
                            No category sales data available for the selected period.
                        </p>
                    </div>

                @endforelse

            </div>
        </div>


        <!-- Order Status Distribution -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <h2 class="text-lg font-bold text-gray-900 mb-6">
                Order Status Distribution
            </h2>

            <div class="space-y-4">

                <div class="flex items-center justify-between pb-3 border-b border-gray-100 last:border-b-0">

                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-1 text-xs font-bold rounded-md border bg-amber-50 text-amber-700 border-amber-200">
                            Pending
                        </span>
                    </div>

                    <span class="text-sm font-bold text-gray-900">
                        {{ number_format((int) ($pendingOrders ?? 0)) }} orders
                    </span>

                </div>


                <div class="flex items-center justify-between pb-3 border-b border-gray-100 last:border-b-0">

                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-1 text-xs font-bold rounded-md border bg-blue-50 text-blue-700 border-blue-200">
                            Processing
                        </span>
                    </div>

                    <span class="text-sm font-bold text-gray-900">
                        {{ number_format((int) ($processingOrders ?? 0)) }} orders
                    </span>

                </div>


                <div class="flex items-center justify-between pb-3 border-b border-gray-100 last:border-b-0">

                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-1 text-xs font-bold rounded-md border bg-purple-50 text-purple-700 border-purple-200">
                            Shipped
                        </span>
                    </div>

                    <span class="text-sm font-bold text-gray-900">
                        {{ number_format((int) ($shippedOrders ?? 0)) }} orders
                    </span>

                </div>


                <div class="flex items-center justify-between pb-3 border-b border-gray-100 last:border-b-0">

                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-1 text-xs font-bold rounded-md border bg-emerald-50 text-emerald-700 border-emerald-200">
                            Delivered
                        </span>
                    </div>

                    <span class="text-sm font-bold text-gray-900">
                        {{ number_format((int) ($deliveredOrders ?? 0)) }} orders
                    </span>

                </div>

            </div>
        </div>
    </div>

</main>


<script>

    // Database Revenue Trend Data
    const revenueLabels = @json($revenueLabels ?? []);
    const revenueData = @json($revenueData ?? []);

    const ctx = document.getElementById('revenueChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',

        data: {
            labels: revenueLabels,

            datasets: [{
                label: 'Revenue (RM)',
                data: revenueData,
                borderColor: '#C2005F',
                backgroundColor: 'rgba(194, 0, 95, 0.08)',
                fill: true,
                tension: 0.35,
                borderWidth: 3,
                pointBackgroundColor: '#C2005F'
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                }
            },

            scales: {
                y: {
                    beginAtZero: false,
                    grid: {
                        color: '#f3f4f6'
                    }
                },

                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });


    // Functional Client-Side CSV Exporter
    function exportToCSV() {

        const rows = [
            ['Product Name', 'Units Sold', 'Revenue (MYR)']
        ];

        const productElements = document.querySelectorAll('.product-item');

        productElements.forEach(item => {

            const name =
                item.querySelector('.product-name')?.innerText.trim() || '';

            const sales =
                item.querySelector('.product-sales')
                ?.innerText
                .replace(' units sold', '')
                .trim() || '';

            const revenue =
                item.querySelector('.product-revenue')
                ?.innerText
                .replace('RM', '')
                .replace(/,/g, '')
                .trim() || '';

            rows.push([
                `"${name.replace(/"/g, '""')}"`,
                sales,
                revenue
            ]);
        });

        let csvContent =
            "data:text/csv;charset=utf-8," +
            rows.map(e => e.join(",")).join("\n");

        const encodedUri = encodeURI(csvContent);

        const link = document.createElement("a");

        link.setAttribute("href", encodedUri);

        link.setAttribute(
            "download",
            `viola_sales_report_${new Date().toISOString().slice(0, 10)}.csv`
        );

        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);
    }

</script>

</body>
</html>
