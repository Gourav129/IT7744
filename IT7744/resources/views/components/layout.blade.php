<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="text-slate-900">
    <header class="hero-gradient shadow-2xl sticky top-0 z-50 backdrop-blur-sm bg-opacity-95">
        <nav class="p-4 max-w-screen-xl mx-auto flex items-center justify-between">
            <a href="{{ route('posts.index') }}" class="nav-link text-white font-bold text-lg flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span>{{ env('APP_NAME') }}</span>
            </a>

            {{-- For guests (not logged in) --}}
            @guest
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="nav-link text-white">Login</a>
                <a href="{{ route('register') }}" class="bg-white text-gray-600 px-5 py-2 rounded-lg font-semibold hover:bg-gray-50 transition-all duration-200 hover:scale-105 shadow-lg">
                    Sign Up
                </a>
            </div>
            @endguest

            {{-- For logged-in users --}}
            @auth
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="nav-link text-white hidden sm:block">
                    <svg class="w-5 h-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Dashboard
                </a>
                
                <div x-data="{ open: false }" class="relative">
                    {{-- Profile image button --}}
                    <button @click="open = !open" @click.outside="open = false" class="focus:outline-none ring-2 ring-white/50 rounded-full hover:ring-white transition-all duration-200">
                        <img
                            src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('img/img_avatar2.png') }}"
                            alt="Profile"
                            class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-lg">
                    </button>

                    {{-- Dropdown --}}
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-2xl border border-slate-200 overflow-hidden">
                        <div class="px-4 py-3 bg-gradient-to-r from-gray-50 to-neutral-50 border-b border-slate-200">
                            <p class="text-slate-800 font-bold text-sm">{{ Auth::user()->username }}</p>
                            <p class="text-slate-600 text-xs mt-0.5">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <div class="py-2">
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 text-slate-700 hover:bg-gray-50 transition-colors duration-150">
                                    <svg class="w-5 h-5 mr-3 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    Admin Panel
                                </a>
                            @endif
                            
                            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-slate-700 hover:bg-gray-50 transition-colors duration-150">
                                <svg class="w-5 h-5 mr-3 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Dashboard
                            </a>
                            
                            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2.5 text-slate-700 hover:bg-gray-50 transition-colors duration-150">
                                <svg class="w-5 h-5 mr-3 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Edit Profile
                            </a>
                        </div>

                        {{-- Logout Form --}}
                        <div class="border-t border-slate-200">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center w-full text-left px-4 py-2.5 text-red-600 hover:bg-red-50 transition-colors duration-150">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endauth
        </nav>
    </header>

    <main class="py-8 px-4 mx-auto max-w-screen-xl min-h-screen">
        {{ $slot }}
    </main>
    
    <footer class="hero-gradient text-white py-8 mt-16">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <p class="text-white/80">&copy; {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
