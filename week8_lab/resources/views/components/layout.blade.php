<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg">
    <nav class="p-4 max-w-screen-lg mx-auto flex items-center justify-between">
        <a href="{{ route('posts.index') }}" class="nav-link text-slate-100">Home</a>


        {{-- For guests (not logged in) --}}
        @guest
        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="nav-link text-slate-100">Login</a>
            <a href="{{ route('register') }}" class="nav-link text-slate-100">Register</a>
        </div>
        @endguest

        {{-- For logged-in users --}}
        @auth
        <div x-data="{ open: false }" class="relative">
            {{-- Profile image button --}}
            <button @click="open = !open" @click.outside="open = false" class="focus:outline-none">
    <img
        src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('img/img_avatar2.png') }}"
        alt="Profile"
        class="w-8 h-8 rounded-full object-cover">
</button>


            {{-- Dropdown --}}
            <div x-show="open" class="absolute right-0 mt-2 w-40 bg-white rounded shadow-md border border-slate-200">
                <p class="px-4 py-2 text-slate-700 font-semibold">{{ Auth::user()->username }}</p>
              <hr>
              @if(auth()->user()->role === 'admin')
    <a href="{{ route('admin.dashboard') }}" class="block hover:bg-slate-100 px-4 py-2">Admin Panel</a>
@endif

<a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-slate-100">Dashboard</a>
<a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-slate-100">Edit Profile</a>

{{-- Logout Form --}}
<form action="{{ route('logout') }}" method="POST" class="border-t">
    @csrf
    <button class="block w-full text-left px-4 py-2 hover:bg-slate-100 text-red-500">
        Logout
    </button>
</form>

            </div>
        </div>
        @endauth
    </nav>
</header>

    <main class="py-8 px-4 mx-auto max-w-screen-lg">
        {{ $slot }}
    </main>
</body>
</html>
