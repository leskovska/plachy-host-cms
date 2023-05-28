<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Output\StreamOutput;

Route::get('after_deployment', function () {
    $stream = fopen("php://output", "w");
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call("migrate", ["--force" => true], new StreamOutput($stream));
    Artisan::call('storage:link', [], new StreamOutput($stream));
    var_dump($stream);
});
