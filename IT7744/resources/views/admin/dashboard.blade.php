<x-layout>
    <div class="max-w-screen-xl mx-auto">
        <div class="mb-8">
            <h1 class="title mb-2">Admin Dashboard</h1>
            <p class="text-slate-600">Manage your platform and content</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('admin.users.index') }}" class="card-hover group">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-gray-500 to-neutral-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-slate-800 mb-2 group-hover:text-gray-600 transition-colors">Manage Users</h2>
                        <p class="text-slate-600 mb-4">Create, edit, or delete user accounts and manage permissions</p>
                        <span class="inline-flex items-center gap-2 text-gray-600 font-semibold text-sm">
                            Go to Users
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.posts.index') }}" class="card-hover group">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-neutral-500 to-pink-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-slate-800 mb-2 group-hover:text-neutral-600 transition-colors">Manage Posts</h2>
                        <p class="text-slate-600 mb-4">Edit, moderate, or remove posts from the platform</p>
                        <span class="inline-flex items-center gap-2 text-neutral-600 font-semibold text-sm">
                            Go to Posts
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</x-layout>
