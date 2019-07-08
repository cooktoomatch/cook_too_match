@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="card-title">
        <h2>料理の新規登録</h2>
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
                <p>提供可能開始時間</p>
                <select name="start_year" class="start-year">
                </select>
                <select name="start_month" class="start-month">
                </select>
                <select name="start_day" class="start-day">
                </select>
                <select name="start_hour" class="start-hour">
                </select>
                <select name="start_minute" class="start-minute">
                </select>
            </div>
            <div class="form-group input-lg">
                <p>提供可能終了時間</p>
                <select name="end_year" class="end-year">
                </select>
                <select name="end_month" class="end-month">
                </select>
                <select name="end_day" class="end-day">
                </select>
                <select name="end_hour" class="end-hour">
                </select>
                <select name="end_minute" class="end-minute">
                </select>
            </div>
            <div class="form-group input-lg">
                <textarea name="etc" class="form-control" placeholder="備考">{{ old('etc') }}</textarea>
            </div>
            <div class="form-group input-lg">
                <button type="submit" class="btn btn-primary btn-round btn-block btn-lg submit_btn">投稿</button>
            </div>
        </form>
    </div>
<<<<<<< HEAD
            <textarea name="etc" class="form-control">{{ old('etc') }}</textarea>
</div>
=======
</div>
@endsection

@section("script")
<script src="{{ asset('js/date.js') }}"></script>
>>>>>>> master
@endsection


@section('style')
<style>
    .submit_btn {
        margin-top: 35px;
    }
</style>
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
>>>>>>> master
@endsection