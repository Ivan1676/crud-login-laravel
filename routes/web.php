<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
    return view('login/login');
});

Route::view('/login', 'login/login')->name('login');
Route::view('/registro', 'login/register')->name('registro');
Route::view('/tienda', 'store/store')->name('tienda');

Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('iniciar-sesion');
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::get('/cerrar-sesion', [LoginController::class, 'logout'])->name('cerrar-sesion');

