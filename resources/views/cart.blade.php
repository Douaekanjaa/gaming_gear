<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layout')

@section('title', 'Shopping Cart')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Shopping Cart</h1>

    @if($cartItems->isEmpty())
    <div class="alert " style="background-color: #692895da" role="alert">
        Your shopping cart is empty.
    </div>
    @else
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4" style="background-color: #111 !important; color: #fff !important;">
                <div class="card-body">
                    @foreach($cartItems as $item)
                    <div class="row mb-3">
                        <div class="col-md-3">
                            @php
                                $imageName = $item->name . '.png';
                            @endphp
                            <img src="{{ asset('images/' . $imageName) }}" alt="{{ $item->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">Price: ${{ $item->price }}</p>
                            
                            <form action="{{ route('cart.update', $item->rowId) }}" method="POST" class="update-form mt-2">
                                @csrf
                                @method('POST') <!-- Add this line to specify the HTTP method -->
                                <div class="input-group">
                                    <input type="number" name="quantity" value="{{ $item->qty }}" min="1" class="form-control form-control-sm  quantity" data-price="{{ $item->price }}" data-rowId="{{ $item->rowId }}" style="background-color: #333; color: #fff; border-color: #6A2895; width: 60px !important;">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button> <!-- Add update button -->
                                </div>
                            </form>
                            <form action="{{ route('cart.remove', $item->rowId) }}" class="mt-3" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                            <p class="mt-2">Total: $<span class="total">{{ $item->price * $item->qty }}</span></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4" style="background-color: #111 !important; color: #fff !important;">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <hr style="background-color: #6A2895 !important;">
                    <p>Total Items: <span id="totalItems">{{ Cart::count() }}</span></p>
                    <p>Subtotal: $<span id="subtotal">{{ Cart::subtotal() }}</span></p>
                    
                    <p class="fw-bold">Total: $<span id="total">{{ Cart::subtotal() }}</span></p>

                    <form action="{{route('checkout')}}" method="POST">
                        @csrf
                        <button class="btn  btn-block" style="background-color: #9544cc !important;">Proceed to Checkout</button>
                    </form>

                    </div>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    document.querySelectorAll('.quantity').forEach(function(input) {
        input.addEventListener('change', function() {
            var quantity = this.value;
            var price = this.dataset.price;
            var total = parseFloat(quantity) * parseFloat(price);
            var totalElement = this.closest('.row').querySelector('.total');
            totalElement.textContent = total.toFixed(2);

            updateOrderSummary();
        });
    });

    function updateOrderSummary() {
        var subtotal = 0;
        document.querySelectorAll('.total').forEach(function(itemTotal) {
            subtotal += parseFloat(itemTotal.textContent);
        });

        var totalItems = document.querySelectorAll('.quantity').length;
        document.getElementById('totalItems').textContent = totalItems;
        document.getElementById('subtotal').textContent = subtotal.toFixed(2);
        document.getElementById('total').textContent = subtotal.toFixed(2);
    }
</script>
@endsection

</body>
</html>