@props(['sort', 'label'])

@php
    $currentSort = request('sort');
    $currentDirection = request('direction', 'asc');
    $isActive = $currentSort === $sort || (!$currentSort && $sort === 'id');
    $nextDirection = ($isActive && $currentDirection === 'asc') ? 'desc' : 'asc';
@endphp

<th {{ $attributes->merge(['scope' => 'col', 'class' => 'px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider']) }}>
    <a href="{{ request()->fullUrlWithQuery(['sort' => $sort, 'direction' => $nextDirection]) }}" class="group inline-flex items-center">
        {{ $label }}
        <span class="ml-2 flex-none rounded {{ $isActive ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-200' : 'text-gray-400 opacity-0 group-hover:opacity-100' }}">
            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                @if($isActive && $currentDirection === 'desc')
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                @else
                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                @endif
            </svg>
        </span>
    </a>
</th>
