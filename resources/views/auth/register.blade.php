@extends('layouts.toppage')

@section('content')
<form class="form-signin" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} input-lg">
        <label for="name" class="sr-only">名前</label>
        <input id="name" type="text" class="form-control first" name="name" value="{{ old('name') }}" placeholder="名前" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} input-lg">
        <label for="email" class="sr-only">メールアドレス</label>
        <input id="email" type="email" class="form-control middle" name="email" value="{{ old('email') }}" placeholder="メールアドレス" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} input-lg">
        <label for="password" class="sr-only">パスワード</label>
        <input id="password" type="password" class="form-control middle" name="password" placeholder="パスワード" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group input-lg">
        <label for="password-confirm" class="sr-only">パスワード確認</label>
        <input id="password-confirm" type="password" class="form-control last" name="password_confirmation" placeholder="パスワード確認" required>
    </div>
    <button type="submit" class="btn btn-lg btn-success btn-block">
        新規登録
    </button>
</form>
@endsection