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

@section('content')
<section class="wish" style="background-color: #1a1a1a !important;">
    <h2>Wishlist</h2>
    <div class="w-100 row row-cols-2 row-cols-md-3 px-5 row-cols-lg-4 g-3 d-flex justify-content-center align-items-center" style="background-color: #1a1a1a !important;">
        @foreach ($wishlistItems as $item)
        <div class="card mx-md-3 my-md-3 position-relative">
            <form action="{{ route('wishlist.remove', $item->id) }}" method="POST" class="position-absolute top-0 end-0 m-2" style="background-color: #1a1a1a !important;">
                @csrf
                @method('DELETE')
                <button type="submit" class="card-btn wishlist-btn" style="border: 0 !important;">
                    <svg style="border: 0 !important;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                </button>
            </form>
            <div class="card-img">
                <img src="{{ asset('images/' . $item->image) }}" class="img" alt="{{ $item->name }}">
            </div>
            <div class="card-title">{{ $item->name }}</div>
            <hr class="card-divider">
            <div class="card-footer">
                <div class="card-price"><span>$</span> {{ $item->price }}</div>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button type="submit" class="card-btn btn-cart buy-btn">
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

    </div>
</section>

@endsection

<style>
    .wish {
        text-align: center;
        padding: 80px 0;
        background-color: #1a1a1a !important;
        color: #fff;
    
    }
    
    .wishlist-btn {
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

    .card {
            --bg-color: #1a1a1a;
            --main-color: #6A2895;
            --main-focus: #2d8cf0;
            width: 230px;
            height: 300px;
            background: var(--bg-color) !important;
            color: white !important;
            border: 1px solid #69289569 !important;
            box-shadow: 3px 3px #69289569 !important;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 20px;
            gap: 10px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }

    .card:last-child {
        justify-content: flex-end;
    }

    .card-img {
        transition: all 0.5s;
        display: flex;
        justify-content: center;
    }

    .card-img .img {
        transform: scale(1);
        position: relative;
        box-sizing: border-box;
        width: 100px;
        height: 100px;
    }

    .card-img .img::before {
        content: '';
        position: absolute;
        width: 65px;
        height: 110px;
        margin-left: -32.5px;
        left: 50%;
        bottom: -4px;
        background-repeat: no-repeat;
        background-size: 60% 10%, 100% 100%, 100% 65%, 100% 65%, 100% 50%;
        background-position: center 3px, center bottom, center bottom, center bottom, center bottom;
        z-index: 2;
    }

    .card-img .img::after {
        content: '';
        position: absolute;
        box-sizing: border-box;
        width: 28px;
        height: 28px;
        margin-left: -14px;
        left: 50%;
        top: -13px;
        background-repeat: no-repeat;
        background-size: 100% 100%, 100% 100%, 100% 100%, 100% 100%, 100% 100%, 100% 75%, 100% 95%, 100% 60%;
        background-position: center center;
        transform: rotate(45deg);
        z-index: 1;
    }

    .card-title {
        font-size: 20px;
        font-weight: 500;
        text-align: center;
        color: var(--font-color);
    }

    .card-subtitle {
        font-size: 14px;
        font-weight: 400;
        color: var(--font-color-sub);
    }

    .card-divider {
        width: 100%;
        border: 1px solid var(--main-color);
        border-radius: 50px;
    }

    .card-footer {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .card-price {
        font-size: 16px !important;
        font-weight: 500;
        color: var(--font-color);
    }

    .card-price span {
        font-size: 20px;
        font-weight: 500;
        color: var(--font-color-sub);
    }

    .btn-cart {
        height: 35px;
        background: var(--bg-color);
        border: 2px solid var(--main-color);
        border-radius: 5px;
        padding: 0 15px;
        transition: all 0.3s;
    }

    .card-btn svg {
        width: 100%;
        height: 100%;
        fill: #8842b8;
        transition: all 0.3s;
    }

    .card-img:hover {
        transform: translateY(-3px);
    }

    .card-btn:hover {
        border: 2px solid #6A2895 !important;
    }

    .card-btn:hover svg {
        fill: #6A2895;
    }

    .card-btn:active {
        transform: translateY(3px);
    }
</style>


</body>
</html>