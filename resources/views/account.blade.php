<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My account</title>
    <style>
        :root {
            --main-bg-color: #1a1a1a;
            --sidebar-bg-color: #1a1a1ad2;
            --main-font-color: #fefefe;
            --sidebar-font-color: #666;
            --filter-checkbox-color: #6A2895;
        }

        .container {
            background-color: var(--main-bg-color) !important;
            color: var(--main-font-color) !important;
            padding: 20px;
            border-radius: 10px;
        }

        .card {
            background-color: var(--sidebar-bg-color) !important;
            color: var(--main-font-color) !important;
            border: 1px solid var(--filter-checkbox-color) !important;
            border-radius: 10px;
            margin-top: 20px;
        }

        .card-title {
            color: var(--filter-checkbox-color) !important;
        }

        .btn-primary {
            background-color: var(--filter-checkbox-color) !important;
            border-color: var(--filter-checkbox-color) !important;
        }

        .btn-primary:hover {
            background-color: #5d1f79 !important;
            border-color: #5d1f79 !important; 
        }
    </style>
</head>
<body>

@extends('layout')

@section('content')

    

<div class="container">
    <h1>Welcome to Your Account</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Your Information</h5>
            <form id="infoForm" method="POST" action="{{ route('account.update', ['user' => $user]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label> +212 634 56 78 98
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label> Tanger
                </div>
                <button id="editBtn" type="button" class="btn btn-primary">Modify Infos</button>
                <button id="submitBtn" type="submit" class="btn btn-primary" style="display: none;">Save Changes</button>
            </form>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('catalogue') }}" class="btn btn-primary">View Catalogue</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editBtn = document.getElementById('editBtn');
        const submitBtn = document.getElementById('submitBtn');
        const formInputs = document.querySelectorAll('#infoForm input:not([name="email"])');

        editBtn.addEventListener('click', function() {
            formInputs.forEach(input => {
                input.removeAttribute('readonly');
            });

            editBtn.style.display = 'none';
            submitBtn.style.display = 'block';
        });
    });
</script>
@endsection

</body>
</html>