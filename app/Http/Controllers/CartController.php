<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Game;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\Trophy;
use Illuminate\Support\Facades\Auth;


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
        $user = auth()->user();
        $cart = $user->cart; // Retrieve the cart associated with the user

        if (!$cart) {
            return redirect()->route('store-view')->with('error', 'No games in cart.');
        }

        $cartItems = $cart->games; // Retrieve games associated with the cart
        $cartItemDetails = [];

        foreach ($cartItems as $cartItem) {
            $gameDetails = [
                'cover' => $cartItem->cover,
                'name' => $cartItem->name,
                'genre' => $cartItem->genre,
                'release_date' => $cartItem->release_date,
                'price' => $cartItem->price,
                'quantity' => $cartItem->pivot->quantity, // Access the quantity through the relationship
            ];

            $cartItemDetails[] = $gameDetails;
        }

        return view('stripe/checkout', compact('cartItemDetails'));
    }
}
