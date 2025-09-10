<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 * Modified for InfinityFree Hosting
 */

// Registrasi autoloader Composer
require_once __DIR__.'/vendor/autoload.php';

// Bootstrap aplikasi Laravel
$app = require_once __DIR__.'/bootstrap/app.php';

// Handle HTTP Request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);