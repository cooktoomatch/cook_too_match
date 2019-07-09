<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cook too match!</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://demos.creative-tim.com/now-ui-kit/assets/css/now-ui-kit.min.css?v=1.3.0" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="{{ asset('css/cooks_index.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Cook too match!</a>

            <div class="collapse navbar-collapse show" id="navbarsExample07">
                <ul class="navbar-nav mr-auto" style="margin: 0 0 0 auto !important;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('cooks/') }}"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('cooks/create') }}"><i class="fas fa-utensils"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('users/show/'.Auth::user()->id) }}"><i class="fas fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('conversations') }}"><i class="fas fa-envelope"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                                    document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown07">

                            <a class="dropdown-item" href="{{ url('cooks') }}">ホーム</a>
                            <a class="dropdown-item" href="{{ url('cooks/create') }}">料理を投稿</a>
                            <a class="dropdown-item" href="{{ url('users') }}">ユーザー一覧</a>
                            <a class="dropdown-item" href="{{ url('users/show/'.Auth::user()->id) }}">マイページ</a>
                            <a class="dropdown-item" href="{{ url('conversations') }}">メッセージ</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                                        document.getElementById('logout-form').submit();">
                                ログアウト
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
                <!-- <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form> -->
            </div>
        </div>
    </nav>
    @yield('main')
    <div class="container">
        @yield('content')
    </div>
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#"><i class="fas fa-chevron-up"></i></a>
            </p>
            <p>Copyright © 手料理たべたい All Rights Reserved.︎</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    @yield('script')

</body>

</html>