<x-layout>
    <div class="text-center py-16">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-6xl font-extrabold mb-6 bg-gradient-to-r from-gray-600 via-neutral-600 to-pink-600 bg-clip-text text-transparent">
                Welcome to {{ env('APP_NAME') }}
            </h1>
            <p class="text-xl text-slate-600 mb-8 max-w-2xl mx-auto">
                Share your thoughts, connect with others, and discover amazing content. Join our community today!
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                @guest
                    <a href="{{ route('register') }}" class="btn bg-gradient-to-r from-gray-600 to-neutral-600 hover:from-gray-500 hover:to-neutral-500 w-auto px-8 py-4 text-lg">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}" class="btn-secondary w-auto px-8 py-4 text-lg">
                        Sign In
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn bg-gradient-to-r from-gray-600 to-neutral-600 hover:from-gray-500 hover:to-neutral-500 w-auto px-8 py-4 text-lg">
                        Go to Dashboard
                    </a>
                    <a href="{{ route('posts.index') }}" class="btn-secondary w-auto px-8 py-4 text-lg">
                        Browse Posts
                    </a>
                @endguest
            </div>
        </div>
        
        <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="card text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-gray-500 to-neutral-500 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Create Posts</h3>
                <p class="text-slate-600">Share your ideas and stories with the community</p>
            </div>
            
            <div class="card text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-neutral-500 to-pink-500 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Connect</h3>
                <p class="text-slate-600">Engage with other members and build relationships</p>
            </div>
            
            <div class="card text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-pink-500 to-red-500 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Discover</h3>
                <p class="text-slate-600">Explore trending topics and find inspiration</p>
            </div>
        </div>
    </div>
</x-layout>
