@extends('layouts.toppage')

@section('content')
<form class="form-signin" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} input-lg">
        <label for="email" class="sr-only">メールアドレス</label>
        <input id="email" type="email" class="form-control first" name="email" value="{{ old('email') }}" placeholder="メールアドレス" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} input-lg">
        <label for="password" class="sr-only">パスワード</label>
        <input id="password" type="password" class="form-control last" name="password" placeholder="パスワード" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="form-check-sign"></span>
            ログイン状態を記憶する
        </label>
    </div>
    <!-- <div class="form-check mb-3">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
        </label>
    </div> -->
    <button class="btn btn-lg btn-success btn-block" type="submit">
        ログイン
    </button>
    <a href="auth/login/facebook" class="btn btn-lg btn-primary btn-block" style="background: #3B5998; border-color: #3B5998 !important;">
        Facebookでログイン
    </a>
    <!-- <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #fff; margin-top: 20px;">
        パスワードを忘れてしまった方
    </a> -->
</form>
@endsection
