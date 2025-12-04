<x-layout>
    <div class="mb-8">
        <h1 class="title mb-2">
            Welcome back, {{ auth()->user()->username }}!
        </h1>
        <p class="text-slate-600 text-lg">
            You have <span class="font-bold text-gray-600">{{ $posts->total() }}</span> {{ Str::plural('post', $posts->total()) }}
        </p>
    </div>

    {{-- Flash message --}}
    @if (session('success'))
        <x-flashMsg msg="{{ session('success') }}" />
    @elseif (session('delete'))
        <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
    @endif

    {{-- Create Post Form --}}
    <div class="card mb-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-gray-500 to-neutral-500 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Create a new post</h2>
                <p class="text-sm text-slate-600">Share your thoughts with the community</p>
            </div>
        </div>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                    Post Title
                </label>
                <input type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="What's on your mind?"
                    class="input @error('title') ring-red-500 @enderror">
                @error('title') <p class="error">{{ $message }}</p> @enderror
            </div>

            {{-- Body --}}
            <div>
                <label for="body" class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Post Content
                </label>
                <textarea name="body"
                    rows="6"
                    placeholder="Write your post content here..."
                    class="input @error('body') ring-red-500 @enderror">{{ old('body') }}</textarea>
                @error('body') <p class="error">{{ $message }}</p> @enderror
            </div>

            {{-- Featured image --}}
            <div>
                <label class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Featured Image (Optional)
                </label>
                <input type="file" name="image" accept="image/*" class="input">
                @error('image') <p class="error">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn">
                <span class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create Post
                </span>
            </button>
        </form>
    </div>

    {{-- Show user's posts --}}
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-slate-800 mb-2">Your Latest Posts</h2>
        <p class="text-slate-600">Manage and edit your posts</p>
    </div>

    @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            @foreach($posts as $post)
                <x-postCard :post="$post">
                    <a href="{{route('posts.edit', $post)}}" 
                       class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post) }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this post?')"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete
                        </button>
                    </form>
                </x-postCard>
            @endforeach
        </div>
    @else
        <div class="card text-center py-12">
            <svg class="w-16 h-16 mx-auto text-slate-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3 class="text-xl font-semibold text-slate-700 mb-2">No posts yet</h3>
            <p class="text-slate-600">Create your first post above to get started!</p>
        </div>
    @endif

    @if($posts->hasPages())
        <div class="flex justify-center">
            <div class="bg-white rounded-xl shadow-lg p-4">
                {{ $posts->links() }}
            </div>
        </div>
    @endif
</x-layout>
