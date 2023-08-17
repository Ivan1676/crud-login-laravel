<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Game;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cartItem = new Cart();
        $cartItem->user_id = auth()->user()->id;
        $cartItem->game_id = $request->game_id;
        $cartItem->cover = $request->cover;
        $cartItem->name = $request->name;
        $cartItem->price = $request->price;

        $cartItem->save();

        return redirect()->route('store')->with('success', 'Game added to cart.');
    }

    public function showCart()
    {
        $cartItems = Cart::all();
        return view('your.view.name', compact('cartItems'));
    }
}
