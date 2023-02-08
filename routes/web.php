<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\FilmesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SobreMimController;
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

Route::get('/login', LoginController::class);
Route::get('/cadastro', [LoginController::class, 'cadastro'])->name('cadastro');

Route::get('/index', ApiController::class)->name('index');
Route::any('/index/search', [ApiController::class, 'search'])->name('index.search');
Route::get('/index/{id}', [ApiController::class, 'show'])->name('index.more');

Route::post('/index/store/{id}',[FilmesController::class, 'store'])->name('index.store');
Route::post('/index/excluir/{id}', [FilmesController::class, 'teste'])->name('excluir');

Route::get('/sobreMim', SobreMimController::class)->name('sobreMim');


Route::get('/', function () {
    return view('welcome');
});
