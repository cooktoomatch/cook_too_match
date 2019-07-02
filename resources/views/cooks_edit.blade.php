@extends('layouts.app')
@section('content')
<div class="card-body">
    <div class="card-title">
        <h2>料理の編集</h2>
    </div>
    @include('common.errors')
    <form action="{{ url('cooks/update') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="cook" class="control-label">料理名</label>
            <input type="text" name="name" value="{{$cook->name}}" class="form-control">
        </div>
        <div class="custom-file">
            <label for="image" class="control-label">サムネイル</label>
            <input type="file" class="custom-file-input" name="image">
        </div>
        <div class="form-group">
            <label for="number" class="control-label">説明文</label>
            <textarea name="description" class="form-control">{{$cook->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="price" class="control-label">料金</label>
            <input type="text" name="price" value="{{$cook->price}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="num" class="control-label">提供可能数</label>
            <input type="number" name="num" value="{{$cook->num}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="start_time" class="control-label">提供可能数</label>
            <input type="datetime" name="start_time" value="{{$cook->start_time}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_time" class="control-label">提供可能数</label>
            <input type="datetime" name="end_time" value="{{$cook->end_time}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="etc" class="control-label">備考</label>
            <textarea name="etc" class="form-control">{{$cook->etc}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">投稿</button>
        </div>
        <input type="hidden" name="id" value="{{$cook->id}}" />
        <a class="btn btn-link pull-right" href="{{ url('/cooks') }}">一覧へ</a>
    </form>
</div>
@endsection