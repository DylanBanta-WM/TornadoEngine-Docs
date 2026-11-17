@php
    $code = 'rounded bg-gray-100 dark:bg-gray-900 px-1 py-0.5 font-mono text-[13px] text-gray-900 dark:text-gray-100';
    $link = 'font-medium text-indigo-600 dark:text-indigo-400 underline';
@endphp

<x-setup.header :title="__('Sharing a module')">
    {{ __('Other districts find and install shared modules from their Modules page.') }}
</x-setup.header>

<div class="mt-6 px-6 sm:px-8 pb-6 sm:pb-8 space-y-6 text-sm text-gray-700 dark:text-gray-300">
    <section class="space-y-2">
        <h2 class="font-semibold text-gray-900 dark:text-gray-100">{{ __('1. Build it') }}</h2>
        <ul class="list-disc ps-5 space-y-1">
            <li>{!! __('Follow :guide in Tornado Engine Core: a module, never changes to Core.', ['guide' => '<a href="https://github.com/DylanBanta-WM/TornadoEngineCore/blob/main/StyleGuide.MD" target="_blank" rel="noopener" class="'.$link.'">StyleGuide.MD</a>']) !!}</li>
            <li>{!! __('If something needs a change to Core, ask for it in :issues.', ['issues' => '<a href="https://github.com/DylanBanta-WM/TornadoEngineCore/issues" target="_blank" rel="noopener" class="'.$link.'">'.e(__('Core\'s issues')).'</a>']) !!}</li>
        </ul>
    </section>

    <section class="space-y-2">
        <h2 class="font-semibold text-gray-900 dark:text-gray-100">{{ __('2. Put it on GitHub') }}</h2>
        <ul class="list-disc ps-5 space-y-1">
            <li>{!! __('A public repository with the topic :topic.', ['topic' => '<code class="'.$code.'">tornado-engine-module</code>']) !!}</li>
            <li>{!! __('Its :file has an :extra section: :fields.', ['file' => '<code class="'.$code.'">composer.json</code>', 'extra' => '<code class="'.$code.'">extra.tornado</code>', 'fields' => '<code class="'.$code.'">name</code>, <code class="'.$code.'">core</code>, <code class="'.$code.'">provider</code>']) !!}</li>
            <li>{!! __('Modules it needs go in :require. They install with it.', ['require' => '<code class="'.$code.'">require</code>']) !!}</li>
        </ul>
    </section>

    <section class="space-y-2">
        <h2 class="font-semibold text-gray-900 dark:text-gray-100">{{ __('3. Publish versions') }}</h2>
        <ul class="list-disc ps-5 space-y-1">
            <li>{!! __('Submit the repository to :packagist once.', ['packagist' => '<a href="https://packagist.org/packages/submit" target="_blank" rel="noopener" class="'.$link.'">Packagist</a>']) !!}</li>
            <li>{!! __('Tag each release, for example :tag, and push. Packagist picks it up.', ['tag' => '<code class="'.$code.'">v1.2.0</code>']) !!}</li>
        </ul>
    </section>

    <section class="space-y-2">
        <h2 class="font-semibold text-gray-900 dark:text-gray-100">{{ __('4. On the Modules page') }}</h2>
        <p>{{ __('It\'s listed under Community modules.') }}</p>
    </section>
</div>
