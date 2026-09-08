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

    <!-- Left Sidebar -->
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
                <a href="{{ route('staff.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('staff.orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all">
                    <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 space-y-6">
        <header class="flex items-center justify-between border-b border-gray-200 pb-4">
            <div>
                <a href="{{ route('staff.orders.index') }}" class="text-xs font-bold text-brand-magenta hover:underline mb-2">← Back to Orders</a>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Order #ORD-{{ $order['id'] ?? '1001' }}</h1>
                <p class="text-sm text-gray-500 mt-1">Order details and fulfillment management</p>
            </div>
            <button class="px-4 py-2 bg-brand-magenta text-white text-xs font-bold rounded-lg hover:bg-[#A0004E] transition-all print:hidden">
                Print Label
            </button>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Order Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Customer Info -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Customer Information</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Full Name</p>
                            <p class="text-sm font-semibold text-gray-900 mt-1">{{ $order['customer'] ?? 'John Doe' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Email</p>
                            <p class="text-sm font-semibold text-gray-900 mt-1">{{ $order['email'] ?? 'customer@example.com' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Phone</p>
                            <p class="text-sm font-semibold text-gray-900 mt-1">{{ $order['phone'] ?? '+63 900 000 0000' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Order Date</p>
                            <p class="text-sm font-semibold text-gray-900 mt-1">{{ $order['date'] ?? 'Today' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Shipping Address</h2>
                    <p class="text-sm text-gray-900">
                        {{ $order['address'] ?? '123 Sample Street, Barangay Sample, City, 1234' }}<br>
                        {{ $order['city'] ?? 'Metro Manila' }}, {{ $order['state'] ?? 'NCR' }} {{ $order['zip'] ?? '1234' }}<br>
                        {{ $order['country'] ?? 'Philippines' }}
                    </p>
                </div>

                <!-- Order Items -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Order Items</h2>
                    <div class="space-y-4">
                        @forelse($order['items'] ?? [] as $item)
                            <div class="flex gap-4 pb-4 border-b border-gray-100 last:border-b-0">
                                <div class="w-20 h-20 bg-gray-100 rounded-lg flex-shrink-0 flex items-center justify-center">
                                    <img src="{{ $item['image'] ?? asset('images/shoe-placeholder.png') }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-bold text-gray-900">{{ $item['name'] ?? 'Viola Classic Heels' }}</p>
                                    <p class="text-xs text-gray-500 mt-1">Color: {{ $item['color'] ?? 'Black' }} | Size: {{ $item['size'] ?? '7' }}</p>
                                    <div class="flex justify-between items-center mt-2">
                                        <p class="text-xs text-gray-600">Qty: <span class="font-bold">{{ $item['quantity'] ?? 1 }}</span></p>
                                        <p class="text-sm font-bold text-gray-900">₱{{ number_format($item['price'] ?? 2000, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-6 text-gray-500">
                                <p class="text-sm">No items in this order</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Order Status & Actions Sidebar -->
            <div class="space-y-6">
                <!-- Current Status -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Order Status</h2>
                    @php
                        $status = $order['status'] ?? 'pending';
                        $statusColors = [
                            'pending' => ['bg' => 'bg-brand-gold/15', 'text' => 'text-brand-darkgold', 'border' => 'border-brand-gold/30'],
                            'processing' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-600', 'border' => 'border-blue-200'],
                            'shipped' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'border' => 'border-purple-200'],
                            'delivered' => ['bg' => 'bg-green-50', 'text' => 'text-green-600', 'border' => 'border-green-200'],
                        ];
                        $colors = $statusColors[$status] ?? $statusColors['pending'];
                    @endphp
                    <div class="px-4 py-3 rounded-lg border {{ $colors['bg'] }} {{ $colors['text'] }} {{ $colors['border'] }} text-center">
                        <p class="text-lg font-bold">{{ ucfirst($status) }}</p>
                    </div>
                </div>

                <!-- Update Status -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Update Status</h2>
                    <form action="{{ route('staff.orders.updateStatus', ['id' => $order['id'] ?? 1]) }}" method="POST" class="space-y-3">
                        @csrf
                        <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none">
                            <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $status === 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <textarea name="notes" placeholder="Add internal notes..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none resize-none h-20"></textarea>
                        <button type="submit" class="w-full px-4 py-2 bg-brand-magenta text-white text-xs font-bold rounded-lg hover:bg-[#A0004E] transition-all">
                            Update Status
                        </button>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Order Summary</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Subtotal:</span>
                            <span class="text-sm font-bold text-gray-900">₱{{ number_format($order['subtotal'] ?? 4000, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Shipping:</span>
                            <span class="text-sm font-bold text-gray-900">₱{{ number_format($order['shipping'] ?? 100, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Tax:</span>
                            <span class="text-sm font-bold text-gray-900">₱{{ number_format($order['tax'] ?? 0, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <span class="text-sm font-bold text-gray-900">Total:</span>
                            <span class="text-lg font-bold text-brand-magenta">₱{{ number_format($order['total'] ?? 4100, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h2>
                    <div class="space-y-2">
                        <button class="w-full px-3 py-2 bg-blue-50 text-blue-600 text-xs font-bold rounded-lg hover:bg-blue-100 border border-blue-200 transition-all">
                            📧 Send Confirmation Email
                        </button>
                        <button class="w-full px-3 py-2 bg-purple-50 text-purple-600 text-xs font-bold rounded-lg hover:bg-purple-100 border border-purple-200 transition-all">
                            📦 Generate Shipping Label
                        </button>
                        <button class="w-full px-3 py-2 bg-red-50 text-red-600 text-xs font-bold rounded-lg hover:bg-red-100 border border-red-200 transition-all">
                            ✖️ Cancel Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
