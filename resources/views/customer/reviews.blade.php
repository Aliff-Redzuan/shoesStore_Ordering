<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reviews - Viola Shoe Store</title>
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
                    <p class="text-xs text-brand-darkgold font-semibold">Customer Portal</p>
                </div>
            </div>

            <nav class="p-4 space-y-1">
                <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    My Dashboard
                </a>

                <a href="{{ route('customer.orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    My Orders
                </a>

                <a href="{{ route('customer.reviews.index') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-lg bg-brand-magenta text-white shadow-sm transition-all">
                    <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    My Reviews
                </a>
                <a href="{{ route('customer.settings') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-600 rounded-lg hover:bg-pink-50/50 hover:text-brand-magenta transition-all">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Account Settings
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 space-y-6">
        <header class="border-b border-gray-200 pb-4 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">My Product Reviews</h1>
                <p class="text-sm text-gray-500 mt-1">Manage feedback and star ratings you have left on Viola shoes.</p>
            </div>
        </header>

        <!-- Reviews List -->
        <div class="grid grid-cols-1 gap-4">
            @forelse($reviews ?? [] as $review)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-3">
                    <div class="flex items-center justify-between">
                        <h4 class="text-base font-bold text-gray-900">{{ $review->product_name ?? 'Classic Viola Boots' }}</h4>
                        <form action="{{ route('customer.reviews.destroy', $review->id ?? 1) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-semibold text-red-500 hover:text-red-700">Delete Review</button>
                        </form>
                    </div>

                    <!-- Star Rating Indicator -->
                    <div class="flex items-center gap-1 text-brand-gold">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= ($review->rating ?? 5) ? 'fill-current' : 'text-gray-200' }}" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                        <span class="text-xs font-bold text-gray-600 ml-2">{{ $review->rating ?? 5 }}/5</span>
                    </div>

                    <p class="text-sm text-gray-600 italic">"{{ $review->comment ?? 'Extremely comfortable shoe with high quality leather. Fits true to size!' }}"</p>

                    <div class="text-xs text-gray-400 border-t border-gray-100 pt-3">
                        Reviewed on {{ isset($review->created_at) ? $review->created_at->format('d M Y') : 'Yesterday' }}
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl border border-gray-200 p-12 text-center text-gray-500">
                    <p class="text-base font-bold">No reviews submitted yet.</p>
                    <p class="text-xs text-gray-400 mt-1">Once you complete an order, you can write reviews directly from your order page.</p>
                </div>
            @endforelse
        </div>
    </main>
</body>
</html>