@props([
    'title' => null,
    'subtitle' => null,
    'footer' => null,
    'maxWidth' => 'full'
])

@php
    $maxWidthClass = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        'full' => 'w-full',
    ][$maxWidth] ?? 'w-full';
@endphp

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden {{ $maxWidthClass }}">
    @if($title || $subtitle)
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            @if($title)
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $title }}</h3>
            @endif
            @if($subtitle)
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700">
            {{ $footer }}
        </div>
    @endif
</div>
