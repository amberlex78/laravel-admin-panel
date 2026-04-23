<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    @if(session('success'))
                        <div class="mb-6 p-4 rounded-lg bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <p class="text-sm font-medium text-green-800 dark:text-green-400">{{ session('success') }}</p>
                        </div>
                    @endif

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Profile Information
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Update your account's profile information and email address.
                            </p>
                        </header>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-label for="name" value="Name" />
                                <x-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                @error('name')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <x-label for="email" value="Email" />
                                <x-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                                @error('email')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            </div>

                            <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mt-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Update Password</h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 mb-4">
                                    Ensure your account is using a long, random password to stay secure. Leave blank to keep current.
                                </p>

                                <div class="space-y-6">
                                    <div>
                                        <x-label for="password" value="New Password" />
                                        <x-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                        @error('password')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                                    </div>

                                    <div>
                                        <x-label for="password_confirmation" value="Confirm Password" />
                                        <x-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                        @error('password_confirmation')<p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 border-t border-gray-200 dark:border-gray-700 pt-6">
                                <x-button type="submit">Save</x-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
