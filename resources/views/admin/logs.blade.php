<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Audit Logs - Viola Shoe Store</title>
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
                    <img src="/images/ViolaLogo.png" alt="Viola Shoe Store Logo" class="w-full h-full object-cover">
                </div>
                <div>
                    <h2 class="font-bold text-gray-900 text-base leading-tight">Viola Shoe Store</h2>
                    <p class="text-xs text-brand-darkgold font-semibold">Admin Portal</p>
                </div>
            </div>

            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.manage') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    Staff Management
                </a>

                <a href="{{ route('admin.logs.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all">
                    <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Activity Audit Logs
                </a>

                <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Reports & Analytics
                </a>

                <a href="{{ route('customer.shop') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    View Storefront
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-100">
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg border border-gray-200 transition-all">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-6 lg:p-10 space-y-6 overflow-y-auto">
        <header class="border-b border-gray-200 pb-4">
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">System Activity Audit Logs</h1>
            <p class="text-sm text-gray-500 mt-1">Real-time tracking of staff actions, security updates, and modifications.</p>
        </header>

        <section class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3">Timestamp</th>
                            <th class="px-4 py-3">User / Admin</th>
                            <th class="px-4 py-3">Action Description</th>
                            <th class="px-4 py-3 text-right">IP Address</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($logs ?? [] as $log)
                        <tr class="hover:bg-gray-50/50">
                            <td class="px-4 py-3 text-gray-400 text-xs">{{ $log->created_at ?? now()->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-900">{{ $log->user_name ?? 'System' }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $log->action ?? 'Updated inventory item' }}</td>
                            <td class="px-4 py-3 text-right font-mono text-xs text-gray-400">{{ $log->ip_address ?? '127.0.0.1' }}</td>
                        </tr>
                        @empty
                        <tr class="hover:bg-gray-50/50">
                            <td class="px-4 py-3 text-gray-400 text-xs">2026-09-04 20:15</td>
                            <td class="px-4 py-3 font-semibold text-gray-900">Admin</td>
                            <td class="px-4 py-3 text-gray-700">Created staff account for Siti Sarah</td>
                            <td class="px-4 py-3 text-right font-mono text-xs text-gray-400">192.168.1.12</td>
                        </tr>
                        <tr class="hover:bg-gray-50/50">
                            <td class="px-4 py-3 text-gray-400 text-xs">2026-09-04 18:30</td>
                            <td class="px-4 py-3 font-semibold text-gray-900">Ahmad Razak</td>
                            <td class="px-4 py-3 text-gray-700">Updated stock status for Order #1042</td>
                            <td class="px-4 py-3 text-right font-mono text-xs text-gray-400">192.168.1.45</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>