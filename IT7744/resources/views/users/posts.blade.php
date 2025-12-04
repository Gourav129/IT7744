<x-layout>
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/img_avatar2.png') }}"
                 class="w-16 h-16 rounded-full object-cover border-4 border-gray-200 shadow-lg"
                 alt="{{ $user->username }}">
            <div>
                <h1 class="title mb-0">{{ $user->username }}'s Posts</h1>
                <p class="text-slate-600">
                    <span class="font-semibold text-gray-600">{{ $posts->total() }}</span> 
                    {{ Str::plural('post', $posts->total()) }}
                </p>
            </div>
        </div>
    </div>

    @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <x-postCard :post="$post">
                    <a href="{{ route('posts.show', $post) }}" 
                       class="inline-flex items-center gap-2 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View
                    </a>
                </x-postCard>
            @endforeach
        </div>
    @else
        <div class="card text-center py-12">
            <svg class="w-16 h-16 mx-auto text-slate-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3 class="text-xl font-semibold text-slate-700 mb-2">No posts yet</h3>
            <p class="text-slate-600">{{ $user->username }} hasn't created any posts yet.</p>
        </div>
    @endif

    @if($posts->hasPages())
        <div class="mt-12 flex justify-center">
            <div class="bg-white rounded-xl shadow-lg p-4">
                {{ $posts->links() }}
            </div>
        </div>
    @endif
</x-layout>
