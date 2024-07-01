<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <style>

        .container {
            margin-top: 40px;
            margin-left: 40px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow-x: auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 15px;
            text-align: left;
        }

        .table th {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .table tbody tr:hover {
            background-color: rgba(78, 3, 78, 0.123);
        }

        .table img {
            height: auto;
            max-height: 100%;
            object-fit: cover;
            width: 100px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-primary, .btn-danger {
            padding: 12px 20px;
            margin-right: 8px;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary {
            background: linear-gradient(to right, #36d1dc, #5b86e5);
            border-color: #5b86e5;
            color: #ffffff;
            margin: 30px;
        }

        .btn-danger {
            background: linear-gradient(to right, #eb5757, #dc3545);
            border-color: #dc3545;
            color: #ffffff;
            margin: 30px;
        }

        .btn-primary:hover, .btn-danger:hover {
            filter: brightness(90%);
        }

        .container h2 {
            color: #5b86e5;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body>
    @extends('admin.admindash')


    @section('content')
        <div class="container mt-4">
            <h2 class="mb-4" style="color: #6A2895 !important;">All Products</h2>
            <div class="row row-cols-1 row-cols-auto g-4">
                <table class="table " border="1">
                    <thead>
                        <tr >
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr >
                            <td> <img src="{{ asset('images/' . $product->image) }}" class="card-img-top my-2" alt="{{ $product->name }}" style="object-fit: contain; height: 200px;"> </td>
                            <td > {{ $product->name }} </td>
                            <td style="width: 270px"> {{ $product->description }} </td>
                            <td> ${{ $product->price }} </td>
                            <td> {{ $categories[$product->category_id] }}</td>
                            <td style="width: 250px">
                                <a href="{{ route('edit', ['id' => $product->id]) }}" class="btn btn-primary d-inline px-4">Edit</a>
                                <form action="{{ route('destroy', ['id' => $product->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger px-4"">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection


</body>
</html>
