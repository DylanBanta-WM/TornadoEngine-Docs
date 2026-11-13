<?php

namespace TornadoEngine\Docs\Http;

use Illuminate\Routing\Controller;
use Illuminate\View\View;
use TornadoEngine\Docs\Docs;

class DocsController extends Controller
{
    public function index(Docs $docs): View
    {
        return view('docs::index', ['docs' => $docs->all()]);
    }

    public function show(Docs $docs, string $doc): View
    {
        return view('docs::show', ['doc' => $docs->find($doc) ?? abort(404)]);
    }
}
