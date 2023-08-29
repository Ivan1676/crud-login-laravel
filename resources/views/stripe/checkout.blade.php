@include('layouts/body')
<x-header>
</x-header>

<head>
    <title>Checkout</title>
</head>

<section class="max-w-5xl mx-auto mb-10">
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-white">
            <thead class="text-xs text-white uppercase bg-black">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Cover
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subtotal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <!-- Additional Actions Column -->
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmount = 0;
                @endphp
                @foreach ($cartItems as $cartItem)
                    <tr class="bg-black border-b">
                        <td class="px-6 py-4">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ $cartItem->cover }}" class="aspect-video h-auto mx-auto" />
                            </div>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $cartItem->name }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ $cartItem->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cartItem->quantity }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ $cartItem->price * $cartItem->quantity }}
                        </td>
                        <td class="actions" data-th="">
                            <button type=""
                                class="relative w-full mt-5 inline-flex items-center justify-center p-0.5 mb-8 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-red-700 group-hover:from-red-500 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
                                <span
                                    class="relative w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    X
                                </span>
                            </button>
                        </td>
                    </tr>
                    @php
                        $totalAmount += $cartItem->price * $cartItem->quantity;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="5" class="text-right px-6 py-4">
                        <h3><strong>Total ${{ $totalAmount }}</strong></h3>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{ route('store-view') }}"
            class="relative mt-14 w-auto h-auto inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-600 to-red-700 group-hover:from-red-600 group-hover:to-red-700 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
            <span
                class="relative w-full h-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Continue Shopping
            </span>
        </a>
    </div>
</section>
<x-footer>
</x-footer>
