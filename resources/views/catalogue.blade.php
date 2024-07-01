<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <style>
        :root {
            --main-bg-color: #1a1a1a;
            --card-bg-color: #1a1a1ad2;
            --main-font-color: #fefefe;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--main-bg-color);
            color: var(--main-font-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .catalogue {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            padding: 20px;
        }

        .product-card {
            background-color: var(--card-bg-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: auto;
            display: block;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #6A2895;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="catalogue">
        @foreach($products as $product)
        <div class="product-card">
            <img src="{{ public_path('images/' . $product->image) }}" alt="{{ $product->name }}">
            <h1>{{ $product->image }}</h1>
            <div class="product-info">
                <div class="product-title">{{ $product->name }}</div>
                <div class="product-description">{{ $product->description }}</div>
                <div class="product-price">$ {{ $product->price }}</div>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>
