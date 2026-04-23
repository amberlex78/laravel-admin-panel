@use('App\Enums\UserRole')
<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                User Details: {{ $user->name }}
            </h2>
        </div>
    </x-slot>

    <x-card title="User Information" maxWidth="3xl">
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-8">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->name }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->email }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Role</dt>
                <dd class="mt-1 text-sm">
                    @if($user->role === UserRole::Admin)
                        <x-badge type="primary">{{ $user->role->label() }}</x-badge>
                    @else
                        <x-badge type="default">{{ $user->role->label() }}</x-badge>
                    @endif
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Joined</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('F j, Y, g:i a') }}</dd>
            </div>
        </dl>

        <x-slot name="footer">
            <div class="flex justify-end gap-3">
                @can('update', $user)
                    <x-button :href="route('admin.users.edit', $user)">Edit</x-button>
                @endcan
                @can('delete', $user)
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" variant="danger">Delete</x-button>
                    </form>
                @endcan
            </div>
        </x-slot>
    </x-card>
</x-admin-layout>
