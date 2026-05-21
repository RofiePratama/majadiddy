<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'CD TEST BERHASIL';
});
require __DIR__.'/auth.php';
