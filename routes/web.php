<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\SendEmailsController;
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

Route::get('/sobreMim', SobreMimController::class)->name('sobreMim');

Route::any('/index/search', [ApiController::class, 'search'])->name('index.search');

Route::get('/index/{id}', [ApiController::class, 'show'])->name('index.more');


//redirecionamento depois do login
Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/movie.php';
require __DIR__.'/personal-list.php';
require __DIR__.'/user.php';
require __DIR__.'/admin.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('envio-email', [SendEmailsController::class, 'handle']);

