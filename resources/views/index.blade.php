<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Docs') }}</h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($docs)
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($docs as $doc)
                        <a href="{{ route('docs.show', $doc->slug) }}" class="flex min-h-11 items-center justify-between gap-4 px-6 py-4 text-gray-900 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <span class="font-medium">{{ $doc->title }}</span>
                            <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M7.2 4.2a1 1 0 0 1 1.4 0l5.1 5.1a1 1 0 0 1 0 1.4l-5.1 5.1a1 1 0 0 1-1.4-1.4L11.6 10 7.2 5.6a1 1 0 0 1 0-1.4Z" clip-rule="evenodd" /></svg>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('No docs yet.') }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
