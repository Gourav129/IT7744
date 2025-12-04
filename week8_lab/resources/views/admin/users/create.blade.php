<x-layout>
    <div class="max-w-screen-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Create User</h1>

        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="card p-6">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Username</label>
                <input name="username" value="{{ old('username') }}" class="input w-full" />
                @error('username') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input name="email" value="{{ old('email') }}" class="input w-full" />
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Password</label>
                    <input type="password" name="password" class="input w-full" />
                    @error('password') <p class="error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="input w-full" />
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Role</label>
                <select name="role" class="input w-full">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Avatar</label>
                <input type="file" name="avatar" class="input" />
                @error('avatar') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button class="btn">Create</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
