<?php

use Illuminate\Support\Facades\Route;
use TornadoEngine\Docs\Http\DocsController;

Route::middleware(['web', 'auth', 'can:docs.view'])
    ->prefix('docs')
    ->name('docs.')
    ->group(function () {
        Route::get('/', [DocsController::class, 'index'])->name('index');
        Route::get('/{doc}', [DocsController::class, 'show'])->name('show');
    });
