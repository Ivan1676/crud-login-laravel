@component('mail::message')
# Purchase Confirmation

Thank you for your purchase! Here are the details of your order:

@foreach ($cartItems as $cartItem)
- Name: {{ $cartItem->name }}
- Price: {{ $cartItem->price }} EUR
- Quantity: {{ $cartItem->quantity }}
@endforeach

Total: {{ $cartItems->sum('price') * 100 }} EUR

Thank you for shopping with us!

@endcomponent
