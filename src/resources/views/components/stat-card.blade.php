@props([
    'label',
    'value',
    'icon' => null,
    'color' => 'indigo'
])

@php
    $colors = [
        'indigo' => 'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400',
        'green'  => 'bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400',
        'blue'   => 'bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400',
        'orange' => 'bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400',
    ];
    $colorClass = $colors[$color] ?? $colors['indigo'];
@endphp

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 flex items-center">
    @if($icon)
        <div class="p-3 rounded-full {{ $colorClass }} mr-4">
            {{ $icon }}
        </div>
    @endif
    <div>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $label }}</p>
        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $value }}</p>
    </div>
</div>
