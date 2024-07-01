<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        #form1 {
            display: grid;
            place-items: center;
            width: 100%;
            height: 410px !important;
            margin: 0;
        }

        #form-body {
            position: absolute;
            top: 40%;
            right: 25px;
            left: 25px;
            width: 300px;
            max-width: 350px;
            margin: -156px auto 0 auto;
        }

        #welcome-lines {
            text-align: center;
            line-height: 1;
        }

        #welcome-line-1 {
            color: #6A2895;
            font-weight: 600;
            font-size: 40px;
        }

        #welcome-line-2 {
            color: #ffffff;
            font-size: 18px;
            margin-top: 17px;
        }

        #input-area {
            margin-top: 40px;
        }

        .form-inp {
            padding: 11px 25px;
            background: #e3e3e3;
            border: 1px solid #e3e3e3;
            line-height: 1;
            border-radius: 8px;
        }

        .form-inp:focus {
            border: 1px solid #6A2895;
        }

        .form-inp:first-child {
            margin-bottom: 15px;
        }

        .form-inp input {
            width: 100%;
            background: none;
            font-size: 13.4px;
            color: rgb(255, 255, 255);
            border: none;
            padding: 0;
            margin: 0;
        }

        .form-inp input:focus {
            outline: none;
        }

        #submit-button-cvr {
            margin-top: 20px;
        }

        #submit-button-login {
            display: block;
            width: 100%;
            color: #6A2895;
            background-color: transparent;
            font-weight: 600;
            font-size: 14px;
            margin: 0;
            padding: 14px 13px 12px 13px;
            border: 0;
            outline: 1px solid #6A2895;
            border-radius: 8px;
            line-height: 1;
            cursor: pointer;
            transition: all ease-in-out .3s;
        }

        #submit-button-login:hover {
            transition: all ease-in-out .3s;
            background-color: #6A2895;
            color: #161616;
            cursor: pointer;
        }

        #forgot-pass {
            text-align: center;
            margin-top: 10px;
        }

        #forgot-pass a {
            color: #868686;
            font-size: 12px;
            text-decoration: none;
        }

        #bar {
            position: absolute;
            left: 50%;
            bottom: -50px;
            width: 28px;
            height: 8px;
            margin-left: -33px;
            background-color: #6A2895;
            border-radius: 10px;
        }

        #bar:before,
        #bar:after {
            content: "";
            position: absolute;
            width: 8px;
            height: 8px;
            background-color: #ececec;
            border-radius: 50%;
        }

        #bar:before {
            right: -20px;
        }

        #bar:after {
            right: -38px;
        }
    </style>
</head>
<body style="background-color: #161616">
    <div id="form-ui">
        <form method="POST" action="{{ route('login') }}" class="m-0 p-0" id="form1">
            @csrf
            <div id="form-body">
                <div id="welcome-lines">
                    <div id="welcome-line-1">Login</div>
                    <div id="welcome-line-2">Welcome Back!</div>
                </div>
                <div id="input-area">
                    <div class="form-inp">
                        <input placeholder="Email Address" type="email" class="form-control" id="emaillogin" name="email" required>
                    </div>
                    <div class="form-inp">
                        <input placeholder="Password" type="password" class="form-control" id="passwordlogin" name="password" required>
                    </div>
                </div>
                <div id="submit-button-cvr">
                    <button id="submit-button-login" type="submit" class="btn btn-primary">Login</button>
                </div>
                <div id="bar"></div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
