<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<style>
    :root {
        --main-bg-color: #1a1a1a;
        --sidebar-bg-color: #1a1a1ad2;
        --main-font-color: #fefefe;
        --sidebar-font-color: #666;
        --filter-checkbox-color: #6A2895;
    }
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    display: flex;
    }

        .sidebar {
            background-color: var(--main-bg-color);
            color: var(--sidebar-font-color);
            height: 1500px;

            width: 25%;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .nav-link {
        color: var(--main-font-color);
        padding: 15px 20px;
        font-size: 16px;
        transition: background-color 0.3s;
        display: block;
        text-decoration: none;
        }

        .nav-link:hover {
            background-color: var(--filter-checkbox-color);
            color: var(--main-font-color);
        }
        form {
            display: inline-block;
        }

        
    button {
        font-size: 15px;
        padding: 0.8em 56px !important;
        margin: 40px 30%;
        letter-spacing: 0.06em;
        position: relative;
        font-family: inherit;
        border-radius: 0.6em;
        overflow: hidden;
        transition: all 0.3s;
        line-height: 1.4em;
        border: 2px solid var(--filter-checkbox-color);
        background: var(--main-bg-color);
        color: var(--filter-checkbox-color);
        box-shadow: inset 0 0 10px rgba(253, 27, 253, 0.4), 0 0 9px 3px rgba(183, 54, 223, 0.1);
    }

    button:hover {
    color: #c23bec;
    box-shadow: inset 0 0 10px rgba(182, 77, 224, 0.6), 0 0 9px 3px rgba(253, 27, 253, 0.4);
    }

    button:before {
    content: "";
    position: absolute;
    left: -4em;
    width: 4em;
    height: 100%;
    top: 0;
    transition: transform .4s ease-in-out;
    background: linear-gradient(to right, transparent 1%, rgba(253, 27, 253, 0.4) 40%,rgba(253, 27, 253, 0.4) 60% , transparent 100%);
    }

    button:hover:before {
    transform: translateX(15em);
    }

</style>
<div class="sidebar">
    <a class="nav-link" href="{{ route('admin.dashboard') }}" >
        Dashboard
    </a>
    <a class="nav-link mx-2" href="{{ route('products.create') }}">Add Products</a>
    <a class="nav-link mx-2" href="{{ route('showproducts') }}">All Products</a>
    <a class="nav-link" href="#">Analytics</a>
    <a class="nav-link" href="#">Sells</a>
    <form action="/logout" method="POST">
        @csrf
        <button class="nav-link  border border-1 shadow px-3 text-danger btn-logout">Logout</button>
    </form>
    
   
</div>


<main>

    @yield('content')
</main>

</body>
</html>