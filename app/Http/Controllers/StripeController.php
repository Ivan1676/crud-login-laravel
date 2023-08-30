<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseConfirmation;
use Illuminate\Support\Str;
use App\Models\Game;

class StripeController extends Controller
{
    public function checkout()
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $cartItems = DB::table('carts')
            ->join('games', 'carts.game_id', '=', 'games.id')
            ->select('games.cover', 'games.name', 'games.price', 'carts.quantity')
            ->get();

        $lineItems = [];

        foreach ($cartItems as $cartItem) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'EUR',
                    'unit_amount' => $cartItem->price * 100, // Stripe uses cents, so multiply by 100
                    'product_data' => [
                        'name' => $cartItem->name,
                        'images' => [$cartItem->cover],
                    ],
                ],
                'quantity' => $cartItem->quantity,
            ];
        }

        if (empty($lineItems)) {
            return redirect()->route('store-view')->with('empty_cart', true);
        }

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'success_url' => route('success-stripe'),
            'cancel_url' => route('store-view'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        // Get the authenticated user's email
        $userEmail = auth()->user()->email;

        // Get the cart items
        $cartItems = DB::table('carts')
            ->join('games', 'carts.game_id', '=', 'games.id')
            ->select('games.id', 'games.name', 'games.price', 'carts.quantity')
            ->where('carts.user_id', auth()->user()->id)
            ->get()
            ->toArray();

        $gameKeys = [];
        foreach ($cartItems as $cartItem) {
            for ($i = 0; $i < $cartItem->quantity; $i++) {
                $gameKeys[] = Str::random(24);
            }
        }

        foreach ($cartItems as $cartItem) {
            $game = Game::find($cartItem->id);
            $game->increment('units_sold', $cartItem->quantity);
        }

        Mail::to($userEmail)->send(new PurchaseConfirmation($cartItems, $gameKeys));

        DB::table('carts')->where('user_id', auth()->user()->id)->delete(); // Remove my items from cart

        return view('stripe/success', ['gameKeys' => $gameKeys]);
    }
}
