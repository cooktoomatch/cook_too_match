@extends('layouts.app')
@section('content')
<div class="card-body">
    <div class="card-title">
        <h2>ユーザーの編集</h2>
    </div>
    @include('common.errors')
    <form action="{{ url('users/update') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="user" class="control-label">ユーザー名</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="user" class="control-label">メールアドレス</label>
            <input type="text" name="email" value="{{$user->email}}" class="form-control">
        </div>
        <div class="custom-file">
            <label for="icon" class="control-label">アイコン</label>
            <input type="file" class="custom-file-input" name="icon">
        </div>
        <div class="form-group">
            <label for="description" class="control-label">紹介文</label>
            <textarea name="description" class="form-control">{{$user->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="price" class="control-label">位置情報を登録</label>
            経度: <input type="number" name="longitude" value="{{$user->price}}" class="form-control">
            緯度: <input type="number" name="latitude" value="{{$user->price}}" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">投稿</button>
        </div>
        <input type="hidden" name="id" value="{{$user->id}}" />
        <a class="btn btn-link pull-right" href="{{ url('/users') }}">一覧へ</a>
    </form>
</div>
@endsection