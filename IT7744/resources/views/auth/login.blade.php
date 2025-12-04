<x-layout>
    <div class="max-w-md mx-auto">
        <div class="text-center mb-8">
            <h1 class="title mb-2">Welcome back</h1>
            <p class="text-slate-600">Sign in to your account to continue</p>
        </div>

        <div class="card">
            <form action="{{ route('login') }}" method="post" class="space-y-6">
                @csrf            

                {{-- Email --}}
                <div>
                    <label for="email" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        Email Address
                    </label>
                    <input type="email" name="email"
                        value="{{ old('email')}}"
                        placeholder="you@example.com"
                        class="input @error('email') ring-red-500 @enderror">
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Password
                    </label>
                    <input type="password" name="password"
                        placeholder="Enter your password"
                        class="input @error('password') ring-red-500 @enderror">
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-gray-600 border-slate-300 rounded focus:ring-gray-500">
                        <label for="remember" class="ml-2 text-sm text-slate-700">Remember me</label>
                    </div>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="btn">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Sign In
                    </span>
                </button>

                {{-- Global Error --}}
                @error('auth')
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <p class="text-sm font-medium">{{ $message }}</p>
                    </div>
                @enderror
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-sm text-slate-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="link-primary font-semibold">Sign up here</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
