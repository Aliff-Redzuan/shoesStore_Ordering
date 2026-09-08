<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard - Viola Shoe Store</title>
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

    <aside class="w-full md:w-64 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col justify-between min-h-screen">
        <div>
            <div class="p-6 border-b border-gray-100 flex items-center gap-3 bg-brand-magenta/5">
                <div class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center shadow-sm overflow-hidden">
                    <img src="{{ asset('images/ViolaLogo.png') }}" alt="Viola Shoe Store Logo" class="w-full h-full object-cover">
                </div>
                <div>
                    <h2 class="font-bold text-gray-900 text-base leading-tight">Viola Shoe Store</h2>
                    <p class="text-xs text-brand-darkgold font-semibold">Staff Portal</p>
                </div>
            </div>

            <nav class="p-4 space-y-1">
                <a href="{{ route('staff.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all">
                    <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('staff.orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Order Management
                </a>

                <a href="{{ route('staff.inventory.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4 8-4m0 0v10l-8 4-8-4V7m8 4l8-4"></path>
                    </svg>
                    Inventory
                </a>

                <a href="{{ route('staff.reports.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Reports & Analytics
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-100 space-y-3">
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg border border-gray-200 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-6 lg:p-10 space-y-8">
        <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Staff Dashboard</h1>
                <p class="text-sm text-gray-500 mt-1">Manage orders, inventory, and track operational metrics for Viola Shoe Store.</p>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-600 bg-white px-4 py-2 rounded-lg border border-gray-200 shadow-sm self-start sm:self-auto">
                <svg class="w-5 h-5 text-brand-magenta" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>{{ now()->format('d M Y, g:i A') }}</span>
            </div>
        </header>

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Orders</p>
                        <h3 class="text-3xl font-extrabold text-gray-900 mt-2">{{ $stats['total_orders'] ?? $totalOrders ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Pending Orders</p>
                        <h3 class="text-3xl font-extrabold text-brand-darkgold mt-2">{{ $stats['pending_orders'] ?? $pendingOrders ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-brand-gold/15 flex items-center justify-center text-brand-darkgold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Completed Orders</p>
                        <h3 class="text-3xl font-extrabold text-green-600 mt-2">{{ $stats['completed_orders'] ?? $completedOrders ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-green-50 flex items-center justify-center text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Today's Orders</p>
                        <h3 class="text-3xl font-extrabold text-purple-600 mt-2">{{ $stats['today_orders'] ?? $todayOrders ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-purple-50 flex items-center justify-center text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 flex flex-col justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Revenue (Completed)</p>
                        <p class="text-3xl font-bold text-green-600 mt-2">
                            RM {{ number_format($totalRevenue ?? 0, 2) }}
                        </p>
                    </div>
                    <p class="text-xs text-gray-400 mt-4">All-time revenue</p>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 flex flex-col justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Monthly Revenue</p>
                        <p class="text-3xl font-bold text-blue-600 mt-2">
                            RM {{ number_format($monthlyRevenue ?? 0, 2) }}
                        </p>
                    </div>
                    <p class="text-xs text-gray-400 mt-4">{{ now()->format('F Y') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 flex flex-col justify-between">
                <h3 class="text-lg font-bold text-gray-900 mb-2">⚠️ Inventory Alerts</h3>
                <div class="space-y-3 my-auto">
                    <div class="bg-red-50 p-3 rounded-lg border-l-4 border-red-500 flex items-center justify-between">
                        <p class="text-sm font-semibold text-red-800">Out of Stock</p>
                        <p class="text-lg font-bold text-red-600">{{ count($outOfStockProducts ?? []) }}</p>
                    </div>
                    <div class="bg-orange-50 p-3 rounded-lg border-l-4 border-orange-500 flex items-center justify-between">
                        <p class="text-sm font-semibold text-orange-800">Low Stock (&lt;5)</p>
                        <p class="text-lg font-bold text-orange-600">{{ count($lowStockProducts ?? []) }}</p>
                    </div>
                </div>
                <a href="{{ route('staff.inventory.index') }}" class="mt-4 block text-center bg-blue-50 text-blue-600 py-2 rounded-lg text-sm font-semibold hover:bg-blue-100 transition-all">
                    View Inventory
                </a>
            </div>
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Recent Orders</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Latest order transactions</p>
                    </div>
                    <a href="{{ route('staff.orders.index') }}" class="text-xs font-bold text-brand-magenta hover:underline">View All →</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Order ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Items</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($recentOrders ?? [] as $order)
                            <tr class="hover:bg-gray-50 transition-all">
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">#{{ $order->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $order->user?->email ?? 'Guest' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $order->items->count() }} item(s)</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">RM {{ number_format($order->total, 2) }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                                        @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                        @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                        @elseif($order->status === 'delivered' || $order->status === 'completed') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('staff.orders.show', $order->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">No orders found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden flex flex-col">
                <div class="border-b border-gray-200 p-5">
                    <h2 class="text-lg font-bold text-gray-900">Quick Actions</h2>
                </div>
                <div class="p-4 space-y-3 flex-1 flex flex-col justify-center">
                    <a href="{{ route('staff.orders.index', ['status' => 'pending']) }}" class="flex items-center gap-3 p-3 rounded-lg bg-brand-magenta/10 text-brand-magenta hover:bg-brand-magenta/20 transition-all border border-brand-magenta/20">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <div class="text-left">
                            <p class="text-xs font-bold">Process Orders</p>
                            <p class="text-[10px] text-gray-500">View pending orders</p>
                        </div>
                    </a>

                    <a href="{{ route('staff.inventory.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-all border border-blue-200">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4 8-4m0 0v10l-8 4-8-4V7m8 4l8-4"></path>
                        </svg>
                        <div class="text-left">
                            <p class="text-xs font-bold">Manage Inventory</p>
                            <p class="text-[10px] text-gray-500">Update stock levels</p>
                        </div>
                    </a>

                    <a href="{{ route('staff.reports.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-all border border-green-200">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <div class="text-left">
                            <p class="text-xs font-bold">View Reports</p>
                            <p class="text-[10px] text-gray-500">Sales & analytics</p>
                        </div>
                    </a>

                    <a href="{{ route('staff.orders.index') }}" class="flex items-center gap-3 p-3 rounded-lg bg-purple-50 text-purple-600 hover:bg-purple-100 transition-all border border-purple-200">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <div class="text-left">
                            <p class="text-xs font-bold">Print Labels</p>
                            <p class="text-[10px] text-gray-500">Shipping labels</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-gray-900">Daily Activity Summary</h2>
                <p class="text-xs text-gray-500 mt-1">Today's order processing activity</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="flex items-center gap-3 p-4 bg-green-50 rounded-lg border border-green-200">
                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-600">Orders Processed</p>
                        <p class="text-lg font-bold text-green-600">{{ $stats['processed_today'] ?? 0 }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-4 bg-blue-50 rounded-lg border border-blue-200">
                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-600">Orders Shipped</p>
                        <p class="text-lg font-bold text-blue-600">{{ $stats['shipped_today'] ?? 0 }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-4 bg-amber-50 rounded-lg border border-amber-200">
                    <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center text-amber-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM4.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM12.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-600">Returned</p>
                        <p class="text-lg font-bold text-amber-600">{{ $stats['returned_today'] ?? 0 }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-4 bg-red-50 rounded-lg border border-red-200">
                    <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-600">Cancelled</p>
                        <p class="text-lg font-bold text-red-600">{{ $stats['cancelled_today'] ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>