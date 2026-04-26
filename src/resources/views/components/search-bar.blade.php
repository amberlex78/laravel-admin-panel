@props(['route', 'placeholder' => 'Search...', 'value' => request('search')])

<div class="p-4 border-b border-gray-200 dark:border-gray-700">
    <form action="{{ $route }}" method="GET" class="flex items-center gap-3">
        <div class="flex-1 max-w-sm">
            <label for="search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" name="search" id="search" value="{{ $value }}" 
                    class="block w-full pl-10 pr-4 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm rounded-md" 
                    placeholder="{{ $placeholder }}">
            </div>
        </div>
        <x-button type="submit" variant="secondary">Search</x-button>
        @if($value)
            <x-button :href="$route" variant="secondary">Clear</x-button>
        @endif
        
        {{ $slot }}
    </form>
</div>
