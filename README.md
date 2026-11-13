# Tornado Engine Docs

A [Tornado Engine](https://github.com/DylanBanta-WM/TornadoEngineCore) core-module: documentation pages at `/docs`, for people with the `docs.view` permission (admins, until the Access module says otherwise). Docs adds a menu item through Nav, and Access lists `docs.view` so roles can grant it.

## Adding a doc from a module

Require `tornado-engine/docs` in your module's `composer.json`, then add your docs in your service provider's `boot()`:

```php
use TornadoEngine\Docs\Docs;

public function boot(Docs $docs): void
{
    $docs->add('using-notes', 'Using Notes', 'notes::docs.using-notes', order: 50);
}
```

The view holds the doc's content only. Docs shows it at `/docs/using-notes`.
