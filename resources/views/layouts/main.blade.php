<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Test</title>
    <link rel="stylesheet" href="css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="/img/logo.png" alt="" height="50">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 @if(\Request::route()->getName() == 'home')link-secondary @else link-dark @endif">Home</a></li>
            <li><a href="{{route('songs')}}" class="nav-link px-2 @if(\Request::route()->getName() == 'songs')link-secondary @else link-dark @endif">Songs</a></li>
            <li><a href="#" class="nav-link px-2 @if(\Request::route()->getName() == 'chords')link-secondary @else link-dark @endif">Chords</a></li>
        </ul>

        <div class="col-md-3 text-end">
            @if(Auth::check())
                <p class="userInfo"><p class="userName">{{Auth::user()->name}} </p><a href="{{route('sign-out')}}" class="btn btn-primary">Sign Out</a></p>
            @else
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUpModal">
                    Sign-up
                </button>
            @endif
        </div>
    </header>
</div>

<div class="container main-block">
    @yield('content')
</div>

<div class="container">
    <footer class="py-3 my-4">
        <p class="text-center text-muted">© 2022 Company, Inc</p>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="js/index.js"></script>
</body>
</html>
