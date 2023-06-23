<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)
    ->middleware(['auth'])
    ->group(function(){
    Route::get('/profile/{user}', "index")->name("profile.index");
});