<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout - Viola Shoe Store</title>

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

<body class="bg-gray-100 min-h-screen font-sans antialiased text-gray-900">

    <!-- Header -->
    <header class="bg-brand-magenta sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between gap-6">

            <a href="{{ route('customer.dashboard') }}"
               class="flex items-center gap-3 shrink-0">

                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-md overflow-hidden">
                    <img
                        src="{{ asset('images/ViolaLogo.png') }}"
                        alt="Viola Shoe Store Logo"
                        class="w-full h-full object-cover"
                    >
                </div>

                <div class="text-white">
                    <h2 class="font-black text-xl leading-none tracking-tight">
                        Viola
                    </h2>

                    <p class="text-[10px] text-brand-gold font-semibold uppercase tracking-wider">
                        Shoe Store
                    </p>
                </div>
            </a>

            <h1 class="text-white text-2xl font-bold flex-1">
                Checkout
            </h1>

        </div>
    </header>


    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">

        <!-- Validation Errors -->
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Checkout Form -->
            <div class="lg:col-span-2">

                <form
                    action="{{ route('customer.checkout.process') }}"
                    method="POST"
                    class="space-y-6"
                >

                    @csrf


                    <!-- Customer Information -->
                    <div class="bg-white rounded-lg shadow-md p-6">

                        <h2 class="text-xl font-bold text-gray-900 mb-6">
                            Customer Information
                        </h2>

                        <div class="space-y-4">

                            <!-- Full Name -->
                            <div>
                                <label
                                    for="customer_name"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Full Name *
                                </label>

                                <input
                                    type="text"
                                    id="customer_name"
                                    name="customer_name"
                                    value="{{ old('customer_name', $user->name ?? '') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-magenta focus:border-transparent outline-none"
                                    placeholder="John Doe"
                                    required
                                >

                                @error('customer_name')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            <!-- Email -->
                            <div>
                                <label
                                    for="customer_email"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Email Address *
                                </label>

                                <input
                                    type="email"
                                    id="customer_email"
                                    name="customer_email"
                                    value="{{ old('customer_email', $user->email ?? '') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-magenta focus:border-transparent outline-none"
                                    placeholder="john@example.com"
                                    required
                                >

                                @error('customer_email')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            <!-- Phone -->
                            <div>
                                <label
                                    for="customer_phone"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Phone Number *
                                </label>

                                <input
                                    type="tel"
                                    id="customer_phone"
                                    name="customer_phone"
                                    value="{{ old('customer_phone', $user->phone ?? '') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-magenta focus:border-transparent outline-none"
                                    placeholder="+60 12-345-6789"
                                    required
                                >

                                @error('customer_phone')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>
                    </div>


                    <!-- Delivery & Payment -->
                    <div class="bg-white rounded-lg shadow-md p-6">

                        <h2 class="text-xl font-bold text-gray-900 mb-6">
                            Delivery & Payment
                        </h2>


                        <!-- Fulfillment Method -->
                        <div class="mb-6">

                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Delivery / Pickup Method *
                            </label>

                            <div class="space-y-3">

                                <!-- Home Delivery -->
                                <label class="flex items-start p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-brand-magenta hover:bg-pink-50 transition-all has-[:checked]:border-brand-magenta has-[:checked]:bg-pink-50">

                                    <input
                                        type="radio"
                                        name="pickup_location"
                                        value="home"
                                        {{ old('pickup_location', 'store') === 'home' ? 'checked' : '' }}
                                        class="w-4 h-4 mt-1 text-brand-magenta"
                                        required
                                        onchange="updateDeliveryOptions()"
                                    >

                                    <div class="ml-4 flex-1">

                                        <p class="font-semibold text-gray-900">
                                            Send to My Home
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            Deliver the order to your saved address.
                                        </p>

                                    </div>

                                </label>


                                <!-- Store Pickup -->
                                <label class="flex items-start p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-brand-magenta hover:bg-pink-50 transition-all has-[:checked]:border-brand-magenta has-[:checked]:bg-pink-50">

                                    <input
                                        type="radio"
                                        name="pickup_location"
                                        value="store"
                                        {{ old('pickup_location', 'store') === 'store' ? 'checked' : '' }}
                                        class="w-4 h-4 mt-1 text-brand-magenta"
                                        required
                                        onchange="updateDeliveryOptions()"
                                    >

                                    <div class="ml-4 flex-1">

                                        <p class="font-semibold text-gray-900">
                                            Pickup at Store
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            Collect your order from our store.
                                        </p>

                                        <p class="text-xs text-gray-400 mt-1">
                                            📍 123 Shoe Street, Shopping Mall
                                        </p>

                                    </div>

                                </label>

                            </div>


                            @error('pickup_location')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        <!-- Delivery Address -->
                        <div
                            id="deliveryAddressSection"
                            class="mb-6"
                        >

                            <label
                                for="delivery_address"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Delivery Address *
                            </label>

                            <textarea
                                id="delivery_address"
                                name="delivery_address"
                                rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-magenta focus:border-transparent outline-none"
                                placeholder="Enter your delivery address"
                            >{{ old('delivery_address', $user->address ?? '') }}</textarea>

                            <p class="text-xs text-gray-500 mt-1">
                                You can edit this address for this order.
                            </p>


                            @error('delivery_address')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        <!-- Payment Method -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Payment Method *
                            </label>


                            <!-- HOME DELIVERY PAYMENT OPTIONS -->
                            <div
                                id="homePaymentOptions"
                                class="space-y-3"
                            >

                                <!-- Cash on Delivery -->
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-brand-magenta hover:bg-pink-50 transition-all has-[:checked]:border-brand-magenta has-[:checked]:bg-pink-50">

                                    <input
                                        type="radio"
                                        name="payment_method"
                                        value="cash_on_delivery"
                                        {{ old('payment_method') === 'cash_on_delivery' ? 'checked' : '' }}
                                        class="w-4 h-4 text-brand-magenta payment-radio"
                                    >

                                    <div class="ml-4 flex-1">

                                        <p class="font-semibold text-gray-900">
                                            Cash on Delivery
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            Pay in cash when your order is delivered.
                                        </p>

                                    </div>

                                </label>


                                <!-- Online Payment - Future Enhancement -->
                                <label class="flex items-center p-4 border-2 border-gray-200 bg-gray-50 rounded-lg opacity-70 cursor-not-allowed">

                                    <input
                                        type="radio"
                                        name="payment_method_future"
                                        value="online_payment"
                                        class="w-4 h-4"
                                        disabled
                                    >

                                    <div class="ml-4 flex-1">

                                        <div class="flex items-center gap-2">

                                            <p class="font-semibold text-gray-700">
                                                Online Payment
                                            </p>

                                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-brand-gold/20 text-brand-darkgold">
                                                COMING SOON
                                            </span>

                                        </div>

                                        <p class="text-sm text-gray-500">
                                            Online payment integration will be added in a future enhancement.
                                        </p>

                                    </div>

                                </label>

                            </div>


                            <!-- STORE PICKUP PAYMENT OPTIONS -->
                            <div
                                id="storePaymentOptions"
                                class="space-y-3"
                            >

                                <!-- Cash on Pickup -->
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-brand-magenta hover:bg-pink-50 transition-all has-[:checked]:border-brand-magenta has-[:checked]:bg-pink-50">

                                    <input
                                        type="radio"
                                        name="payment_method"
                                        value="cash_on_pickup"
                                        {{ old('payment_method', 'cash_on_pickup') === 'cash_on_pickup' ? 'checked' : '' }}
                                        class="w-4 h-4 text-brand-magenta payment-radio"
                                    >

                                    <div class="ml-4 flex-1">

                                        <p class="font-semibold text-gray-900">
                                            Cash Upon Pickup
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            Pay in cash when you collect your order at the store.
                                        </p>

                                    </div>

                                </label>


                                <!-- Online Payment -->
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-brand-magenta hover:bg-pink-50 transition-all has-[:checked]:border-brand-magenta has-[:checked]:bg-pink-50">

                                    <input
                                        type="radio"
                                        name="payment_method"
                                        value="online_payment"
                                        {{ old('payment_method') === 'online_payment' ? 'checked' : '' }}
                                        class="w-4 h-4 text-brand-magenta payment-radio"
                                    >

                                    <div class="ml-4 flex-1">

                                        <p class="font-semibold text-gray-900">
                                            Online Payment
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            Pay online before collecting your order.
                                        </p>

                                    </div>

                                </label>

                            </div>


                            @error('payment_method')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    <!-- Notes -->
                    <div class="bg-white rounded-lg shadow-md p-6">

                        <h2 class="text-lg font-bold text-gray-900 mb-4">
                            Additional Notes (Optional)
                        </h2>

                        <textarea
                            name="notes"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-magenta focus:border-transparent outline-none"
                            rows="4"
                            placeholder="Any special requests or notes for your order..."
                        >{{ old('notes') }}</textarea>

                    </div>


                    <!-- Buttons -->
                    <div class="flex gap-4">

                        <a
                            href="{{ route('customer.cart.index') }}"
                            class="flex-1 py-3 rounded-lg font-bold text-brand-magenta border-2 border-brand-magenta hover:bg-brand-magenta hover:text-white transition-all text-center"
                        >
                            Back to Cart
                        </a>

                        <button
                            type="submit"
                            class="flex-1 py-3 rounded-lg font-bold text-white bg-brand-magenta hover:bg-[#A0004E] transition-all shadow-md"
                        >
                            Place Order
                        </button>

                    </div>

                </form>

            </div>


            <!-- Order Summary -->
            <div class="lg:col-span-1">

                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">

                    <h2 class="text-xl font-bold text-gray-900 mb-6">
                        Order Summary
                    </h2>


                    <!-- Cart Items -->
                    <div class="space-y-4 mb-6 pb-6 border-b border-gray-200">

                        @foreach($cart as $key => $item)

                            <div class="flex justify-between items-start text-sm">

                                <div>

                                    <p class="font-semibold text-gray-900">
                                        {{ $item['name'] }}
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        {{ $item['brand'] }} - Size {{ $item['size'] }}
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        Qty: {{ $item['quantity'] }}
                                    </p>

                                </div>

                                <p class="font-semibold text-brand-magenta whitespace-nowrap">
                                    RM {{ number_format($item['price'] * $item['quantity'], 2) }}
                                </p>

                            </div>

                        @endforeach

                    </div>


                    <!-- Subtotal / Tax -->
                    <div class="space-y-3">

                        <div class="flex justify-between text-gray-600">

                            <span>
                                Subtotal:
                            </span>

                            <span>
                                RM {{ number_format($subtotal, 2) }}
                            </span>

                        </div>


                        <div class="flex justify-between text-gray-600">

                            <span>
                                Tax (10%):
                            </span>

                            <span>
                                RM {{ number_format($tax, 2) }}
                            </span>

                        </div>

                    </div>


                    <!-- Total -->
                    <div class="pt-6 mt-6 border-t border-gray-200">

                        <div class="flex justify-between items-center">

                            <span class="text-lg font-bold text-gray-900">
                                Total:
                            </span>

                            <span class="text-3xl font-black text-brand-magenta">
                                RM {{ number_format($total, 2) }}
                            </span>

                        </div>

                    </div>


                    <!-- Payment Information -->
                    <div
                        id="paymentInfo"
                        class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg"
                    >

                        <!-- Home Payment Info -->
                        <p
                            id="homePaymentInfo"
                            class="text-xs text-blue-800 hidden"
                        >
                            <svg
                                class="w-4 h-4 inline-block mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>

                            Home delivery currently supports Cash on Delivery.
                            Online payment will be available in a future enhancement.
                        </p>


                        <!-- Store Cash Info -->
                        <p
                            id="storeCashInfo"
                            class="text-xs text-blue-800 hidden"
                        >
                            <svg
                                class="w-4 h-4 inline-block mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>

                            You'll pay in cash when you pick up your order at our store.
                        </p>


                        <!-- Store Online Info -->
                        <p
                            id="storeOnlineInfo"
                            class="text-xs text-blue-800 hidden"
                        >
                            <svg
                                class="w-4 h-4 inline-block mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>

                            Online payment is selected for store pickup.
                            Payment gateway integration can be connected in a future enhancement.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </main>


    <script>

        function updateDeliveryOptions() {

            const selectedMethod = document.querySelector(
                'input[name="pickup_location"]:checked'
            )?.value;


            const deliveryAddressSection =
                document.getElementById('deliveryAddressSection');

            const deliveryAddress =
                document.getElementById('delivery_address');


            const homePaymentOptions =
                document.getElementById('homePaymentOptions');

            const storePaymentOptions =
                document.getElementById('storePaymentOptions');


            const paymentRadios =
                document.querySelectorAll('input[name="payment_method"]');


            const homePaymentInfo =
                document.getElementById('homePaymentInfo');

            const storeCashInfo =
                document.getElementById('storeCashInfo');

            const storeOnlineInfo =
                document.getElementById('storeOnlineInfo');


            /*
             * Clear currently selectable payment methods.
             */
            paymentRadios.forEach(function (radio) {
                radio.checked = false;
            });


            /*
             * HOME DELIVERY
             */
            if (selectedMethod === 'home') {

                deliveryAddressSection.classList.remove('hidden');

                deliveryAddress.required = true;


                homePaymentOptions.classList.remove('hidden');

                storePaymentOptions.classList.add('hidden');


                /*
                 * Home delivery only supports Cash on Delivery.
                 */
                const cashOnDelivery = document.querySelector(
                    'input[name="payment_method"][value="cash_on_delivery"]'
                );

                if (cashOnDelivery) {
                    cashOnDelivery.checked = true;
                }


                homePaymentInfo.classList.remove('hidden');

                storeCashInfo.classList.add('hidden');

                storeOnlineInfo.classList.add('hidden');

            }


            /*
             * STORE PICKUP
             */
            else {

                deliveryAddressSection.classList.add('hidden');

                deliveryAddress.required = false;


                homePaymentOptions.classList.add('hidden');

                storePaymentOptions.classList.remove('hidden');


                /*
                 * Restore previous selected payment after validation failure.
                 */
                const selectedPayment = @json(old('payment_method', 'cash_on_pickup'));


                let storePayment = null;


                if (
                    selectedPayment === 'cash_on_pickup' ||
                    selectedPayment === 'online_payment'
                ) {

                    storePayment = document.querySelector(
                        'input[name="payment_method"][value="' + selectedPayment + '"]'
                    );

                }


                if (storePayment) {

                    storePayment.checked = true;

                } else {

                    const cashOnPickup = document.querySelector(
                        'input[name="payment_method"][value="cash_on_pickup"]'
                    );

                    if (cashOnPickup) {
                        cashOnPickup.checked = true;
                    }

                }


                homePaymentInfo.classList.add('hidden');


                const checkedPayment = document.querySelector(
                    'input[name="payment_method"]:checked'
                )?.value;


                if (checkedPayment === 'online_payment') {

                    storeCashInfo.classList.add('hidden');

                    storeOnlineInfo.classList.remove('hidden');

                } else {

                    storeCashInfo.classList.remove('hidden');

                    storeOnlineInfo.classList.add('hidden');

                }

            }

        }


        /*
         * Update payment information when
         * the customer changes payment method.
         */
        document
            .querySelectorAll('input[name="payment_method"]')
            .forEach(function (radio) {

                radio.addEventListener('change', function () {

                    const selectedMethod = document.querySelector(
                        'input[name="pickup_location"]:checked'
                    )?.value;


                    if (selectedMethod === 'store') {

                        document
                            .getElementById('storeCashInfo')
                            .classList.toggle(
                                'hidden',
                                this.value !== 'cash_on_pickup'
                            );


                        document
                            .getElementById('storeOnlineInfo')
                            .classList.toggle(
                                'hidden',
                                this.value !== 'online_payment'
                            );

                    }

                });

            });


        /*
         * Initialize page state.
         */
        document.addEventListener(
            'DOMContentLoaded',
            function () {
                updateDeliveryOptions();
            }
        );

    </script>

</body>
</html>