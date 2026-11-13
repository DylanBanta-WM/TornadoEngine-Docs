<?php

use Illuminate\Support\Facades\Route;
use TornadoEngine\Docs\Http\DocsController;

Route::middleware(['web', 'auth', 'admin'])
    ->prefix('administration/docs')
    ->name('administration.docs.')
    ->group(function () {
        Route::get('/', [DocsController::class, 'index'])->name('index');
        Route::get('/{doc}', [DocsController::class, 'show'])->name('show');
    });
