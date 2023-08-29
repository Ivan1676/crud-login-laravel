<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class='row'>
            <h1>Checkout</h1>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                        Checkout
                    </div>
                    <div class="card-body">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <th style="width:22%" class="text-center">Subtotal</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartItem)
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs">
                                                    <img src="{{ $cartItem->cover }}" width="100" height="100"
                                                        class="img-responsive" />
                                                </div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin">{{ $cartItem->name }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">${{ $cartItem->price }}</td>
                                        <td data-th="Quantity">
                                            <input type="number" value="{{ $cartItem->quantity }}"
                                                class="form-control quantity cart_update" min="1" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center">
                                            ${{ $cartItem->price * $cartItem->quantity }}
                                        </td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-danger btn-sm cart_remove"><i
                                                    class="fa fa-trash-o"></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align:right;">
                                        <h3><strong>Total $</strong></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:right;">
                                        <a href="{{ url('/') }}" class="btn btn-danger">
                                            <i class="fa fa-arrow-left"></i> Continue Shopping
                                        </a>
                                        <form action="/session" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type='hidden' name="total" value="">
                                            <!-- You can add more hidden fields for other data -->
                                            <button class="btn btn-success" type="submit" id="checkout-live-button"><i
                                                    class="fa fa-money"></i> Checkout</button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer>
    </x-footer>
</body>
</html>
