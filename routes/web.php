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

Route::any('/teste/search', [ApiController::class, 'search'])->name('teste.search');
Route::get('/teste', ApiController::class);

Route::get('/', function () {
    return view('welcome');
});
