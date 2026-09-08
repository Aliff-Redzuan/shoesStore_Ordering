<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - Viola Shoe Store</title>
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
                    Customer Portal
                </p>
            </div>

        </div>


        <nav class="p-4 space-y-1">

            <!-- My Dashboard -->
            <a
                href="{{ route('customer.dashboard') }}"
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
                    ></path>
                </svg>

                My Dashboard
            </a>


            <!-- My Orders -->
            <a
                href="{{ route('customer.orders.index') }}"
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
                    ></path>
                </svg>

                My Orders
            </a>


            <!-- My Reviews -->
            <a
                href="{{ route('customer.reviews.index') }}"
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
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674z"
                    ></path>
                </svg>

                My Reviews
            </a>


            <!-- Account Settings -->
            <a
                href="{{ route('customer.settings') }}"
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
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    ></path>
                </svg>

                Account Settings
            </a>


            <!-- Shop New Shoes -->
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
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 3h18v6H3V3zm0 8h18v10H3V11zm4 2v6m6-6v6"
                    />
                </svg>

                Shop New Shoes
            </a>

        </nav>

    </div>

</aside>


<!-- Main Content -->
<main class="flex-1 p-6 lg:p-10">

    <div class="max-w-4xl mx-auto bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-6">

        <!-- Header -->
        <header class="border-b border-gray-200 pb-4">

            <h1 class="text-2xl font-bold text-gray-900">
                Account Settings
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Manage your personal information and preferences.
            </p>

        </header>


        <!-- Success Message -->
        @if(session('success'))

            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>

        @endif


        <!-- Validation Errors -->
        @if($errors->any())

            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">

                <ul class="list-disc list-inside space-y-1">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- Account Form -->
        <form
            action="{{ route('customer.settings.update') }}"
            method="POST"
            class="space-y-5"
        >

            @csrf

            @method('PUT')


            <!-- Full Name + Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- Full Name -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name ?? '') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-200"
                        required
                    >

                </div>


                <!-- Email -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $user->email ?? '') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-200"
                        required
                    >

                </div>

            </div>


            <!-- Phone + Language -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- Phone -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Phone Number
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $user->phone ?? '') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-200"
                    >

                </div>


                <!-- Preferred Language -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Preferred Language
                    </label>

                    <select
                        name="language"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-200"
                    >

                        <option
                            value="English"
                            {{ old('language', $user->language ?? 'English') === 'English' ? 'selected' : '' }}
                        >
                            English
                        </option>

                        <option
                            value="Malay"
                            {{ old('language', $user->language ?? '') === 'Malay' ? 'selected' : '' }}
                        >
                            Malay
                        </option>

                    </select>

                </div>

            </div>


            <!-- Delivery Address -->
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Delivery Address
                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-200"
                >{{ old('address', $user->address ?? '') }}</textarea>

            </div>


            <!-- Save Button -->
            <div class="flex justify-end">

                <button
                    type="submit"
                    class="px-5 py-2.5 text-sm font-bold text-white rounded-lg shadow-sm bg-brand-magenta hover:bg-[#A0004E] transition-all"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</main>
</body>
</html>
