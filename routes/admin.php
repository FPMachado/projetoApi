<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)
    ->prefix('/admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){
    Route::get('', 'index')->name('admin.index');
    Route::get('/users', 'users')->name('admin.users');
});