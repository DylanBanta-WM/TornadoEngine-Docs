<?php

namespace TornadoEngine\Docs;

/**
 * One doc: its address (/docs/{slug}), title and the Blade view with its content.
 */
final readonly class Doc
{
    public function __construct(
        public string $slug,
        public string $title,
        public string $view,
        public int $order,
    ) {}
}
