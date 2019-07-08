@extends('layouts.app')

@section('content')
<div class="profile-page sidebar-collapse">
    <h2 class="title">Post your delicious cook!</h2>
    <p class="category">あなたの手料理を投稿しよう！</p>
    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
        @include('common.errors')
        <form action="{{ url('cooks/store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group input-lg">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="料理名">
            </div>
            <div class="custom-file">
                <label for="image" class="control-label" placeholder="サムネイル"></label>
                <input id="image" type="file" class="custom-file-input" name="image" placeholder="サムネイル">
            </div>
            <div class="form-group input-lg">
                <textarea name="description" class="form-control" placeholder="料理の説明">{{ old('description') }}</textarea>
            </div>
            <div class="form-group input-lg">
                <input type="number" name="price" value="{{ old('price') }}" class="form-control" placeholder="料金">
            </div>
            <div class="form-group input-lg">
                <input type="number" name="num" value="{{ old('num') }}" class="form-control" placeholder="提供可能数">
            </div>
            <div class="form-group input-lg">
                <input type="date" name="start_time" value="{{ old('start_time') }}" class="form-control" placeholder="提供可能開始時間">
            </div>
            <div class="form-group input-lg">
                <input type="date" name="end_time" value="{{ old('end_time') }}" class="form-control" placeholder="提供可能終了時間">
            </div>
            <div class="form-group input-lg">
                <textarea name="etc" class="form-control" placeholder="備考">{{ old('etc') }}</textarea>
            </div>
            <div class="form-group input-lg">
                <button type="submit" class="btn btn-primary btn-round btn-block btn-lg submit_btn">投稿</button>
            </div>
        </form>
    </div>
            <textarea name="etc" class="form-control">{{ old('etc') }}</textarea>
</div>
@endsection

@section('style')
<style>
    .submit_btn {
        margin-top: 35px;
    }
</style>
@endsection