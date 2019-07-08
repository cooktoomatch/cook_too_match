@extends('layouts.app')
@section('content')
<div class="profile-page sidebar-collapse">
    <h2 class="title">Edit</h2>
    <p class="category">投稿の編集</p>
    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
        @include('common.errors')
        <form action="{{ url('cooks/update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group input-lg">
                <input type="text" name="name" value="{{$cook->name}}" class="form-control" placeholder="料理名">
            </div>
            <div class="custom-file">
                <label for="image" class="control-label" placeholder="サムネイル"></label>
                <input id="image" type="file" class="custom-file-input" name="image" placeholder="サムネイル">
            </div>
            <div class="form-group input-lg">
                <textarea name="description" class="form-control" placeholder="料理の説明">{{$cook->description}}</textarea>
            </div>
            <div class="form-group input-lg">
                <input type="number" name="price" value="{{$cook->price}}" class="form-control" placeholder="料金">
            </div>
            <div class="form-group input-lg">
                <input type="number" name="num" value="{{$cook->num}}" class="form-control" placeholder="提供可能数">
            </div>
            <div class="form-group input-lg">
                <input type="date" name="start_time" value="{{$cook->start_time}}" class="form-control" placeholder="提供可能開始時間">
            </div>
            <div class="form-group input-lg">
                <input type="date" name="end_time" value="{{$cook->end_time}}" class="form-control" placeholder="提供可能終了時間">
            </div>
            <div class="form-group input-lg">
                <textarea name="etc" class="form-control" placeholder="備考">{{$cook->etc}}</textarea>
            </div>
            <div class="form-group input-lg">
                <button type="submit" class="btn btn-primary btn-round btn-block btn-lg submit_btn">更新</button>
            </div>
            <input type="hidden" name="id" value="{{$cook->id}}" />
        </form>
    </div>
</div>
@endsection

@section('style')
<style>
    .submit_btn {
        margin-top: 35px;
    }
</style>
@endsection