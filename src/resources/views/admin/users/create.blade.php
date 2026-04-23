@use('App\Enums\UserRole')
<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ isset($user) ? 'Edit User' : 'Create User' }}
            </h2>
        </div>
    </x-slot>

    <x-card maxWidth="3xl">
        <form action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <x-label for="name" value="Name" />
                    <x-input id="name" type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required autofocus :error="$errors->has('name')" />
                    @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <x-label for="email" value="Email" />
                    <x-input id="email" type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required :error="$errors->has('email')" />
                    @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <x-label for="role" value="Role" />
                    <select id="role" name="role" class="px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full {{ $errors->has('role') ? 'border-red-500' : '' }}">
                        @foreach(UserRole::cases() as $role)
                            <option value="{{ $role->value }}" @selected(old('role') === $role->value)>
                                {{ $role->label() }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <x-label for="password" value="{{ isset($user) ? 'Password (leave blank to keep current)' : 'Password' }}" />
                    <x-input id="password" type="password" name="password" :required="!isset($user)" :error="$errors->has('password')" />
                    @error('password')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <x-label for="password_confirmation" value="Confirm Password" />
                    <x-input id="password_confirmation" type="password" name="password_confirmation" :required="!isset($user)" />
                </div>

                <div class="flex items-center justify-end mt-4 border-t border-gray-200 dark:border-gray-700 pt-6">
                    <x-button type="button" :href="route('admin.users.index')" variant="secondary" class="mr-3">Cancel</x-button>
                    <x-button type="submit">{{ isset($user) ? 'Update User' : 'Create User' }}</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-admin-layout>
