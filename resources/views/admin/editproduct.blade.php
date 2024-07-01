<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Products</title>
    <style>
        .container {
            max-width: 600px;
            margin-left: 40px;
        }

        form {
            margin-top: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        span[style="color: red"] {
            display: block;
            margin-top: 5px;
            font-size: 14px;
        }

        .container {
            margin-top: 20px;
        }

    </style>
</head>
<body>

    @extends('admin.admindash')


    @section('content')
        <div class="container">
            <h2>Edit Product</h2>
            @include('incs.flash')
            <form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
                
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="productName" value="{{ $product->name }}">
                    @error('productName')
                        <span style="color: red">{{ $message }} *</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Product Description</label>
                    <textarea class="form-control" id="productDescription" name="productDescription" rows="3">{{ $product->description }}</textarea>
                    @error('productDescription')
                        <span style="color: red">{{ $message }} *</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Product Price</label>
                    <input type="text" class="form-control" id="productPrice" name="productPrice"  value="{{ $product->price }}">
                    @error('productPrice')
                        <span style="color: red">{{ $message }} *</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" >
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    @endsection




    <!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
