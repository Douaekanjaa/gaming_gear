<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Page with Filters</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        
        :root {
            --main-bg-color: #1a1a1a;
            --sidebar-bg-color: #1a1a1ad2;
            --main-font-color: #fefefe;
            --sidebar-font-color: #666;
            --filter-checkbox-color: #6A2895;

        }
        body {
            background-color: var(--main-bg-color);
            color: var(--main-font-color);
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: var(--main-bg-color) !important;
        }

        .sidebar {
            background-color: var(--sidebar-bg-color);
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .filter-heading {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--main-font-color);
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-card {
            background-color: var(--main-bg-color) !important;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1 1 300px;
            max-width: 300px;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
        }

        .product-title {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 14px;
            color: var(--filter-checkbox-color);
        }
    </style>
</head>
<body>
    @extends('layout') 

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">
                    <h2 class="filter-heading">Filters</h2>
                    <div class="filter-section">
                        <h3 class="filter-section-heading">Categories</h3>
                        <?php if($categories->count() > 0): ?>
                            <?php foreach($categories as $category): ?>
                                <div class="filter-item">
                                    <input type="checkbox" class="filter-checkbox" id="<?= strtolower($category->name) ?>-filter" data-category="<?= $category->id ?>">
                                    <label for="<?= strtolower($category->name) ?>-filter" class="filter-label"><?= $category->name ?></label>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No categories found</p>
                        <?php endif; ?>
                    </div>
                
                    <div class="filter-section">
                        <h3 class="filter-section-heading">Price Range</h3>
                        <div class="filter-item">
                            <label for="price-range" class="filter-label">Price Range:</label>
                            <select id="price-range" class="form-select">
                                <option value="">Any</option>
                                <option value="0-50">$0 - $50</option>
                                <option value="50-100">$50 - $100</option>
                                <option value="100-200">$100 - $200</option>
                                <option value="200-500">$200 - $500</option>
                                <option value="500+">Over $500</option>
                            </select>
                        </div>
                    </div>
                
                    <?php if($brands->count() > 0): ?>
                        <div class="filter-section">
                            <h3 class="filter-section-heading">Brands</h3>
                            <?php foreach($brands as $brand): ?>
                                <div class="filter-item">
                                    <input type="checkbox" class="filter-checkbox brand-checkbox" id="brand-<?= $brand->name ?>-filter" data-brand="<?= $brand->id ?>">
                                    <label for="brand-<?= $brand->name ?>-filter" class="filter-label"><?= $brand->name ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>No brands found</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="products">
                    <div class="w-100 row row-cols-2 row-cols-md-3 px-5 row-cols-lg-4 g-3 d-flex justify-content-center align-items-center">
                        <?php foreach ($products as $product): ?>
                            <div class="card mx-md-3 my-md-3 position-relative" style="height: 380px !important;" data-category="<?= $product->category_id ?>" data-price="<?= $product->price ?>" data-brand="<?= $product->brand_id ?>">
                                <form action="{{ route('wishlist.add') }}" method="POST" class="position-absolute top-0 end-0 m-2" style="border: 0 !important;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" >
                                    <button type="submit" class="card-btn wishlist-btn" style="border: 0 !important;">
                                        <svg style="border: 0 !important;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </button>
                                </form>
                                <div class="card-img">
                                    <a href="{{ route('show', ['id' => $product->id]) }}">
                                        <img src="{{ asset('images/' . $product->image) }}" class="img" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                
                                <div class="card-title">{{ $product->name }}</div>
                                <hr class="card-divider">
                                <div class="card-footer">
                                    <div class="card-price"><span>$</span> {{ $product->price }}</div>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="card-btn  btn-cart buy-btn">
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
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<style>
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

       
       .card {
       --font-color: #fefefe;
       --font-color-sub: #7e7e7e;
       --bg-color: #111;
       --main-color: #6A2895;
       --main-focus: #2d8cf0;
       width: 230px;
       height: 300px;
       background: var(--bg-color);
       border: 1px solid #69289569;
       box-shadow: 3px 3px #69289569;
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
       background-size: 60% 10%,100% 100%,100% 65%,100% 65%,100% 50%;
       background-position: center 3px,center bottom,center bottom,center bottom,center bottom;
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
       background-size: 100% 100%,100% 100%,100% 100%,100% 100%,100% 100%,100% 75%,100% 95%,100% 60%;
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

       .btn-cart:hover {
       background: var(--main-color);
       border: 2px solid var(--main-color);
       }

       .btn-cart svg {
       width: 20px;
       height: 20px;
       fill: var(--font-color);
       }

       .card-btn svg {
       width: 20px;
       height: 20px;
       fill: var(--font-color);
       }

       .position-relative {
       position: relative;
       }

       .top-0 {
       top: 0;
       }

       .end-0 {
       right: 0;
       }

       .m-2 {
       margin: 0.5rem !important;
       }
</style>

    <script>
            document.addEventListener("DOMContentLoaded", function() {
            const filterCheckboxes = document.querySelectorAll('.filter-checkbox');
            const priceRangeSelect = document.getElementById('price-range');

            const brandCheckboxes = document.querySelectorAll('.brand-checkbox');
            brandCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', applyFilter);
            });

            filterCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', applyFilter);
            });

            priceRangeSelect.addEventListener('change', applyFilter);

            function applyFilter() {
                const selectedCategories = Array.from(document.querySelectorAll('.filter-checkbox:checked')).map(function(checkbox) {
                    return checkbox.dataset.category;
                });

                const selectedPriceRange = priceRangeSelect.value;

                const selectedBrands = Array.from(document.querySelectorAll('.brand-checkbox:checked')).map(function(checkbox) {
                    return checkbox.dataset.brand;
                });

                const productCards = document.querySelectorAll('.card');
                productCards.forEach(function(card) {
                    const categoryMatch = selectedCategories.length === 0 || selectedCategories.includes(card.dataset.category);
                    const priceMatch = !selectedPriceRange || checkPriceRange(selectedPriceRange, card.dataset.price);
                    const brandMatch = selectedBrands.length === 0 || selectedBrands.includes(card.dataset.brand);
                    if (categoryMatch && priceMatch && brandMatch) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            function checkPriceRange(range, price) {
                if (range === '0-50') {
                    return price >= 0 && price <= 50;
                } else if (range === '50-100') {
                    return price > 50 && price <= 100;
                } else if (range === '100-200') {
                    return price > 100 && price <= 200;
                } else if (range === '200-500') {
                    return price > 200 && price <= 500;
                } else if (range === '500+') {
                    return price > 500;
                } else {
                    return true;
                }
            }
        });

    </script>

    @endsection
</body>
</html>
