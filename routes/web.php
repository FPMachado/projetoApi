<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\FilmesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonalListController;
use App\Http\Controllers\SendEmailsController;
use App\Http\Controllers\SobreMimController;
use App\Http\Controllers\SocialiteController;
use App\Mail\SendEmails;
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



Route::get('/index', ApiController::class)->name('index');

Route::any('/index/search', [ApiController::class, 'search'])->name('index.search');

Route::get('/index/{id}', [ApiController::class, 'show'])->name('index.more');

Route::post('/index/store/{id}',[FilmesController::class, 'store'])->name('index.store');
Route::post('/index/excluir/{id}', [FilmesController::class, 'teste'])->name('excluir');

Route::get('/sobreMim', SobreMimController::class)->name('sobreMim');

//redirecionamento depois do login
Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('envio-email', [SendEmailsController::class, 'handle']);

Route::get('my-personal-list/{id}', PersonalListController::class)->name('personal-list');

Route::post('my-personal-list/store/{id}', [PersonalListController::class, 'store'])->name('personal-list-store');
Route::get('my_personal_list/{id}/edit/movie/{list_id}', [PersonalListController::class, 'show'])->name('personal-list-edit');
Route::post('my_personal_list/{id}/update/movie/{personal_list_id}', [PersonalListController::class, 'update'])->name('personal-list-update');
