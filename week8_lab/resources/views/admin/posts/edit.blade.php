<x-layout>
    <div class="max-w-screen-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>

        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="card p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Title</label>
                <input name="title" value="{{ old('title', $post->title) }}" class="input w-full" />
                @error('title') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Body</label>
                <textarea name="body" rows="8" class="input w-full">{{ old('body', $post->body) }}</textarea>
                @error('body') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Author</label>
                <select name="user_id" class="input w-full">
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" {{ $u->id == $post->user_id ? 'selected' : '' }}>
                            {{ $u->username }} ({{ $u->role }})
                        </option>
                    @endforeach
                </select>
                @error('user_id') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Image (current)</label>
                <div class="flex items-center gap-4">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-32 h-20 object-cover rounded" alt="image">
                    @endif
                    <input type="file" name="image" class="input" />
                </div>
                @error('image') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3">
                <button class="btn">Update</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
