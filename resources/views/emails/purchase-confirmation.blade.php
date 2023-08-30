@component('mail::message')
# Purchase Confirmation

Thank you for your purchase! Here are the details of your order:

@foreach ($cartItems as $index => $cartItem)
    - Name: {{ $cartItem->name }}
    - Price: {{ $cartItem->price }} EUR
    - Quantity: {{ $cartItem->quantity }}
    @for ($i = 0; $i < $cartItem->quantity; $i++)
        - Game Key: {{ $gameKeys[$index + $i] }}
    @endfor
@endforeach

Total: {{ collect($cartItems)->sum(function ($item) { return $item->price * $item->quantity; }) }} EUR

Thank you for shopping with us!
@endcomponent
