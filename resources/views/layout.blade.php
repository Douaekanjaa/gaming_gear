<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="css/style1.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        body {
            margin: 0px;
        }
        .btn2 {
            font-size: 15px !important;
            padding: 0.7em 0.5em  !important;
            letter-spacing: 0.06em !important;
            position: relative !important;
            font-family: inherit !important;
            border-radius: 0.6em !important;
            overflow: hidden !important;
            transition: all 0.3s !important;
            line-height: 1.4em !important;
            border: 1px solid var(--filter-checkbox-color) !important;
            background: var(--main-bg-color) !important;
            color: var(--filter-checkbox-color) !important;
            box-shadow: inset 0 0 7px rgba(253, 27, 253, 0.4), 0 0 1px 3px rgba(183, 54, 223, 0.1) !important;
        }

        .btn2:hover {
        color: #c23bec !important;
        box-shadow: inset 0 0 10px rgba(182, 77, 224, 0.6), 0 0 1px 3px rgba(253, 27, 253, 0.4) !important;
        }

        .btn2:before {
        content: "" !important;
        position: absolute !important;
        left: -4em !important;
        width: 4em !important;
        height: 100% !important;
        top: 0 !important;
        transition: transform .4s ease-in-out !important;
        background: linear-gradient(to right, transparent 1%, rgba(253, 27, 253, 0.4) 40%,rgba(253, 27, 253, 0.4) 60% , transparent 100%) !important;
        }

        .btn2:hover:before {
        transform: translateX(15em) !important;
        }
    </style>
</head>
<body>
    
    <header style="background-color: #1a1a1a !important;margin: 0 !important;padding: 0 !important; margin: 0 !important; position: sticky !important; top: 0 !important;">
        <nav class="navbar navbar-expand-lg" style="margin: 20px 0px !important;color: #fff !important;" style="background-color: #1a1a1a !important;">
            <div class="container-fluid" style="margin: 0 !important; ">
                <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" style="width: 110px;height: 72px;margin-left: 50px;" id="logo" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="{{ route('shop.index') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="#brands">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="#deals">Deals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="{{ route('about') }}">About Us</a>
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
                                <a class="nav-link mx-2" href="/wishlist">My Wishlist</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('account') }}">Account</a>
                            </li>

                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="nav-link btn2  px-4" style=" border: 1px solid var(--filter-checkbox-color) !important;">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <button type="button" class="nav-link btn2 px-4" data-bs-toggle="modal" data-bs-target="#loginModal" >Login</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link btn2  px-4" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
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
    

    <main>

      @yield('content')

      
    </main>
    <hr style="color: rgba(128, 0, 128, 0.808);">
    <footer>
        <div class="container">
            <div class="quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="contact-info">
                <h3>Contact Us</h3>
                <p>Email: info@gamingstore.com</p>
                <p>Phone: +1 (555) 123-4567</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
    </body>
</html>
