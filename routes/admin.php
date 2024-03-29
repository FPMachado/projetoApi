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
    Route::post('/movies', 'searchMovie')->name('admin.movies.search');
    Route::put('/movies/update/{id}', 'update')->name('admin.movies.update');
    Route::delete('users/delete/{id}', 'destroyUser')->name('admin.users.delete');
    Route::get('/movies/report', 'reportMoviesIndex')->name('admin.movies.report.index');
    Route::post('/movies/report', 'reportMovies')->name('admin.movies.report');
    Route::get('/users/report', 'reportUserIndex')->name('admin.user.report.index');
    Route::post('/users/report', 'reportUser')->name('admin.users.report');
});