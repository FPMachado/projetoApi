<?php

use App\Http\Controllers\ApiController;
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

Route::any('/index/search', [ApiController::class, 'search'])->name('index.search');
Route::get('/index', ApiController::class)->name('index');
Route::get('/index/{id}', [ApiController::class, 'show'])->name('index.more');

Route::get('/', function () {
    return view('welcome');
});
