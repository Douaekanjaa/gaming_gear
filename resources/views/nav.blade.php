<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        nav {
            background-color: rgba(43, 17, 43, 0.388) !important; 
            color: #fff !important;
        }

        header {
            padding: 1rem 0;
            background-color: #1a1a1a;
            color: white;
            width: 100%;
            z-index: 1000;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            color: #fff !important;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
            color: #fff !important;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-size: 1.2rem;
            transition: color 0.3s ease;
            color: #fff !important;
        }

        nav a:hover {
            color: #3498db;
        }

        .modal-dialog {
            margin: 100px auto;
        }

        .modal-content {
            background-color: #161616;
            color: white;
            border: 2px solid #6A2895;
            border-radius: 50px !important;
            box-shadow: 0px 15px 60px #6A2895;
        }
        .card-btn2 {
            height: 35px;
            background: transparent;
            border: 2px solid var(--main-color);
            border-radius: 5px;
            padding: 0 15px;
            transition: all 0.3s;
        }
            .card-btn2 svg {
            width: 100%;
            height: 100%;
            fill: #8842b8;
            transition: all 0.3s;
        }
         
            .card-btn2:hover svg {
            fill: #6A2895;
        }
            .card-btn2:active {
            transform: translateY(3px);
        }
    </style>
</head>
<body>
    <div>
        <div style="background-color: rgba(43, 17, 43, 0.388) !important; color:white !important; border-bottom: 1px solid rgb(48, 21, 52); margin-bottom: 50px;">
            <nav class="navbar navbar-expand-lg" style="color: #fff !important;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" style="width: 110px;height: 72px;margin-left: 50px;" id="logo" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#shop">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#brands">Brands</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#deals">Deals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#about">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <button class="card-btn2">
                                    <a href="/cart">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="border-0"><path d="m397.78 316h-205.13a15 15 0 0 1 -14.65-11.67l-34.54-150.48a15 15 0 0 1 14.62-18.36h274.27a15 15 0 0 1 14.65 18.36l-34.6 150.48a15 15 0 0 1 -14.62 11.67zm-193.19-30h181.25l27.67-120.48h-236.6z"></path><path d="m222 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m368.42 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m158.08 165.49a15 15 0 0 1 -14.23-10.26l-25.71-77.23h-47.44a15 15 0 1 1 0-30h58.3a15 15 0 0 1 14.23 10.26l29.13 87.49a15 15 0 0 1 -14.23 19.74z"></path></svg>
                                    </a>
                                </button>
                            </li>
                            @auth
                                <li class="nav-item">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button class="nav-link btn btn-light border border-1 shadow px-3 text-danger">Logout</button>
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                    <button type="button" class="nav-link btn btn-light border border-1 shadow px-3 text-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link btn btn-light border border-1 shadow me-5 ms-3 px-3 text-danger" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1a1a1a; color: white;">
                        <button type="button" style="background-color: #ffffff; color: white;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: #1a1a1a; color: white;">
                        @include('auth.login')
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1a1a1a; color: white;">
                        <h5 class="modal-title" id="registerModalLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: #1a1a1a; color: white;">
                        @include('auth.register')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
