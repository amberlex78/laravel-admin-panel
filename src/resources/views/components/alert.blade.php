@props(['type' => 'info'])

@php
    $types = [
        'info' => 'bg-blue-50 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400',
        'success' => 'bg-green-50 text-green-800 dark:bg-green-900/30 dark:text-green-400',
        'warning' => 'bg-yellow-50 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400',
        'error' => 'bg-red-50 text-red-800 dark:bg-red-900/30 dark:text-red-400',
    ];
@endphp

@if(session('success'))
    <div class="p-4 mb-4 text-sm rounded-lg {{ $types['success'] }}" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="p-4 mb-4 text-sm rounded-lg {{ $types['error'] }}" role="alert">
        {{ session('error') }}
    </div>
@endif

@if($slot->isNotEmpty())
    <div {{ $attributes->merge(['class' => 'p-4 mb-4 text-sm rounded-lg ' . $types[$type]]) }} role="alert">
        {{ $slot }}
    </div>
@endif
