<x-layout>
    <div class="max-w-3xl mx-auto">
        <a href="{{route('dashboard')}}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 font-medium mb-6 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Dashboard
        </a>

        <div class="card">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-slate-800 mb-2">Update your post</h2>
                <p class="text-slate-600">Edit your post content and image</p>
            </div>

            <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Post Title --}}
                <div>
                    <label for="title" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                        Post Title
                    </label>
                    <input type="text" name="title" value="{{ $post->title }}"
                    placeholder="Enter a catchy title"
                    class="input @error('title') ring-red-500 @enderror">
                    @error('title')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Post Body --}}
                <div>
                    <label for="body" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Post Content
                    </label>
                    <textarea name="body" rows="8"
                    placeholder="Write your post content here..."
                    class="input @error('body') ring-red-500 @enderror">{{ $post->body }}</textarea>
                    @error('body')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Current featured image --}}
                @if ($post->image)
                    <div class="border border-slate-200 rounded-xl p-4 bg-slate-50">
                        <label class="text-sm font-semibold text-slate-700 mb-2 block">Current Featured Image</label>
                        <div class="relative inline-block">
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="rounded-lg max-w-md shadow-md">
                        </div>
                    </div>
                @endif

                {{-- Featured image --}}
                <div>
                    <label class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $post->image ? 'Replace Featured Image' : 'Add Featured Image' }}
                    </label>
                    <input type="file" name="image" accept="image/*" class="input">
                    @error('image') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="btn flex-1">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Post
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

