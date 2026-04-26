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
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'id', 'direction' => request('sort') === 'id' && request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="group inline-flex items-center">
                            ID
                            @if(request('sort') === 'id' || !request('sort'))
                                <span class="ml-2 flex-none rounded {{ request('sort') === 'id' ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-200' : 'text-gray-400 opacity-0 group-hover:opacity-100' }}">
                                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="{{ request('sort') === 'id' && request('direction') === 'desc' ? 'M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' : 'M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z' }}" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => request('sort') === 'name' && request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="group inline-flex items-center">
                            Name
                            <span class="ml-2 flex-none rounded {{ request('sort') === 'name' ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-200' : 'text-gray-400 opacity-0 group-hover:opacity-100' }}">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="{{ request('sort') === 'name' && request('direction') === 'desc' ? 'M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' : 'M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z' }}" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'email', 'direction' => request('sort') === 'email' && request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="group inline-flex items-center">
                            Email
                            <span class="ml-2 flex-none rounded {{ request('sort') === 'email' ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-200' : 'text-gray-400 opacity-0 group-hover:opacity-100' }}">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="{{ request('sort') === 'email' && request('direction') === 'desc' ? 'M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' : 'M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z' }}" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'role', 'direction' => request('sort') === 'role' && request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="group inline-flex items-center">
                            Role
                            <span class="ml-2 flex-none rounded {{ request('sort') === 'role' ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-200' : 'text-gray-400 opacity-0 group-hover:opacity-100' }}">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="{{ request('sort') === 'role' && request('direction') === 'desc' ? 'M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' : 'M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z' }}" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'direction' => request('sort') === 'created_at' && request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="group inline-flex items-center">
                            Joined
                            <span class="ml-2 flex-none rounded {{ request('sort') === 'created_at' ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-200' : 'text-gray-400 opacity-0 group-hover:opacity-100' }}">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="{{ request('sort') === 'created_at' && request('direction') === 'desc' ? 'M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' : 'M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z' }}" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </th>
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
