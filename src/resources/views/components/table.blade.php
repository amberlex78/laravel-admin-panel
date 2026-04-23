<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
            {{ $head }}
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
            {{ $body }}
        </tbody>
    </table>
</div>

@if(isset($pagination))
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
        {{ $pagination }}
    </div>
@endif
