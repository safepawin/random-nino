<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RandomController;
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

Route::get('/', function () {
    return view('welcome');
});

route::middleware('auth')->group(function () {
    Route::resource('guild', GuildController::class);
    Route::resource('member', MemberController::class);
    Route::get('random/transaction', [RandomController::class, 'getRandomTransaction'])->name('random.get-random-transaction');
    Route::post('random/random', [RandomController::class, 'random'])->name('random.random');
    Route::resource('random', RandomController::class);
    Route::resource('admin', AdminController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
