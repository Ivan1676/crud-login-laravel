<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Game;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $userId = auth()->user()->id;
        $gameId = $request->input('game_id');


        $existingCartItem = Cart::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->first();

        if ($existingCartItem) {

            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + 1,
            ]);
        } else {

            Cart::create([
                'user_id' => $userId,
                'game_id' => $gameId,
                'quantity' => 1,
            ]);
        }

        return response()->json(['message' => 'Item added to cart']);
    }

    public function showCart()
    {
        $userId = auth()->user()->id;
        $cartItems = Cart::with('game')->where('user_id', $userId)->get();

        return view('cart.show', compact('cartItems'));
    }
}
