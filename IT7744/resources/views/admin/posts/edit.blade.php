<x-layout>
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 font-medium mb-6 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Posts
            </a>
            <h1 class="title mb-2">Edit Post</h1>
            <p class="text-slate-600">Moderate and update post content</p>
        </div>

        <div class="card">
            <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                        Title
                    </label>
                    <input name="title" value="{{ old('title', $post->title) }}" placeholder="Post title" class="input" />
                    @error('title') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="body" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Body
                    </label>
                    <textarea name="body" rows="8" placeholder="Post content" class="input">{{ old('body', $post->body) }}</textarea>
                    @error('body') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="user_id" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Author
                    </label>
                    <select name="user_id" class="input">
                        @foreach($users as $u)
                            <option value="{{ $u->id }}" {{ $u->id == $post->user_id ? 'selected' : '' }}>
                                {{ $u->username }} ({{ $u->role }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id') <p class="error">{{ $message }}</p> @enderror
                </div>

                @if($post->image)
                    <div class="border border-slate-200 rounded-xl p-4 bg-slate-50">
                        <label class="text-sm font-semibold text-slate-700 mb-2 block">Current Image</label>
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-full max-w-md rounded-lg shadow-md" alt="image">
                    </div>
                @endif

                <div>
                    <label for="image" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $post->image ? 'Replace Image' : 'Add Image' }}
                    </label>
                    <input type="file" name="image" accept="image/*" class="input" />
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
                    <a href="{{ route('admin.posts.index') }}" class="btn-secondary flex items-center justify-center px-6">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
