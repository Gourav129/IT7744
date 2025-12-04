<x-layout>
    <h1 class="title">Welcome back</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('login') }}" method="post">
            @csrf            

            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email"
                    value="{{ old('email')}}"
                    class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password"
                    class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember">Remember me</label>
            </div>

            {{-- Submit Button --}}
            <button class="btn">Login</button>

            {{-- Global Error --}}
            @error('auth')
                <p class="error mt-4 text-center">{{ $message }}</p>
            @enderror
        </form>
    </div>
</x-layout>
