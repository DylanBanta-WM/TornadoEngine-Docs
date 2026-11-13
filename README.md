# Tornado Engine Docs

A [Tornado Engine](https://github.com/DylanBanta-WM/TornadoEngineCore) core-module: documentation pages in Administration, at `/administration/docs`.

## Adding a doc from a module

Require `tornado-engine/docs` in your module's `composer.json`, then add your docs in your service provider's `boot()`:

```php
use TornadoEngine\Docs\Docs;

public function boot(Docs $docs): void
{
    $docs->add('using-notes', 'Using Notes', 'notes::docs.using-notes', order: 50);
}
```

The view holds the doc's content only. Docs shows it at `/administration/docs/using-notes`.
