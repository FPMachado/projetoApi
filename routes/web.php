<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\FilmesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserPersonalListController;
use App\Http\Controllers\SendEmailsController;
use App\Http\Controllers\SobreMimController;
use App\Http\Controllers\SocialiteController;
use App\Mail\SendEmails;
use App\Models\PersonalList;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('/sobreMim', SobreMimController::class)->name('sobreMim');

Route::any('/index/search', [ApiController::class, 'search'])->name('index.search');

Route::get('/index/{id}', [ApiController::class, 'show'])->name('index.more');

// Route::post('/index/store/{id}',[FilmesController::class, 'store'])->name('index.store');
// Route::post('/index/excluir/{id}', [FilmesController::class, 'teste'])->name('excluir');


//redirecionamento depois do login
Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/movie.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('envio-email', [SendEmailsController::class, 'handle']);

Route::get('my-personal-list/{id}', UserPersonalListController::class)->name('personal-list');

Route::post('my-personal-list/store/{id}', [UserPersonalListController::class, 'store'])->name('personal-list-store');
Route::get('my_personal_list/{id}/edit/movie/{list_id}', [UserPersonalListController::class, 'show'])->name('personal-list-edit');
Route::put('my_personal_list/{id}/update/movie/{personal_list_id}', [UserPersonalListController::class, 'update'])->name('personal-list-update');
Route::delete('my_personal_list/{id}/delete/movie/{personal_list_id}', [UserPersonalListController::class, 'destroy'])->name('personal-list-destroy');
