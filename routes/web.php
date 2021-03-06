<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\GameSortController;
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



Route::get('/', function() {
    return view('home');
})->name('home');

Route::resource('/games', GamesController::class);

Route::get('games/sort/{id}', [GameSortController::class, 'sort'])->name('sort');
