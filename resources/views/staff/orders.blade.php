<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Order Management - Viola Shoe Store</title>

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
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                        />

                    </svg>

                    Dashboard

                </a>


                <!-- Orders -->

                <a
                    href="{{ route('staff.orders.index') }}"
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
                        />

                    </svg>

                    Order Management

                </a>


                <!-- Inventory -->

                <a
                    href="{{ route('staff.inventory.index') }}"
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
                class="w-full"
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
         MAIN
    ========================================================== -->

    <main class="flex-1 p-6 lg:p-10 space-y-6">


        <!-- Header -->

        <header class="border-b border-gray-200 pb-4">

            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                Order Management
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Review customer transactions, update order statuses, and manage fulfillments.
            </p>

        </header>


        <!-- Success -->

        @if(session('success'))

            <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 text-sm">

                {{ session('success') }}

            </div>

        @endif


        <!-- Errors -->

        @if($errors->any())

            <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-sm">

                <ul class="list-disc list-inside">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- =====================================================
             ORDER SUMMARY
        ====================================================== -->

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">


            <!-- Total -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Total
                </p>

                <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                    {{ $stats['total'] ?? 0 }}
                </h3>

            </div>


            <!-- Pending -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Pending
                </p>

                <h3 class="text-3xl font-extrabold text-amber-600 mt-2">
                    {{ $stats['pending'] ?? 0 }}
                </h3>

            </div>


            <!-- Processing -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Processing
                </p>

                <h3 class="text-3xl font-extrabold text-blue-600 mt-2">
                    {{ $stats['processing'] ?? 0 }}
                </h3>

            </div>


            <!-- Shipped -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Shipped
                </p>

                <h3 class="text-3xl font-extrabold text-purple-600 mt-2">
                    {{ $stats['shipped'] ?? 0 }}
                </h3>

            </div>


            <!-- Delivered -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Delivered
                </p>

                <h3 class="text-3xl font-extrabold text-teal-600 mt-2">
                    {{ $stats['delivered'] ?? 0 }}
                </h3>

            </div>


            <!-- Completed -->

            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Completed
                </p>

                <h3 class="text-3xl font-extrabold text-green-600 mt-2">
                    {{ $stats['completed'] ?? 0 }}
                </h3>

            </div>

        </section>


        <!-- Cancelled -->

        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">

            <div>

                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Cancelled Orders
                </p>

                <p class="text-2xl font-extrabold text-red-600 mt-1">
                    {{ $stats['cancelled'] ?? 0 }}
                </p>

            </div>

        </div>


        <!-- =====================================================
             STATUS FILTERS
        ====================================================== -->

        <div class="flex flex-col space-y-4">

            <div class="flex flex-col gap-4">


                <!-- Status Tabs -->

                <div class="flex items-center gap-1 bg-white p-1 rounded-xl border border-gray-200 shadow-sm overflow-x-auto w-full">

                    <!-- All -->

                    <a
                        href="{{ route('staff.orders.index') }}"
                        class="px-4 py-2 text-xs font-bold rounded-lg transition-all whitespace-nowrap
                        {{ !request('status')
                            ? 'bg-brand-magenta text-white shadow-sm'
                            : 'text-gray-600 hover:text-brand-magenta' }}"
                    >
                        All Orders
                    </a>


                    <!-- Pending -->

                    <a
                        href="{{ route('staff.orders.index', ['status' => 'pending']) }}"
                        class="px-4 py-2 text-xs font-bold rounded-lg transition-all whitespace-nowrap
                        {{ request('status') == 'pending'
                            ? 'bg-brand-magenta text-white shadow-sm'
                            : 'text-gray-600 hover:text-brand-magenta' }}"
                    >
                        Pending
                    </a>


                    <!-- Processing -->

                    <a
                        href="{{ route('staff.orders.index', ['status' => 'processing']) }}"
                        class="px-4 py-2 text-xs font-bold rounded-lg transition-all whitespace-nowrap
                        {{ request('status') == 'processing'
                            ? 'bg-brand-magenta text-white shadow-sm'
                            : 'text-gray-600 hover:text-brand-magenta' }}"
                    >
                        Processing
                    </a>


                    <!-- Shipped -->

                    <a
                        href="{{ route('staff.orders.index', ['status' => 'shipped']) }}"
                        class="px-4 py-2 text-xs font-bold rounded-lg transition-all whitespace-nowrap
                        {{ request('status') == 'shipped'
                            ? 'bg-brand-magenta text-white shadow-sm'
                            : 'text-gray-600 hover:text-brand-magenta' }}"
                    >
                        Shipped
                    </a>


                    <!-- Delivered -->

                    <a
                        href="{{ route('staff.orders.index', ['status' => 'delivered']) }}"
                        class="px-4 py-2 text-xs font-bold rounded-lg transition-all whitespace-nowrap
                        {{ request('status') == 'delivered'
                            ? 'bg-brand-magenta text-white shadow-sm'
                            : 'text-gray-600 hover:text-brand-magenta' }}"
                    >
                        Delivered
                    </a>


                    <!-- Completed -->

                    <a
                        href="{{ route('staff.orders.index', ['status' => 'completed']) }}"
                        class="px-4 py-2 text-xs font-bold rounded-lg transition-all whitespace-nowrap
                        {{ request('status') == 'completed'
                            ? 'bg-brand-magenta text-white shadow-sm'
                            : 'text-gray-600 hover:text-brand-magenta' }}"
                    >
                        Completed
                    </a>


                    <!-- Cancelled -->

                    <a
                        href="{{ route('staff.orders.index', ['status' => 'cancelled']) }}"
                        class="px-4 py-2 text-xs font-bold rounded-lg transition-all whitespace-nowrap
                        {{ request('status') == 'cancelled'
                            ? 'bg-brand-magenta text-white shadow-sm'
                            : 'text-gray-600 hover:text-brand-magenta' }}"
                    >
                        Cancelled
                    </a>

                </div>


                <!-- Search -->

                <form
                    action="{{ route('staff.orders.index') }}"
                    method="GET"
                    class="w-full flex gap-2"
                >

                    @if(request('status'))

                        <input
                            type="hidden"
                            name="status"
                            value="{{ request('status') }}"
                        >

                    @endif


                    <input
                        type="text"
                        name="search"
                        placeholder="Order ID or Customer Name..."
                        value="{{ request('search') }}"
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

        </div>



        <!-- =====================================================
             ORDERS TABLE
        ====================================================== -->

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="bg-gray-50 border-b border-gray-200">

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Order Ref
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Customer
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Date
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Total Price
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Payment
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Status
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($orders as $order)

                            @php

                                $status = strtolower(
                                    trim($order['status'] ?? 'pending')
                                );

                                $statusConfig = [

                                    'pending' => [
                                        'class' => 'bg-amber-50 text-amber-600 border-amber-200',
                                        'label' => 'Pending'
                                    ],

                                    'processing' => [
                                        'class' => 'bg-blue-50 text-blue-600 border-blue-200',
                                        'label' => 'Processing'
                                    ],

                                    'shipped' => [
                                        'class' => 'bg-purple-50 text-purple-700 border-purple-200',
                                        'label' => 'Shipped'
                                    ],

                                    'delivered' => [
                                        'class' => 'bg-teal-50 text-teal-700 border-teal-200',
                                        'label' => 'Delivered'
                                    ],

                                    'completed' => [
                                        'class' => 'bg-green-50 text-green-600 border-green-200',
                                        'label' => 'Completed'
                                    ],

                                    'cancelled' => [
                                        'class' => 'bg-red-50 text-red-600 border-red-200',
                                        'label' => 'Cancelled'
                                    ],

                                ];

                                $statusInfo = $statusConfig[$status]
                                    ?? [
                                        'class' => 'bg-gray-50 text-gray-600 border-gray-200',
                                        'label' => ucfirst($status)
                                    ];

                            @endphp


                            <tr class="hover:bg-gray-50 transition-all">


                                <!-- Order Ref -->

                                <td class="px-6 py-4">

                                    <span class="text-xs font-mono font-bold text-gray-900">

                                        {{ $order['order_no'] ?? 'N/A' }}

                                    </span>

                                </td>


                                <!-- Customer -->

                                <td class="px-6 py-4">

                                    <div>

                                        <p class="text-sm font-semibold text-gray-900">

                                            {{ $order['customer'] ?? 'Guest' }}

                                        </p>

                                        <p class="text-xs text-gray-400">

                                            {{ $order['email'] ?? 'N/A' }}

                                        </p>

                                    </div>

                                </td>


                                <!-- Date -->

                                <td class="px-6 py-4">

                                    <span class="text-xs text-gray-600">

                                        {{ $order['date'] ?? 'N/A' }}

                                    </span>

                                </td>


                                <!-- Total -->

                                <td class="px-6 py-4">

                                    <span class="text-sm font-bold text-gray-900">

                                        RM {{ number_format((float) ($order['total'] ?? 0), 2) }}

                                    </span>

                                </td>


                                <!-- Payment -->

                                <td class="px-6 py-4">

                                    <span class="text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded font-medium">

                                        {{ $order['payment'] ?? 'N/A' }}

                                    </span>

                                </td>


                                <!-- Status -->

                                <td class="px-6 py-4">

                                    <span
                                        class="px-3 py-1 text-xs font-bold rounded-full border {{ $statusInfo['class'] }}"
                                    >

                                        {{ $statusInfo['label'] }}

                                    </span>

                                </td>


                                <!-- Action -->

                                <td class="px-6 py-4">

                                    <button
                                        type="button"
                                        onclick="openStatusModal(
                                            {{ $order['id'] }},
                                            @js($order['order_no'] ?? ''),
                                            @js($order['status'] ?? 'pending')
                                        )"
                                        class="text-xs font-bold text-brand-magenta hover:underline"
                                    >

                                        Update Status

                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
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
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                            />

                                        </svg>

                                        <p class="text-gray-500 text-sm">
                                            No orders found
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
         UPDATE STATUS MODAL
    ========================================================== -->

    <div
        id="statusModal"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50"
    >

        <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-6">


            <h2 class="text-xl font-bold text-gray-900 mb-1">
                Update Order Status
            </h2>


            <p
                id="modalOrderNo"
                class="text-xs font-mono text-gray-500 mb-4"
            ></p>


            <form
                id="statusForm"
                method="POST"
                action=""
                class="space-y-4"
            >

                @csrf

                @method('PUT')


                <!-- Status -->

                <div>

                    <label
                        for="orderStatusSelect"
                        class="block text-sm font-semibold text-gray-700 mb-2"
                    >
                        Select New Status
                    </label>


                    <select
                        id="orderStatusSelect"
                        name="status"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-brand-magenta outline-none bg-white"
                    >

                        <option value="pending">
                            Pending
                        </option>

                        <option value="processing">
                            Processing
                        </option>

                        <option value="shipped">
                            Shipped
                        </option>

                        <option value="delivered">
                            Delivered
                        </option>

                        <option value="completed">
                            Completed
                        </option>

                        <option value="cancelled">
                            Cancelled
                        </option>

                    </select>

                </div>


                <!-- Notes -->

                <div>

                    <label
                        for="orderNotes"
                        class="block text-sm font-semibold text-gray-700 mb-2"
                    >
                        Status Notes (Optional)
                    </label>


                    <textarea
                        id="orderNotes"
                        name="notes"
                        rows="3"
                        placeholder="Add tracking reference or internal notes..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-brand-magenta outline-none"
                    ></textarea>

                </div>


                <!-- Buttons -->

                <div class="flex gap-2 pt-4 border-t border-gray-200">

                    <button
                        type="button"
                        onclick="closeStatusModal()"
                        class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 text-sm font-bold rounded-lg hover:bg-gray-200 transition-all"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="flex-1 px-4 py-2 bg-brand-magenta text-white text-sm font-bold rounded-lg hover:bg-[#A0004E] transition-all"
                    >
                        Save Status
                    </button>

                </div>

            </form>

        </div>

    </div>



    <!-- =========================================================
         JAVASCRIPT
    ========================================================== -->

    <script>

        function openStatusModal(orderId, orderNo, currentStatus)
        {
            const modal =
                document.getElementById('statusModal');

            const form =
                document.getElementById('statusForm');

            const statusSelect =
                document.getElementById('orderStatusSelect');

            const orderLabel =
                document.getElementById('modalOrderNo');

            const notesField =
                document.getElementById('orderNotes');


            // Order reference

            orderLabel.textContent =
                'Reference: ' + orderNo;


            // Current status

            statusSelect.value =
                currentStatus;


            // Clear previous notes

            notesField.value = '';


            // Laravel PUT route

            form.action =
                "{{ url('/staff/orders') }}/"
                + orderId
                + "/status";


            // Show modal

            modal.classList.remove('hidden');

            modal.classList.add('flex');
        }


        function closeStatusModal()
        {
            const modal =
                document.getElementById('statusModal');

            modal.classList.add('hidden');

            modal.classList.remove('flex');
        }

    </script>


</body>

</html>