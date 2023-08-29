<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Game;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\Trophy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $userId = Auth::id();
        $gameId = $request->game_id;

        $existingCartItem = Cart::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->first();

        if ($existingCartItem) {
            // Game already exists in the cart, increase the quantity
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {
            // Create a new cart item
            $cartItem = new Cart([
                'user_id' => $userId,
                'game_id' => $gameId,
                'quantity' => 1,
                'cover' => $request->cover,
                'name' => $request->name,
                'price' => $request->price,
            ]);

            $cartItem->save();
        }

        return redirect()->route('store-view')->with('success', 'Game added to cart.');
    }

    public function showCheckoutView()
    {
        $cartItems = DB::table('carts')
                ->join('games', 'carts.game_id', '=', 'games.id')
                ->select('games.cover', 'games.name', 'games.price', 'carts.quantity')
                ->get();

        return view('stripe/checkout', [
            'cartItems' => $cartItems
        ]);
    }
}
