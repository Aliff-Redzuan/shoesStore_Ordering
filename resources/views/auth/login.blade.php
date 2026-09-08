<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Viola Shoe Store</title>
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
    <style>
        body {
            background: #deab35;
            background: radial-gradient(circle, rgba(222, 171, 53, 1) 0%, rgba(245, 105, 166, 1) 70%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="bg-brand-magenta px-6 py-5 text-white">
            <h1 class="text-2xl font-black">Viola Login</h1>
            <p class="text-sm text-white/80 mt-1">Please sign in to continue shopping</p>
        </div>

        <div class="p-6">
            @if(session('login_required'))
                <div class="mb-4 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                    {{ session('login_required') }}
                </div>
                <script>
                    window.alert('{{ addslashes(session('login_required')) }}');
                </script>
            @endif

            @if($errors->any())
                <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-brand-magenta focus:ring-2 focus:ring-pink-100 outline-none" placeholder="you@example.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <input id="password" name="password" type="password" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-brand-magenta focus:ring-2 focus:ring-pink-100 outline-none" placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-brand-magenta text-white py-3 rounded-lg font-bold hover:bg-[#A0004E] transition-all">
                    Login
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                Demo accounts:
                <div class="mt-2 space-y-1">
                    <p><strong>Customer:</strong> customer@viola.com / customer123</p>
                    <p><strong>Admin:</strong> admin@viola.com / admin123</p>
                    <p><strong>Staff:</strong> staff@viola.com / staff123</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
