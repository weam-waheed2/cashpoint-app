<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/iofrm-theme7.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('dashboard/images/logos/star.png') }}">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{ asset('auth/images/graphic3.svg') }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        @if(session()->has('error'))
                            <div class="alert alert-danger mx-3 text-center">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="page-links">
                            <a href="{{route('login')}}" class="active">Login</a><a href="{{route('register')}}">Register</a>
                        </div>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <input class="form-control" type="text" name="phone" placeholder="Phone Number" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button type="submit" class="ibtn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('auth/js/jquery.min.js') }}"></script>
<script src="{{ asset('auth/js/popper.min.js') }}"></script>
<script src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('auth/js/main.js') }}"></script>
</body>
</html>