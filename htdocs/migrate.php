<?php
// Hanya untuk development/testing - hapus setelah migration selesai
require_once '../laravel_app/vendor/autoload.php';

$app = require_once '../laravel_app/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Jalankan migration
$kernel->call('migrate', ['--force' => true]);

echo "Migration completed!";