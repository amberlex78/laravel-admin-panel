@props(['disabled' => false, 'error' => false])

@php
    $baseClasses = 'px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full transition-colors';
    $errorClasses = $error ? 'border-red-500 focus:border-red-500 focus:ring-red-500 dark:border-red-500' : '';
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $baseClasses . ' ' . $errorClasses]) !!}>
