<x-layout>
    <div class="max-w-md mx-auto">
        <div class="text-center mb-8">
            <h1 class="title mb-2">Create your account</h1>
            <p class="text-slate-600">Join our community and start sharing</p>
        </div>

        <div class="card"> 
            <form action="{{ route('register')}}" method="post" class="space-y-6">
                @csrf
                
                {{-- Username --}}
                <div>
                    <label for="username" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Username
                    </label>
                    <input type="text" name="username" 
                        value="{{ old('username') }}"
                        placeholder="Choose a username"
                        class="input @error('username') ring-red-500 @enderror">
                    @error('username')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        Email Address
                    </label>
                    <input type="email" name="email"
                        value="{{ old('email') }}"
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
                        placeholder="Create a strong password"
                        class="input @error('password') ring-red-500 @enderror">
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Confirm Password
                    </label>
                    <input type="password" name="password_confirmation"
                        placeholder="Confirm your password"
                        class="input @error('password') ring-red-500 @enderror">
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="btn">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Create Account
                    </span>
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-sm text-slate-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="link-primary font-semibold">Sign in here</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
