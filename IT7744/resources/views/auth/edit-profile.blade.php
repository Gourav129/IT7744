<x-layout>
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="title mb-2">Edit Profile</h1>
            <p class="text-slate-600">Update your account information</p>
        </div>

        <div class="card">
            @if(session('success'))
                <x-flashMsg msg="{{ session('success') }}" />
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Profile Image Preview --}}
                <div class="flex flex-col items-center mb-6 pb-6 border-b border-slate-200">
                    <div class="relative">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/img_avatar2.png') }}" 
                             class="w-24 h-24 rounded-full object-cover border-4 border-gray-200 shadow-lg" 
                             alt="avatar">
                        <div class="absolute bottom-0 right-0 bg-gray-600 rounded-full p-2 shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-slate-600 mt-3">Profile Picture</p>
                </div>

                <div>
                    <label for="avatar" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Upload New Avatar
                    </label>
                    <input type="file" name="avatar" accept="image/*" class="input">
                    @error('avatar') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="username" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Username
                    </label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" class="input">
                    @error('username') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        Email Address
                    </label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input">
                    @error('email') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="border-t border-slate-200 pt-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">Change Password</h3>
                    <p class="text-sm text-slate-600 mb-4">Leave blank to keep current password</p>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="password" class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                New Password
                            </label>
                            <input type="password" name="password" placeholder="Enter new password" class="input">
                            @error('password') <p class="error">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                Confirm New Password
                            </label>
                            <input type="password" name="password_confirmation" placeholder="Confirm new password" class="input">
                        </div>
                    </div>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="btn flex-1">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Profile
                        </span>
                    </button>
                    <a href="{{ route('dashboard') }}" class="btn-secondary flex items-center justify-center px-6">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
