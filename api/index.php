<?php

// File entry point untuk Vercel serverless function
// Pastikan path ke Laravel bootstrap/app.php benar

// Set current working directory ke root Laravel
chdir(dirname(__DIR__));

// Load Composer autoloader
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} else {
    die('Composer autoload file not found. Run "composer install" first.');
}

// Load Laravel application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Handle the request through Laravel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);