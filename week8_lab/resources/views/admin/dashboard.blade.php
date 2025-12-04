<x-layout>
    <div class="max-w-screen-lg mx-auto">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

        <div class="grid grid-cols-2 gap-6">
            <a href="{{ route('admin.users.index') }}" class="card p-6 text-center hover:shadow">
                <h2 class="text-lg font-semibold">Manage Users</h2>
                <p class="text-sm text-slate-600 mt-2">Create, edit or delete users</p>
            </a>

            <a href="{{ route('admin.posts.index') }}" class="card p-6 text-center hover:shadow">
                <h2 class="text-lg font-semibold">Manage Posts</h2>
                <p class="text-sm text-slate-600 mt-2">Edit or remove posts from the site</p>
            </a>
        </div>
    </div>
</x-layout>
