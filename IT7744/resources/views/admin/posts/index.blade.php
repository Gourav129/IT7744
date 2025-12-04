<x-layout>
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="title mb-1">Manage Posts</h1>
                    <p class="text-slate-600">Moderate and manage all posts on the platform</p>
                </div>
                <div class="flex items-center gap-3">
                    {{-- you can place filters / search / buttons here --}}
                </div>
            </div>
        </div>

        @if(session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @endif

        <div class="card overflow-hidden p-4 sm:p-6">
            {{-- Table for medium+ screens --}}
            <div class="overflow-x-auto hidden md:block">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Title</th>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Author</th>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Image</th>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Created</th>
                            <th class="text-left px-4 py-3 text-sm font-medium text-slate-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-100">
                        @foreach($posts as $post)
                            <tr class="hover:bg-slate-50">
                                <td class="px-4 py-4 align-top max-w-xs truncate">
                                    <div class="font-semibold text-slate-800">{{ $post->title }}</div>
                                    <div class="text-xs text-slate-400 mt-1">{{ Str::limit($post->excerpt ?? '', 80) }}</div>
                                </td>
                                <td class="px-4 py-4 align-top">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $post->user->avatar ? asset('storage/' . $post->user->avatar) : asset('img/img_avatar2.png') }}"
                                             class="w-8 h-8 rounded-full object-cover"
                                             alt="{{ $post->user->username }}">
                                        <div>
                                            <div class="text-slate-700">{{ $post->user->username }}</div>
                                            <div class="text-xs text-slate-400">{{ $post->user->email ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 align-top">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" 
                                             class="w-28 h-16 object-cover rounded-lg shadow-sm" 
                                             alt="image">
                                    @else
                                        <span class="text-slate-400 text-sm">No image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 align-top text-sm text-slate-600">{{ $post->created_at->diffForHumans() }}</td>
                                <td class="px-4 py-4 align-top">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="link-primary p-2 rounded hover:bg-slate-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="link-danger p-2 rounded hover:bg-slate-100">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

            {{-- Card list for small screens --}}
            <div class="md:hidden grid grid-cols-1 gap-4">
                @foreach($posts as $post)
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex items-start gap-4">
                            <div class="w-20 flex-shrink-0">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-16 object-cover rounded" alt="image">
                                @else
                                    <div class="w-full h-16 bg-slate-100 rounded flex items-center justify-center text-slate-400 text-sm">No image</div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-800">{{ $post->title }}</div>
                                        <div class="text-xs text-slate-400 mt-1">{{ Str::limit($post->excerpt ?? '', 80) }}</div>
                                    </div>
                                    <div class="text-xs text-slate-500">{{ $post->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="mt-3 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ $post->user->avatar ? asset('storage/' . $post->user->avatar) : asset('img/img_avatar2.png') }}" class="w-8 h-8 rounded-full object-cover" alt="{{ $post->user->username }}">
                                        <div class="text-sm text-slate-700">{{ $post->user->username }}</div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="link-primary p-2 rounded hover:bg-slate-100">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="link-danger p-2 rounded hover:bg-slate-100">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        @if($posts->hasPages())
            <div class="mt-6 flex justify-center">
                <div class="bg-white rounded-xl shadow-lg p-4">
                    {{ $posts->links() }}
                </div>
            </div>
        @endif
    </div>
</x-layout>