<x-layout>
    <div class="max-w-screen-lg mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Users</h1>
            <a href="{{ route('admin.users.create') }}" class="btn">Create User</a>
        </div>

        @if(session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @endif

        <div class="overflow-x-auto bg-white rounded border">
            <table class="min-w-full divide-y">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="p-3 text-left">Avatar</th>
                        <th class="p-3 text-left">Username</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Role</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($users as $user)
                        <tr>
                            <td class="p-3">
                                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/img_avatar2.png') }}"
                                     class="w-10 h-10 rounded-full object-cover" alt="avatar">
                            </td>
                            <td class="p-3">{{ $user->username }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">{{ $user->role }}</td>
                            <td class="p-3">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 mr-3">Edit</a>

                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-layout>
