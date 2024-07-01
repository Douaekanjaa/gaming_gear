<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>
    <!-- Include necessary stylesheets -->
    <link rel="stylesheet" href="/css/Style.css">
    <link rel="stylesheet" href="/css/style1.css">
    
    <style>
        .main-image {
            width: 700px !important;
            background-color: white !important;
            padding: 20px;
            height: 390px !important;
            border-radius: 5px;
            border: none !important;
        }

        .img-thumbnail {
            max-width: 100% !important;
            height: auto !important ;
            margin-bottom: 10px;
            border: none !important; 
        }

        .img-thumbnail:hover {
            transform: scale(1.1); 
        }

        .number-control {
            display: flex;
            align-items: center;
        }

        .number-left::before,
        .number-right::after {
            content: attr(data-content);
            background-color: #6a1b9a;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            width: 20px;
            height: 40px;
            padding: 0px 23px;
            color: white;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .number-left::before {
            content: "-";
        }

        .number-right::after {
            content: "+";
        }

        .number-quantity {
            border: 2px solid #9b59b6;
            width: 74px;
            height: 40px;
            text-align: center;
            font-size: 16px;
            transition: border-color 0.2s ease;
        }

        .number-quantity:focus {
            outline: none;
            border-color: #9b59b6;
        }

        .number-left:hover::before,
        .number-right:hover::after {
            background-color: #6a1b9a;
        }

        .product-title {
            font-size: 2rem;
            color:rgb(125, 37, 197) ;
            text-transform: uppercase;
            text-shadow: 2px 2px 3px #1f063e;
        }

    </style>
</head>
<body>
    @extends('layout')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-images border-0">
                        @if($images->isNotEmpty())
                            <img src="{{ asset('images/' . $product->image) }}" id="main-image" class="img-fluid main-image" alt="Product Image">
                            <div class="row mt-3  border-0">
                                <div class="col-md-3  border-0">
                                    <img src="{{ asset('images/' . $product->image) }}" class="img-thumbnail  border-0" alt="Product Thumbnail" onclick="changeImage('{{ asset('images/' . $product->image) }}')">
                                </div>
                                @foreach($images as $image)
                                    <div class="col-md-3  border-0">
                                        <img src="{{ asset('product_images/' . $image->image_filename) }}" class="img-thumbnail  border-0" alt="Product Thumbnail" onclick="changeImage('{{ asset('product_images/' . $image->image_filename) }}')">
                                    </div>  
                                @endforeach
                            </div>
                        @else
                            <p>No images available for this product.</p>
                        @endif
                    </div>                
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <h2 class="product-title">{{ $product->name }}</h2>
                        <p class="product-description">{{ $product->description }}</p>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <div class="form-group number-control">
                                <div class="number-left" data-content="-" onclick="changeQuantity(-1)"></div>
                                <input type="number" name="quantity" class="number-quantity" value="1" min="1">
                                <div class="number-right" data-content="+" onclick="changeQuantity(1)"></div>
                            </div>
                            <p class="product-price">${{ $product->price }}</p>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <!-- Include necessary scripts -->
    <script>
        function changeImage(imageUrl) {
            document.getElementById('main-image').src = imageUrl;
        }

        function changeQuantity(change) {
            var input = document.querySelector('.number-quantity');
            var value = parseInt(input.value) || 1;
            value += change;
            if (value < 1) value = 1;
            input.value = value;
        }
    </script>
</body>
</html>
