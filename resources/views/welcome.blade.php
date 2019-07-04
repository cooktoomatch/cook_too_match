<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Cook too match!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
            <h3 class="masthead-brand">Cook too match!</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="#">Home</a>
                @auth
                <a class="nav-link" href="{{ url('/cooks') }}">料理一覧</a>
                <a class="nav-link" href="{{ url('/users/show/'.Auth::user()->id) }}">マイページ</a>
                @else
                <a class="nav-link" href="{{ route('login') }}">Login</a>
                <a class="nav-link" href="{{ route('register') }}">Register</a>
                @endauth
            </nav>
            </div>
        </header>
        <main role="main" class="inner cover">
            <h1 class="cover-heading">Cook too match!</h1>
            <p class="lead">食を通じてご近所さんと交流できるサービス<p>
            <p class="lead">
                <a href="#" class="btn btn-lg btn-secondary">Let's Try!</a>
            </p>
        </main>
        <footer class="mastfoot mt-auto">
            <div class="inner">
            <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
        </footer>
    </div>
</body>
</html>


