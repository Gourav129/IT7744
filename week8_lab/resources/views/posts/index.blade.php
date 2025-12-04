<x-layout>
    <h1 class="title">Latest Posts</h1>

    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <div class="card">
                {{-- Title --}}
                <h2 class="font-bold text-xl">{{ $post->title }}</h2>

                {{-- Author and date --}}
                <div class="text-xs text-gray-600 mb-2">
                    <span>Posted {{ $post->created_at->diffForHumans() }}</span>
                </div>

                {{-- Body preview --}}
                <div class="text-sm">
                    <p>{{ Str::words($post->body, 15) }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</x-layout>
