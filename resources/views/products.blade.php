<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        ::root{
            --font-color: #fefefe;
            --font-color-sub: #7e7e7e;
            --bg-color: #111;
            --main-color: #6A2895;
            --main-focus: #2d8cf0;
        }
         .wishlist-btn  {
                height: 35px !important;
                background: var(--bg-color);
                border: 0 !important;
                padding: 0 15px;
                transition: all 0.3s;
            }

            .wishlist-btn svg {
                width: 100%;
                height: 100%;
                fill: #8842b8;
                transition: all 0.3s;
            }

    </style>
</head>
<body>
    @extends('layout')

    @section('content')
        <section class="featured-products" style="background-color: #1a1a1a; color: #6A2895; padding: 40px 0;">
            <div class="container">
                <h2 style="font-size: 2.5rem; margin-bottom: 30px;">Products in {{ $category }}</h2>

                <div class="w-100 row row-cols-2 row-cols-md-3 px-5 row-cols-lg-4 g-3 d-flex justify-content-center align-items-center">
                    @foreach ($products as $product)
                    <div class="card mx-md-3 my-md-3">
                        <div class="card-img">
                            <img src="{{ asset('images/' . $product->image) }}" class="img" alt="{{ $product->name }}">
                        </div>
                        <div class="card-title">{{ $product->name }}</div>
                        <hr class="card-divider">
                        <div class="card-footer">
                            <div class="card-price"><span>$</span> {{ $product->price }}</div>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="card-btn buy-btn">
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m397.78 316h-205.13a15 15 0 0 1 -14.65-11.67l-34.54-150.48a15 15 0 0 1 14.62-18.36h274.27a15 15 0 0 1 14.65 18.36l-34.6 150.48a15 15 0 0 1 -14.62 11.67zm-193.19-30h181.25l27.67-120.48h-236.6z"></path>
                                        <path d="m222 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path>
                                        <path d="m368.42 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path>
                                        <path d="m158.08 165.49a15 15 0 0 1 -14.23-10.26l-25.71-77.23h-47.44a15 15 0 1 1 0-30h58.3a15 15 0 0 1 14.23 10.26l29.13 87.49a15 15 0 0 1 -14.23 19.74z"></path>
                                    </svg>
                                </button>
                            </form>
                            
                        </div>
                    </div>
                    @endforeach
        
                   

                <div class="pagination-links">
                    {{ $products->links('vendor\pagination\custom') }}
                </div>
            </div>
        </section>
    @endsection

    <style>
        .card {
            --font-color: #fefefe !important;
            --font-color-sub: #7e7e7e !important;
            --bg-color: #111 !important;
            --main-color: #6A2895 !important;
            --main-focus: #2d8cf0 !important;
            width: 230px;
            height: 300px;
            background: var(--bg-color) !important;
            border: 1px solid #69289569 !important;
            box-shadow: 3px 3px #69289569 !important;
            border-radius: 5px !important;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 20px !important;
            gap: 10px !important;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;
        }

        .card:last-child {
            justify-content: flex-end !important;
        }

        .card-img {
            transition: all 0.5s !important;
            display: flex !important;
            justify-content: center !important;
        }

        .card-img .img {
            transform: scale(1) !important;
            position: relative !important;
            box-sizing: border-box !important;
            width: 100px !important;
            height: 100px !important; 
        }

        .card-img .img::before {
            content: '' !important;
            position: absolute !important;
            width: 65px !important;
            height: 110px !important;
            margin-left: -32.5px !important;
            left: 50% !important;
            bottom: -4px !important;
            background-repeat: no-repeat !important;
            background-size: 60% 10%,100% 100%,100% 65%,100% 65%,100% 50% !important;
            background-position: center 3px,center bottom,center bottom,center bottom,center bottom !important;
            z-index: 2 !important;
        }

        .card-img .img::after {
            content: '' !important;
            position: absolute !important;
            box-sizing: border-box !important;
            width: 28px !important;
            height: 28px !important;
            margin-left: -14px !important;
            left: 50% !important;
            top: -13px !important;
            background-repeat: no-repeat !important;
            background-size: 100% 100%,100% 100%,100% 100%,100% 100%,100% 100%,100% 75%,100% 95%,100% 60% !important;
            background-position: center center !important;
            transform: rotate(45deg) !important;
            z-index: 1 !important;
        }

        .card-title {
            font-size: 20px !important;
            font-weight: 500 !important;
            text-align: center !important;
            color: var(--font-color) !important;
        }

        .card-subtitle {
            font-size: 14px !important;
            font-weight: 400 !important;
            color: var(--font-color-sub) !important;
        }

        .card-divider {
            width: 100% !important;
            border: 1px solid var(--main-color) !important;
            border-radius: 50px !important;
        }

        .card-footer {
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            align-items: center !important;
        }

        .card-price {
            font-size: 16px !important;
            font-weight: 500 !important;
            color: var(--font-color) !important;
        }

        .card-price span {
            font-size: 20px !important;
            font-weight: 500 !important;
            color: var(--font-color-sub) !important;
        }

        .card-btn {
            height: 35px !important;
            background: var(--bg-color) !important;
            border: 2px solid var(--main-color) !important;
            border-radius: 5px !important;
            padding: 0 15px !important;
            transition: all 0.3s !important;
        }

        .card-btn svg {
            width: 100% !important;
            height: 100% !important;
            fill: #8842b8 !important;
            transition: all 0.3s !important;
        }

        .card-img:hover {
            transform: translateY(-3px) !important;
        }

        .card-btn:hover {
            border: 2px solid #6A2895 !important;
        }

        .card-btn:hover svg {
            fill: #6A2895 !important;
        }

        .card-btn:active {
            transform: translateY(3px) !important;
        }

    </style>
    
</body>
</html>
