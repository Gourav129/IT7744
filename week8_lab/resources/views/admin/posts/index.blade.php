<x-layout>
    <div class="max-w-screen-lg mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Manage Posts</h1>
        </div>

        @if(session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @endif

        <div class="overflow-x-auto bg-white rounded border">
            <table class="min-w-full divide-y">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="p-3 text-left">Title</th>
                        <th class="p-3 text-left">Author</th>
                        <th class="p-3 text-left">Image</th>
                        <th class="p-3 text-left">Created</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($posts as $post)
                        <tr>
                            <td class="p-3">{{ $post->title }}</td>
                            <td class="p-3">{{ $post->user->username }}</td>
                            <td class="p-3">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="w-20 h-12 object-cover rounded" alt="image">
                                @endif
                            </td>
                            <td class="p-3">{{ $post->created_at->diffForHumans() }}</td>
                            <td class="p-3">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 mr-3">Edit</a>

                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Delete this post?');">
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
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
