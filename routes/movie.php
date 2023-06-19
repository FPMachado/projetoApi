<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::controller(MovieController::class)
    ->prefix('/movies')
    ->group(function(){
    Route::get('', 'index')->name('movie.index');
    Route::post('', 'store')->name('movie.store');
    Route::post('','search')->name('movie.search');
    Route::get('/{movie}', 'edit')->name('movie.edit');
    Route::put('/{movie}', 'update')->name('movie.update');
    Route::get('/{movie}', 'show')->name('movie.show');
    Route::delete('/{movie}', 'delete')->name('movie.delete');
});