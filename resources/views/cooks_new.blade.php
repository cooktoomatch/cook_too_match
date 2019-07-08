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
                <label for="" class="control-label">サムネイル</label>
                <div id="upArea"></div>
                <div onclick="$('#image').click();" class="fileBtn form-control">ファイルを選択</div>
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
                <label for="image" class="control-label">提供可能開始時間</label>
                <div class="d-flex flex-wrap">
                    <div class="selectWrap col-4">
                        <select name="start_year" class="start-year form-control  selectBox">
                        </select>
                    </div>
                    <div class="selectWrap col-4">
                        <select name="start_month" class="start-month form-control selectBox">
                        </select>
                    </div>
                    <div class="selectWrap col-4">
                        <select name="start_day" class="start-day form-control selectBox">
                        </select>
                    </div>
                    <div class="selectWrap col-6">
                        <select name="start_hour" class="start-hour form-control selectBox">
                        </select>
                    </div>
                    <div class="selectWrap col-6">
                        <select name="start_minute" class="start-minute form-control selectBox">
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group input-lg">
                <label for="image" class="control-label">提供可能終了時間</label>
                <div class="d-flex flex-wrap">
                    <div class="selectWrap col-4">
                        <select name="end_year" class="end-year form-control  selectBox">
                        </select>
                    </div>
                    <div class="selectWrap col-4">
                        <select name="end_month" class="end-month form-control selectBox">
                        </select>
                    </div>
                    <div class="selectWrap col-4">
                        <select name="end_day" class="end-day form-control selectBox">
                        </select>
                    </div>
                    <div class="selectWrap col-6">
                        <select name="end_hour" class="end-hour form-control selectBox">
                        </select>
                    </div>
                    <div class="selectWrap col-6">
                        <select name="end_minute" class="end-minute form-control selectBox">
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group input-lg">
                <textarea name="etc" class="form-control" placeholder="備考">{{ old('etc') }}</textarea>
            </div>
            <div class="form-group input-lg">
                <button type="submit" class="btn btn-primary btn-round btn-block btn-lg submit_btn">投稿</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section("script")
<script src="{{ asset('js/date.js') }}"></script>
<script src="{{ asset('js/fileUp.js') }}"></script>
@endsection


@section('style')
<style>
    .submit_btn {
        margin-top: 35px;
    }

    .selectWrap {
        box-sizing: border-box;
        padding: 0 0 5px 0;
        height: 49px;
    }

    .selectWrap.col-4+.selectWrap.col-4 {
        padding-left: 5px;
    }

    .selectWrap.col-6+.selectWrap.col-6 {
        padding-left: 5px;
    }

    .selectBox {
        height: 44px;
    }

    .control-label {
        text-align: left;
        display: block;
        box-sizing: border-box;
        padding-left: 18px;
        font-size: 13px;
        margin-top: 26px;
    }

    .fileBtn {
        color: #aaa;
        cursor: pointer;
        height: 44px;
        line-height: 44px;
        box-sizing: border-box;
        padding: 0;
    }

    .upImg {
        margin-bottom: 20px;
    }
</style>
@endsection