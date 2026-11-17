<?php

namespace TornadoEngine\Docs;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use TornadoEngine\Access\Access;
use TornadoEngine\Nav\Nav;

class DocsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Docs::class);
    }

    public function boot(Docs $docs): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'docs');
        $this->loadRoutesFrom(__DIR__.'/../routes/docs.php');

        // Who can read the docs. The Access module decides this when it's installed.
        if (! Gate::has('docs.view')) {
            Gate::define('docs.view', fn (User $user) => (bool) $user->is_admin);
        }

        $this->callAfterResolving(Access::class, function (Access $access) {
            $access->permission('docs.view', __('Read the docs'), module: 'Docs');
        });

        $this->callAfterResolving(Nav::class, function (Nav $nav) {
            $nav->add(__('Docs'), 'docs.index', active: 'docs.*', order: 900, can: 'docs.view');
            if (method_exists($nav, 'tool')) {
                $nav->tool(__('Docs'), 'docs.index', __('How to set up and use Tornado Engine.'),
                    section: __('Help'), icon: 'book', color: 'amber', can: 'docs.view');
            }
        });

        // Core's DNS and HTTPS guide, also shown at /dns-setup during first-time setup.
        $docs->add('dns-setup', __('Set up DNS and HTTPS'), 'docs.dns-setup', order: 10);
        $docs->add('sharing-modules', __('Sharing a module'), 'docs::pages.sharing-modules', order: 90);
    }
}
