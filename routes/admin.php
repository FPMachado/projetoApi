<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)
    ->prefix('/admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){
    Route::get('', 'index')->name('admin.index');
    Route::get('/users', 'users')->name('admin.users');
    Route::post('/users','searchUser')->name('admin.users.search');
    Route::get('/movies', 'movies')->name('admin.movies');
    Route::put('/movies/update/{id}', 'update')->name('admin.movies.update');
    Route::delete('users/delete/{id}', 'destroyUser')->name('admin.users.delete');
});