<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://demos.creative-tim.com/now-ui-kit/assets/css/now-ui-kit.min.css?v=1.3.0" rel="stylesheet">
    <link href="{{ asset('css/toppage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Cook too match!</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link top" href="{{ url('/') }}">Top</a>
                    @auth
                    <a class="nav-link" href="{{ url('/cooks') }}">料理一覧</a>
                    <a class="nav-link" href="{{ url('/users/show/'.Auth::user()->id) }}">マイページ</a>
                    @else
                    <a class="nav-link login" href="{{ route('login') }}">Login</a>
                    <a class="nav-link register" href="{{ route('register') }}">Register</a>
                    @endauth
                </nav>
            </div>
        </header>

        @yield('content')

        <footer class="mastfoot mt-auto">
            <div class="inner">
            <p class="copy">Copyright © 手料理たべたい All Rights Reserved.︎</p>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/toppage.js') }}"></script>
    @yield('script')
</body>
</html>