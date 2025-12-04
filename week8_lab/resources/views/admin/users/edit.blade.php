<x-layout>
    <div class="max-w-screen-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data" class="card p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Username</label>
                <input name="username" value="{{ old('username', $user->username) }}" class="input w-full" />
                @error('username') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input name="email" value="{{ old('email', $user->email) }}" class="input w-full" />
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Role</label>
                <select name="role" class="input w-full">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Avatar (current)</label>
                <div class="flex items-center gap-4">
                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/img_avatar2.png') }}"
                         class="w-16 h-16 rounded-full object-cover" alt="avatar">
                    <input type="file" name="avatar" class="input" />
                </div>
                @error('avatar') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button class="btn">Update</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
