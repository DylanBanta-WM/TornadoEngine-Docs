<x-admin-layout :title="__('Docs')">
    <a href="{{ route('administration.docs.index') }}" class="mb-4 inline-flex min-h-11 items-center gap-1 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
        <svg class="size-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12.8 4.2a1 1 0 0 1 0 1.4L8.4 10l4.4 4.4a1 1 0 0 1-1.4 1.4l-5.1-5.1a1 1 0 0 1 0-1.4l5.1-5.1a1 1 0 0 1 1.4 0Z" clip-rule="evenodd" /></svg>
        {{ __('All docs') }}
    </a>

    <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        @include($doc->view)
    </div>
</x-admin-layout>
