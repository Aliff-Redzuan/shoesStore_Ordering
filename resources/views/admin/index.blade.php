<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - Viola Shoe Store</title>

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
                        Admin Portal
                    </p>
                </div>

            </div>


            <!-- Navigation -->
            <nav class="p-4 space-y-1">

                <!-- Dashboard -->
                <a
                    href="{{ route('admin.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all"
                >
                    <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                        />
                    </svg>

                    Dashboard
                </a>


                <!-- Staff Management -->
                <a
                    href="{{ route('admin.manage') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                        />
                    </svg>

                    Staff Management
                </a>


                <!-- Activity Logs -->
                <a
                    href="{{ route('admin.logs.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-2z"
                        />
                    </svg>

                    Activity Audit Logs
                </a>


                <!-- Reports -->
                <a
                    href="{{ route('admin.reports.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                        />
                    </svg>

                    Reports & Analytics
                </a>


                <!-- Storefront -->
                <a
                    href="{{ route('customer.shop') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"
                        />
                    </svg>

                    View Storefront
                </a>

            </nav>

        </div>


        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-100">

            <form action="{{ route('logout') }}" method="POST" class="w-full">

                @csrf

                <button
                    type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg border border-gray-200 transition-all"
                >

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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


    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->

    <main class="flex-1 p-6 lg:p-10 space-y-6 overflow-y-auto">

        <!-- Header -->
        <header class="border-b border-gray-200 pb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div>

                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                    Admin Dashboard
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Store management control, staff overview, and audit monitoring.
                </p>

            </div>

            <div class="text-xs text-gray-500">
                {{ now()->format('d M Y, g:i A') }}
            </div>

        </header>


        <!-- =====================================================
             STATISTICS
        ====================================================== -->

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            <!-- Total Staff -->
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Total Staff
                        </p>

                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                            {{ $totalStaff }}
                        </h3>

                        <p class="text-xs text-emerald-600 font-medium mt-1">
                            ● {{ $activeStaff }} active
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-lg bg-brand-magenta/10 flex items-center justify-center text-brand-magenta">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                        </svg>

                    </div>

                </div>

            </div>


            <!-- Total Revenue -->
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Total Revenue
                        </p>

                        <h3 class="text-2xl font-extrabold text-gray-800 mt-2">
                            RM{{ number_format($totalRevenue, 2) }}
                        </h3>

                        <p class="text-xs text-gray-500 font-medium mt-1">
                            All completed orders
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

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

                        <h3 class="text-3xl font-extrabold text-blue-600 mt-2">
                            {{ $totalOrders }}
                        </h3>

                        <p class="text-xs text-gray-500 mt-1">
                            {{ $completedOrders }} completed
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                        </svg>

                    </div>

                </div>

            </div>


            <!-- Pending Orders -->
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Pending Orders
                        </p>

                        <h3 class="text-3xl font-extrabold text-brand-darkgold mt-2">
                            {{ $pendingOrders }}
                        </h3>

                        <p class="text-xs text-gray-500 mt-1">
                            Awaiting fulfillment
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-lg bg-brand-gold/15 flex items-center justify-center text-brand-darkgold">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />

                        </svg>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             REVENUE SUMMARY
        ====================================================== -->

        <section class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Total Revenue -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            All-Time Revenue
                        </p>

                        <h2 class="text-3xl font-extrabold text-gray-900 mt-2">
                            RM{{ number_format($totalRevenue, 2) }}
                        </h2>

                        <p class="text-xs text-gray-500 mt-2">
                            Revenue from completed orders
                        </p>

                    </div>

                </div>

            </div>


            <!-- Monthly Revenue -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Monthly Revenue
                        </p>

                        <h2 class="text-3xl font-extrabold text-brand-magenta mt-2">
                            RM{{ number_format($monthlyRevenue, 2) }}
                        </h2>

                        <p class="text-xs text-gray-500 mt-2">
                            {{ now()->format('F Y') }}
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             STAFF MANAGEMENT PREVIEW
        ====================================================== -->

        <section class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4">

            <div class="flex items-center justify-between border-b border-gray-100 pb-4">

                <div>

                    <h2 class="text-lg font-bold text-gray-900">
                        Staff Accounts Management
                    </h2>

                    <p class="text-xs text-gray-500 mt-0.5">
                        Current staff accounts and access status.
                    </p>

                </div>

                <a
                    href="{{ route('admin.manage') }}"
                    class="text-xs font-bold text-brand-magenta hover:underline"
                >
                    Manage Staff →
                </a>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm text-gray-600">

                    <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500 border-b border-gray-200">

                        <tr>

                            <th class="px-4 py-3">
                                Staff Name
                            </th>

                            <th class="px-4 py-3">
                                Email Address
                            </th>

                            <th class="px-4 py-3">
                                Assigned Role
                            </th>

                            <th class="px-4 py-3">
                                Account Status
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($staffMembers as $staff)

                            <tr class="hover:bg-gray-50/50 transition-colors">

                                <td class="px-4 py-3 font-semibold text-gray-900">
                                    {{ $staff->name }}
                                </td>

                                <td class="px-4 py-3 text-gray-500">
                                    {{ $staff->email }}
                                </td>

                                <td class="px-4 py-3">

                                    <span class="px-2.5 py-1 text-xs font-bold rounded-md bg-purple-50 text-purple-700 border border-purple-200">

                                        {{ ucfirst(str_replace('_', ' ', $staff->role ?? 'staff')) }}

                                    </span>

                                </td>

                                <td class="px-4 py-3">

                                    @if($staff->is_active ?? false)

                                        <span class="px-2.5 py-1 text-xs font-bold rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Active
                                        </span>

                                    @else

                                        <span class="px-2.5 py-1 text-xs font-bold rounded-md bg-rose-50 text-rose-700 border border-rose-200">
                                            Disabled
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="px-4 py-8 text-center text-gray-500"
                                >
                                    No staff accounts found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>


        <!-- =====================================================
             ACTIVITY LOG
        ====================================================== -->

        <section class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4">

            <div class="flex items-center justify-between border-b border-gray-100 pb-3">

                <div>

                    <h2 class="text-lg font-bold text-gray-900">
                        System Activity Audit Log
                    </h2>

                    <p class="text-xs text-gray-500 mt-1">
                        Recent staff activity.
                    </p>

                </div>

                <a
                    href="{{ route('admin.logs.index') }}"
                    class="text-xs text-brand-magenta hover:underline font-bold uppercase tracking-wider"
                >
                    View All Logs →
                </a>

            </div>


            <ul class="space-y-2 divide-y divide-gray-100 max-h-60 overflow-y-auto pr-1">

                    @forelse($logs ?? [] as $log)

                        <li class="pt-3 pb-2 text-sm text-gray-700 flex items-center justify-between">

                            <div class="flex items-center gap-2">

                                <span class="w-2 h-2 rounded-full bg-brand-magenta"></span>

                                <span>

                                    <strong class="text-gray-900">
                                        {{ $log->user_name ?? 'System' }}
                                    </strong>

                                    -
                                    {{ $log->action ?? 'No action specified' }}

                                </span>

                            </div>

                            <span class="text-xs text-gray-400">

                                {{ $log->created_at?->diffForHumans() ?? 'Logged' }}

                            </span>

                        </li>

                    @empty

                        <li class="text-sm text-gray-500 py-3">
                            No system activity logged.
                        </li>


                    <li class="text-sm text-gray-500 py-3">

                        No system activity logged.

                    </li>

                @endforelse

            </ul>

        </section>
    </main>

</body>
</html>

