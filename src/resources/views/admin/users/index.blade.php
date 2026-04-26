@use('App\Enums\UserRole')
<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Users Management
            </h2>
            <x-button :href="route('admin.users.create')">Add User</x-button>
        </div>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
            <form action="{{ route('admin.users.index') }}" method="GET" class="flex items-center gap-3">
                <div class="flex-1 max-w-sm">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" class="block w-full pl-10 pr-4 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm rounded-md" placeholder="Search by name or email...">
                    </div>
                </div>
                <x-button type="submit" variant="secondary">Search</x-button>
                @if(request('search'))
                    <x-button :href="route('admin.users.index')" variant="secondary">Clear</x-button>
                @endif
            </form>
        </div>
        
        <x-table>
            <x-slot name="head">
                <tr>
                    <x-sortable-header sort="id" label="ID" />
                    <x-sortable-header sort="name" label="Name" />
                    <x-sortable-header sort="email" label="Email" />
                    <x-sortable-header sort="role" label="Role" />
                    <x-sortable-header sort="created_at" label="Joined" />
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @forelse($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($user->role === UserRole::Admin)
                                <x-badge type="primary">{{ $user->role->label() }}</x-badge>
                            @else
                                <x-badge type="default">{{ $user->role->label() }}</x-badge>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end gap-3">
                                <x-button :href="route('admin.users.show', $user)" variant="secondary" size="sm">View</x-button>
                                @can('update', $user)
                                    <x-button :href="route('admin.users.edit', $user)" size="sm">Edit</x-button>
                                @endcan
                                @can('delete', $user)
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <x-button type="submit" variant="danger" size="sm">Delete</x-button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 dark:text-gray-400">No users found.</td>
                    </tr>
                @endforelse
            </x-slot>
            <x-slot name="pagination">
                {{ $users->links() }}
            </x-slot>
        </x-table>
    </div>
</x-admin-layout>
