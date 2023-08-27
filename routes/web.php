<?php

use App\Models\Game;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\Trophy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StripeController;


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
    $newestGames = Game::orderBy('created_at', 'desc')->take(3)->get();
    if (auth()->check()) {
        return redirect()->route('home', ['games' => $games, 'newestGames' => $newestGames]);
    } else {
        return view('login/login');
    }
});

// User
Route::get('/store', function () {
    $games = Game::all();
    $cart = session()->get('cart');
    $cartItems = $cart->getItems();

    if (auth()->check()) {
        dd("Authenticated!");
        return view('store/store', [
            'games' => $games,
            'cartItems' => $cartItems,
        ]);
    } else {
        return view('store/login');
    }
})->middleware('auth')->name('store/store');

// Create game
Route::get('/create-game', function () {
    $developers = Developer::all();
    $publishers = Publisher::all();
    $trophies = Trophy::all();
    return view('store/create', ['developers' => $developers, 'publishers' => $publishers, 'trophies' => $trophies]);
})->middleware('auth')->name('store/login');

Route::view('/login', 'login/login')->name('login');
Route::view('/register', 'login/register')->name('register');
Route::view('/home', 'home/index')->middleware('auth')->name('home');
Route::view('/store', 'store/store')->middleware('auth')->name('store-view');
Route::view('/gallery', 'gallery/gallery')->middleware('auth')->name('gallery');
Route::view('/contact', 'contact/contact')->middleware('auth')->name('contact');


Route::post('/start-session', [LoginController::class, 'login'])->name('start-session');
Route::post('/validate-register', [LoginController::class, 'register'])->name('validate-register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot Password Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot-password');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset Password Routes
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/store', [GameController::class, 'index'])->middleware('auth')->name('store-view');
Route::get('/create', [GameController::class, 'create'])->name('create-game');
Route::post('/store', [GameController::class, 'store'])->name('store-game');
Route::get('/edit/{game}', [GameController::class, 'editView'])->name('edit-game');
Route::put('/edit/{game}', [GameController::class, 'update'])->name('confirm-edit-game');
Route::get('/delete/{game}', [GameController::class, 'deleteView'])->name('delete-game');
Route::delete('/delete/{game}', [GameController::class, 'delete'])->name('confirm-delete-game');

Route::get('/home', [GameController::class, 'showSliderAndGames'])->middleware('auth')->name('home');

//Cart
Route::view('checkout-view', 'stripe/checkout')->name('checkout-view');
Route::post('/cart/add', [CartController::class, "addToCart"])->name('cart-add');
Route::get('/checkout', [CartController::class, 'showStoreWithCart'])->middleware('auth')->name('cart-store');
Route::get('/checkout', [CartController::class, 'showCheckoutView'])->middleware('auth')->name('checkout');

//Stripe
Route::get('checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('session', [StripeController::class, 'session'])->name('session');
Route::get('success', [StripeController::class, 'success'])->name('success');

