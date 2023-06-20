<?php

use App\Http\Controllers\PersonalListController;
use Illuminate\Support\Facades\Route;

Route::controller(PersonalListController::class)
    ->middleware(['auth'])
    ->prefix('my-personallist/{user}')
    ->group(function(){
    Route::get('/movies', 'index')->name('my-personal-list.movie.index');
    Route::post('/movies', 'store')->name('my-personal-list.movie.store');
    Route::get('/movies/{movie}', 'edit')->name('my-personal-list.movie.edit');
    Route::put('/movies/{movie}', 'update')->name('my-persoanl-list.movie.update');
    Route::get('/movies/{movie}', 'show')->name('my-personal-list.movie.show');
    Route::delete('/movies/{movie}', 'delete')->name('my-personal-list.movie.delete');
});