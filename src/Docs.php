<?php

namespace TornadoEngine\Docs;

use Illuminate\Support\Facades\View;

/**
 * The docs in Administration. Modules add theirs in their service provider's boot():
 *
 *     app(Docs::class)->add('notes', 'Using Notes', 'notes::docs.using-notes');
 *
 * The view holds the doc's content only; Docs puts it in the Administration layout.
 */
class Docs
{
    /** @var array<string, Doc> */
    private array $docs = [];

    /**
     * @param  int  $order  Lower numbers come first.
     */
    public function add(string $slug, string $title, string $view, int $order = 100): static
    {
        $this->docs[$slug] = new Doc($slug, $title, $view, $order);

        return $this;
    }

    /**
     * The docs, in order. Docs whose view doesn't exist are left out.
     *
     * @return list<Doc>
     */
    public function all(): array
    {
        $docs = array_filter($this->docs, fn (Doc $doc) => View::exists($doc->view));

        usort($docs, fn (Doc $a, Doc $b) => [$a->order, $a->title] <=> [$b->order, $b->title]);

        return $docs;
    }

    public function find(string $slug): ?Doc
    {
        $doc = $this->docs[$slug] ?? null;

        return $doc && View::exists($doc->view) ? $doc : null;
    }
}
