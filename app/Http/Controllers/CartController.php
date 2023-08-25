<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Game;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\Trophy;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $userId = auth()->user()->id;
        $gameId = $request->game_id;

        $existingCartItem = Cart::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->first();

        if ($existingCartItem) {
            // Game already exists, increase the quantity Gotta do some changes later
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {

            $cartItem = new Cart();
            $cartItem->user_id = auth()->user()->id;
            $cartItem->game_id = $request->game_id;
            $cartItem->cover = $request->cover;
            $cartItem->name = $request->name;
            $cartItem->price = $request->price;

            $cartItem->save();
        }

        return redirect()->route('store')->with('success', 'Game added to cart.');
    }

    public function showStoreWithCart()
    {
        $user = auth()->user();
        $cartItems = $user->cartItems;
        $games = Game::all();
        $developers = Developer::all();
        $publishers = Publisher::all();
        $trophies = Trophy::all();

        return view('store/store', compact('cartItems', 'games', 'user', 'developers', 'publishers', 'trophies'));
    }

}
