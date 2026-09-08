<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Manage Staff - Viola Shoe Store</title>

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


    <!-- SIDEBAR -->

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
                        Admin Portal
                    </p>

                </div>

            </div>


            <nav class="p-4 space-y-1">

                <!-- Dashboard -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2-2v-2z"
                        />
                    </svg>

                    Dashboard
                </a>


                <!-- Staff Management -->
                <a
                    href="{{ route('admin.manage') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all"
                >
                    <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                        />
                    </svg>

                    Staff Management
                </a>


                <!-- Logs -->
                <a
                    href="{{ route('admin.logs.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all"
                >
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a2 2 0 01.293.707V19a2 2 0 01-2 2z"
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
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 012 2v6a2 2 0 002 2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
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



    <!-- MAIN CONTENT -->

    <main class="flex-1 p-6 lg:p-10 space-y-6 overflow-y-auto">


        <!-- Header -->

        <header class="border-b border-gray-200 pb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div>

                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                    Staff Management
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Create accounts, update roles, and manage system access.
                </p>

            </div>


            <button
                type="button"
                onclick="document.getElementById('addStaffModal').classList.remove('hidden')"
                class="px-4 py-2 bg-brand-magenta text-white text-xs font-bold rounded-lg hover:bg-[#A0004E] transition-all shadow-sm flex items-center gap-1.5"
            >

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path
                        d="M12 4v16m8-8H4"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                    />

                </svg>

                Add New Staff

            </button>

        </header>



        <!-- Success Message -->

        @if(session('success'))

            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg px-4 py-3 text-sm">

                {{ session('success') }}

            </div>

        @endif



        <!-- Validation Errors -->

        @if($errors->any())

            <div class="bg-rose-50 border border-rose-200 text-rose-700 rounded-lg px-4 py-3 text-sm">

                <p class="font-semibold mb-1">
                    Please correct the following:
                </p>

                <ul class="list-disc list-inside">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <!-- Staff Table -->

        <section class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm text-gray-600">

                    <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500 border-b border-gray-200">

                        <tr>

                            <th class="px-4 py-3">
                                Staff Name
                            </th>

                            <th class="px-4 py-3">
                                Email
                            </th>

                            <th class="px-4 py-3">
                                Role
                            </th>

                            <th class="px-4 py-3">
                                Status
                            </th>

                            <th class="px-4 py-3 text-right">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($staffMembers as $staff)

                            <tr class="hover:bg-gray-50/50 transition-colors">

                                <!-- Name -->

                                <td class="px-4 py-3 font-semibold text-gray-900">

                                    {{ $staff->name }}

                                </td>


                                <!-- Email -->

                                <td class="px-4 py-3 text-gray-500">

                                    {{ $staff->email }}

                                </td>


                                <!-- Role -->

                                <td class="px-4 py-3">

                                    <span class="px-2.5 py-1 text-xs font-bold rounded-md bg-purple-50 text-purple-700 border border-purple-200">

                                        {{ ucfirst(str_replace('_', ' ', $staff->role ?? 'staff')) }}

                                    </span>

                                </td>


                                <!-- Status -->

                                <td class="px-4 py-3">

                                    @if($staff->is_active)

                                        <span class="px-2.5 py-1 text-xs font-bold rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200">

                                            Active

                                        </span>

                                    @else

                                        <span class="px-2.5 py-1 text-xs font-bold rounded-md bg-rose-50 text-rose-700 border border-rose-200">

                                            Disabled

                                        </span>

                                    @endif

                                </td>


                                <!-- Actions -->

                                <td class="px-4 py-3 text-right">

                                    <form
                                        action="{{ route('admin.staff.toggle', $staff->id) }}"
                                        method="POST"
                                        class="inline"
                                    >

                                        @csrf

                                        @method('PUT')

                                        <button
                                            type="submit"
                                            class="text-xs font-bold text-gray-600 hover:text-brand-magenta transition-colors"
                                        >

                                            @if($staff->is_active)

                                                Disable Access

                                            @else

                                                Enable Access

                                            @endif

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="px-4 py-10 text-center text-gray-500"
                                >

                                    No staff accounts found in the database.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </main>



    <!-- =========================================================
         ADD STAFF MODAL
    ========================================================== -->

    <div
        id="addStaffModal"
        class="fixed inset-0 bg-black/40 flex items-center justify-center p-4 z-50 hidden"
    >

        <div class="bg-white rounded-xl max-w-md w-full p-6 space-y-5 border border-gray-200 shadow-xl">


            <div class="flex justify-between items-center border-b border-gray-100 pb-3">

                <div>

                    <h3 class="font-bold text-gray-900 text-base">
                        Add New Staff Account
                    </h3>

                    <p class="text-xs text-gray-500 mt-1">
                        Create a new staff account.
                    </p>

                </div>


                <button
                    type="button"
                    onclick="document.getElementById('addStaffModal').classList.add('hidden')"
                    class="text-gray-400 hover:text-gray-600 text-sm"
                >

                    ✕

                </button>

            </div>



            <form
                action="{{ route('admin.staff.store') }}"
                method="POST"
                class="space-y-4"
            >

                @csrf


                <!-- Name -->

                <div>

                    <label class="block text-xs font-bold uppercase text-gray-600 mb-1">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm outline-none focus:ring-2 focus:ring-brand-magenta"
                    >

                </div>


                <!-- Email -->

                <div>

                    <label class="block text-xs font-bold uppercase text-gray-600 mb-1">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm outline-none focus:ring-2 focus:ring-brand-magenta"
                    >

                </div>


                <!-- Password -->

                <div>

                    <label class="block text-xs font-bold uppercase text-gray-600 mb-1">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        minlength="8"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm outline-none focus:ring-2 focus:ring-brand-magenta"
                    >

                    <p class="text-xs text-gray-400 mt-1">
                        Minimum 8 characters.
                    </p>

                </div>


                <!-- Role -->

                <div>

                    <label class="block text-xs font-bold uppercase text-gray-600 mb-1">
                        Role
                    </label>

                    <select
                        name="role"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm outline-none focus:ring-2 focus:ring-brand-magenta"
                    >

                        <option value="staff">
                            General Staff
                        </option>

                        <option value="inventory_manager">
                            Inventory Manager
                        </option>

                        <option value="fulfillment">
                            Order Fulfillment
                        </option>

                    </select>

                </div>


                <!-- Buttons -->

                <div class="pt-2 flex justify-end gap-2">

                    <button
                        type="button"
                        onclick="document.getElementById('addStaffModal').classList.add('hidden')"
                        class="px-4 py-2 bg-gray-100 text-gray-700 text-xs font-bold rounded-lg hover:bg-gray-200"
                    >

                        Cancel

                    </button>


                    <button
                        type="submit"
                        class="px-4 py-2 bg-brand-magenta text-white text-xs font-bold rounded-lg hover:bg-[#A0004E]"
                    >

                        Create Account

                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- Reopen modal after validation error -->

    @if($errors->any() && old('name'))

        <script>
            document.getElementById('addStaffModal').classList.remove('hidden');
        </script>

    @endif


</body>
</html>
