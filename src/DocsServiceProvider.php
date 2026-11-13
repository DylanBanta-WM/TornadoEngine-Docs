<?php

namespace TornadoEngine\Docs;

use App\Administration\Administration;
use Illuminate\Support\ServiceProvider;

class DocsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Docs::class);
    }

    public function boot(Docs $docs, Administration $administration): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'docs');
        $this->loadRoutesFrom(__DIR__.'/../routes/docs.php');

        $administration->add(__('Docs'), 'administration.docs.index', active: 'administration.docs.*', order: 900,
            description: __('Guides for setting up and using Tornado Engine.'));

        // Core's DNS and HTTPS guide, also shown at /dns-setup during first-time setup.
        $docs->add('dns-setup', __('Set up DNS and HTTPS'), 'docs.dns-setup', order: 10);
    }
}
