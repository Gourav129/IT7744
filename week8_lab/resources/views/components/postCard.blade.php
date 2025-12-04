@props(['post','full' => false])

<div class="card">

    {{-- Title --}}
    <h2 class="font-bold text-xl">{{ $post->title }}</h2>

    {{-- Author --}}
    <div class="text-xs">
        <span>Posted {{ $post->created_at->diffForHumans() }} by</span>
        <a href="{{route('users.posts', $post->user)}}"
           class="text-blue-500 font-medium">
            {{ $post->user->username }}
        </a>
    </div>

    {{-- Image --}}
    @if($post->image)
        <div class="my-4">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full rounded-lg">
        </div>
    @endif

    {{-- Body --}}
    @if($full)
        <div class="text-sm">
            <span>{{ $post->body }}</span>
        </div>
    @else
        <div class="text-sm">
            <span>{{ Str::words($post->body, 20) }}</span>
            <a href="{{ route('posts.show', $post) }}" class="text-blue-500">
                Read more →
            </a>
        </div>
    @endif

    <div class="flex items-center justify-end gap-4 mt-6">
        {{ $slot }}
    </div>

</div>
