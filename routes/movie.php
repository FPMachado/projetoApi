<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::controller(MovieController::class)
    ->group(function(){
    Route::get('/movies', 'index')->name('movie.index');
    Route::post('/movies', 'store')->name('movie.store');
    Route::get('/movies/{movie}', 'edit')->name('movie.edit');
    Route::put('/movies/{movie}', 'update')->name('movie.update');
    Route::get('/movies/{movie}', 'show')->name('movie.show');
    Route::delete('movies/{movie}', 'delete')->name('movie.delete');
});