<?php

use App\Http\Middleware\adminmiddleware;
use App\Http\Middleware\pembelimiddleware;
use App\Http\Middleware\penjualmiddleware;
use App\Http\Middleware\Tamumiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => adminmiddleware::class,
            'penjual' => penjualmiddleware::class,
            'pembeli' => pembelimiddleware::class,
            'tamu' => Tamumiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
