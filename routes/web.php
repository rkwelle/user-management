<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Route::redirect('/', '/users', 302); // Or 301 for permanent redirect

Route::get('/', function () {
    return redirect()->route('users.index', [], 301);
});

Route::resource('users', UserController::class);
