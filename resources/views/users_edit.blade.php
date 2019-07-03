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

        <section class="address">
            <div class="form-group">
                <label for="zip" class="col-sm-2 control-label">郵便番号</label>
                <div class="col-sm-4">
                <input type="text" class="form-control alphabet" name="zip" id="zip" pattern="\d{3}[\-\s]?\d{4}" x-autocompletetype="postal-code" required>
                <span class="help-block"><span class="label label-default">例</span>123 4567</span>
                <span class="help-block">入力後に住所が自動入力されます</span>
                </div>
            </div>

            <div class="form-group">
                <label for="pref" class="col-sm-2 control-label">都道府県</label>
                <div class="col-sm-3">
                <select name="pref" id="pref" class="form-control" x-autocompletetype="region" required>
                <option value="" selected="selected">-- 都道府県 --</option>
                <optgroup label="北海道">
                    <option value="1">北海道</option>
                </optgroup>
                <optgroup label="東北">
                    <option value="2">青森県</option>
                    <option value="3">岩手県</option>
                    <option value="4">宮城県</option>
                    <option value="5">秋田県</option>
                    <option value="6">山形県</option>
                    <option value="7">福島県</option>
                </optgroup>
                <optgroup label="関東">      
                    <option value="8">茨城県</option>
                    <option value="9">栃木県</option>
                    <option value="10">群馬県</option>
                    <option value="11">埼玉県</option>
                    <option value="12">千葉県</option>
                    <option value="13">東京都</option>
                    <option value="14">神奈川県</option>
                </optgroup>
                <optgroup label="北陸">      
                    <option value="15">新潟県</option>
                    <option value="16">富山県</option>
                    <option value="17">石川県</option>
                    <option value="18">福井県</option>
                </optgroup>
                <optgroup label="中部">      
                    <option value="19">山梨県</option>
                    <option value="20">長野県</option>
                    <option value="21">岐阜県</option>
                    <option value="22">静岡県</option>
                    <option value="23">愛知県</option>
                </optgroup>
                <optgroup label="近畿">      
                    <option value="24">三重県</option>
                    <option value="25">滋賀県</option>
                    <option value="26">京都府</option>
                    <option value="27">大阪府</option>
                    <option value="28">兵庫県</option>
                    <option value="29">奈良県</option>
                    <option value="30">和歌山県</option>
                </optgroup>
                <optgroup label="中国">      
                    <option value="31">鳥取県</option>
                    <option value="32">島根県</option>
                    <option value="33">岡山県</option>
                    <option value="34">広島県</option>
                    <option value="35">山口県</option>
                </optgroup>
                <optgroup label="四国">      
                    <option value="36">徳島県</option>
                    <option value="37">香川県</option>
                    <option value="38">愛媛県</option>
                    <option value="39">高知県</option>
                </optgroup>
                <optgroup label="九州/沖縄">
                    <option value="40">福岡県</option>
                    <option value="41">佐賀県</option>
                    <option value="42">長崎県</option>
                    <option value="43">熊本県</option>
                    <option value="44">大分県</option>
                    <option value="45">宮崎県</option>
                    <option value="46">鹿児島県</option>
                    <option value="47">沖縄県</option>
                </optgroup>
                </select>
                </div>
            </div>

            <div class="form-group">
                <label for="town" class="col-sm-2 control-label">市区町村/番地</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="town" id="town" x-autocompletetype="street-address" required>
                <span class="help-block"><span class="label label-default">例</span>新宿区西新宿1-2-3</span>
                </div>
            </div>

            <div class="form-group">
                <label for="building" class="col-sm-2 control-label">マンション名</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="building" id="building">
                <span class="help-block"><span class="label label-default">例</span>新宿中央ビルディング 13階</span>
                </div>
            </div>
        </section>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">投稿</button>
        </div>
        <input type="hidden" name="id" value="{{$user->id}}" />
        <a class="btn btn-link pull-right" href="{{ url('/users') }}">一覧へ</a>
    </form>
</div>
@endsection