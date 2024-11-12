<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Email</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
    body {
        background-color: #001727;
    }

    .container {
        text-align: center;
        margin-top: 20vh;
    }

    .btn {
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }
</style>

<body class="antialiased">
    

    <!-- Authentication -->
    <div class="container">
    <h1 class="text-center mt-8 text-3xl font-bold text-white"><i>Welcome</i></h1>
        @if (Route::has('login'))
        <div class="">
            @auth
            <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-secondary ml-4">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
</body>

</html>
