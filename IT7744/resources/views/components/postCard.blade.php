@props(['post','full' => false])

<div class="card group">
    {{-- Author Header --}}
    <div class="flex items-center gap-3 mb-4 pb-4 border-b border-slate-200">
        <img src="{{ $post->user->avatar ? asset('storage/' . $post->user->avatar) : asset('img/img_avatar2.png') }}"
             class="w-10 h-10 rounded-full object-cover border-2 border-gray-200"
             alt="{{ $post->user->username }}">
        <div class="flex-1">
            <a href="{{route('users.posts', $post->user)}}"
               class="font-semibold text-slate-800 hover:text-gray-600 transition-colors">
                {{ $post->user->username }}
            </a>
            <p class="text-xs text-slate-500">{{ $post->created_at->diffForHumans() }}</p>
        </div>
    </div>

    {{-- Title --}}
    <h2 class="font-bold text-2xl text-slate-800 mb-3 group-hover:text-gray-600 transition-colors">
        {{ $post->title }}
    </h2>

    {{-- Image --}}
    @if($post->image)
        <div class="my-4 rounded-xl overflow-hidden shadow-md">
            <img src="{{ asset('storage/' . $post->image) }}" 
                 alt="{{ $post->title }}" 
                 class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-300">
        </div>
    @endif

    {{-- Body --}}
    @if($full)
        <div class="text-slate-700 leading-relaxed mb-4">
            <p class="whitespace-pre-wrap">{{ $post->body }}</p>
        </div>
    @else
        <div class="text-slate-600 leading-relaxed mb-4">
            <p>{{ Str::words($post->body, 30) }}</p>
            <a href="{{ route('posts.show', $post) }}" class="inline-flex items-center gap-1 text-gray-600 hover:text-gray-800 font-semibold mt-2 group/link">
                Read more
                <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    @endif

    @if($slot->isNotEmpty())
        <div class="flex items-center justify-end gap-3 mt-6 pt-4 border-t border-slate-200">
            {{ $slot }}
        </div>
    @endif
</div>
