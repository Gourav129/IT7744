<x-layout>
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="title mb-1">User Management</h1>
                <p class="text-slate-600">Manage all user accounts and permissions</p>
            </div>
            <div class="flex items-center gap-3">
                <form action="" method="GET" class="hidden sm:flex items-center gap-2">
                    <input type="search" name="q" placeholder="Search users..." class="input px-3 py-2 w-64" />
                    <button class="btn px-4">Search</button>
                </form>
                <a href="{{ route('admin.users.create') }}" class="btn w-auto px-5">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Create User
                    </span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @endif

        <div class="card overflow-hidden p-4 sm:p-6">
            {{-- Desktop / tablet table --}}
            <div class="overflow-x-auto hidden md:block">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Avatar</th>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Username</th>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Email</th>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Role</th>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-100">
                        @foreach($users as $user)
                            <tr class="hover:bg-slate-50">
                                <td class="px-4 py-4 align-top">
                                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/img_avatar2.png') }}"
                                         class="w-12 h-12 rounded-full object-cover border-2 border-gray-100" alt="avatar">
                                </td>
                                <td class="px-4 py-4 align-top">
                                    <div class="font-semibold text-slate-800">{{ $user->username }}</div>
                                    <div class="text-xs text-slate-400 mt-1">Joined {{ $user->created_at->format('M d, Y') }}</div>
                                </td>
                                <td class="px-4 py-4 align-top text-slate-700">{{ $user->email }}</td>
                                <td class="px-4 py-4 align-top">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $user->role === 'admin' ? 'bg-gray-100 text-gray-700' : 'bg-emerald-100 text-emerald-700' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 align-top">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="p-2 rounded hover:bg-slate-100" title="Edit">
                                            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded hover:bg-slate-100" title="Delete">
                                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Mobile: cards --}}
            <div class="md:hidden grid grid-cols-1 gap-4">
                @foreach($users as $user)
                    <div class="bg-white rounded-lg shadow-sm p-4 flex items-center gap-4">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/img_avatar2.png') }}" class="w-14 h-14 rounded-full object-cover" alt="avatar">
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="font-semibold text-slate-800">{{ $user->username }}</div>
                                    <div class="text-xs text-slate-400">{{ $user->email }}</div>
                                </div>
                                <div class="text-xs {{ $user->role === 'admin' ? 'text-gray-700' : 'text-emerald-700' }}">{{ ucfirst($user->role) }}</div>
                            </div>
                            <div class="mt-3 flex items-center gap-3">
                                <a href="{{ route('admin.users.edit', $user) }}" class="link-primary px-3 py-1 rounded bg-slate-50">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link-danger px-3 py-1 rounded bg-slate-50">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        @if($users->hasPages())
            <div class="mt-6 flex justify-center">
                <div class="bg-white rounded-xl shadow-lg p-4">
                    {{ $users->links() }}
                </div>
            </div>
        @endif
    </div>
</x-layout>
