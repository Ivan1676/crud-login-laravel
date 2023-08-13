<?php

use App\Models\Game;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GameController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $games = Game::all();
    if (auth()->check()) {
        return redirect()->route('store', ['games' => $games]);
    } else {
        return view('login/login');
    }
});

Route::view('/login', 'login/login')->name('login');
Route::view('/register', 'login/register')->name('register');
Route::view('/store', 'store/store')->middleware('auth')->name('store');
Route::view('/gallery', 'gallery/gallery')->middleware('auth')->name('gallery');
Route::view('/contact', 'contact/contact')->middleware('auth')->name('contact');

Route::get('/store', [GameController::class, 'index'])->middleware('auth')->name('store');


Route::post('/start-session', [LoginController::class, 'login'])->name('start-session');
Route::post('/validate-register', [LoginController::class, 'register'])->name('validate-register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/create', [GameController::class, 'create'])->name('create-game');
Route::post('/store', [GameController::class, 'store'])->name('store-game');

Route::get('/edit/{game}', [GameController::class, 'editView'])->name('edit-game');
Route::put('/edit/{game}', [GameController::class, 'update'])->name('confirm-edit-game');

Route::get('/delete/{game}', [GameController::class, 'deleteView'])->name('delete-game');
Route::delete('/delete/{game}', [GameController::class, 'delete'])->name('confirm-delete-game');
