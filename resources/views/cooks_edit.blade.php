@extends('layouts.app')
@section('content')
<div class="profile-page sidebar-collapse">
    <h2 class="title">Edit</h2>
    <p class="category">投稿の編集</p>
    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
        <form action="{{ url('cooks/update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group input-lg">
                @if($errors->has('name'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('name') }}</span class="errors">
                </div>
                @endif
                <input type="text" name="name" value="{{ old('name',$cook->name) }}" class="form-control" placeholder="料理名">
            </div>
            <div class="custom-file">
                <label for="" class="control-label">サムネイル</label>
                @if($errors->has('image'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('image') }}</span class="errors">
                </div>
                @endif
                <div id="upArea">
                    @if ($cook->image)
                    <img src="{{asset('/storage/cook_image/'.$cook->image->image)}}" alt="thumbnail" class="upImg img-raised">
                    @endif
                </div>
                <div onclick="$('#image').click();" class="fileBtn form-control">ファイルを選択</div>
                <input id="image" type="file" class="custom-file-input" name="image" placeholder="サムネイル">
            </div>
            <div class="form-group input-lg">
                @if($errors->has('description'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('description') }}</span class="errors">
                </div>
                @endif
                <textarea name="description" class="form-control" placeholder="料理の説明">{{ old('description',$cook->description) }}</textarea>
            </div>
            <div class="form-group input-lg">
                @if($errors->has('price'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('price') }}</span class="errors">
                </div>
                @endif
                <input type="number" name="price" value="{{ old('price',$cook->price) }}" class="form-control" placeholder="料金">
            </div>
            <div class="form-group input-lg">
                @if($errors->has('num'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('num') }}</span class="errors">
                </div>
                @endif
                <input type="number" name="num" value="{{ old('num',$cook->num) }}" class="form-control" placeholder="提供可能数">
            </div>
            <div class="form-group input-lg">
                <label for="image" class="control-label">提供可能開始時間</label>
                @if($errors->has('start_time'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('start_time') }}</span class="errors">
                </div>
                @endif
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
                @if($errors->has('end_time'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('end_time') }}</span class="errors">
                </div>
                @endif
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
                @if($errors->has('etc'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('etc') }}</span class="errors">
                </div>
                @endif
                <textarea name="etc" class="form-control" placeholder="備考">{{ old('etc',$cook->etc) }}</textarea>
            </div>
            <div class="form-group input-lg">
                <button type="submit" class="btn btn-primary btn-round btn-block btn-lg submit_btn">更新</button>
            </div>
            <input type="hidden" name="id" value="{{$cook->id}}" />
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

    .error-box {
        text-align: left;
    }

    .error-box .errors {
        color: red;
    }

    .control-label {
        text-align: left;
        display: block;
        box-sizing: border-box;
        padding-left: 18px;
        font-size: 13px;
        margin-top: 26px;
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