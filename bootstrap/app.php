<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

// Membuat instance aplikasi Laravel
$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__) // Menentukan path dasar aplikasi
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

// Mengikat antarmuka penting ke dalam kontainer
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class, // Antarmuka untuk kernel HTTP
    App\Http\Kernel::class // Kelas implementasi kernel HTTP
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class, // Antarmuka untuk kernel Console
    App\Console\Kernel::class // Kelas implementasi kernel Console
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class, // Antarmuka untuk penanganan exception
    App\Exceptions\Handler::class // Kelas implementasi penanganan exception
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

// Mengembalikan instance aplikasi
return $app;
