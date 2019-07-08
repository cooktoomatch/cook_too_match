@extends('layouts.app')

@section('content')
<div class="profile-page sidebar-collapse">
    <h2 class="title">Edit</h2>
    <p class="category">登録内容の編集</p>
    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
        @include('common.errors')
        <form action="{{ url('users/update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group input-lg">
                <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="ユーザーネーム">
            </div>
            <div class="form-group input-lg">
                <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="メールアドレス">
            </div>
            <div class="custom-file">
                <label for="icon" class="control-label" placeholder="サムネイル"></label>
                <input id="icon" type="file" class="custom-file-input" name="icon" placeholder="サムネイル">
            </div>

            <div class="form-group input-lg">
                <textarea name="description" class="form-control" placeholder="紹介文">{{$user->description}}</textarea>
            </div>

            <section class="address">
                <div class="form-group input-lg">
                    <label for="zip" class="col-sm-2 control-label"></label>
                    <input type="text" class="form-control alphabet" name="zip" id="zip" pattern="\d{3}[\-\s]?\d{4}" x-autocompletetype="postal-code" value="{{$user->zip}}" placeholder="郵便番号" required>
                </div>

                <div class="form-group input-lg">
                    <select name="pref" id="pref" class="form-control pref_select" x-autocompletetype="region" required data-selected="{{$user->pref}}">
                    <option value="">-- 都道府県 --</option>
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

                <div class="form-group input-lg">
                    <input type="text" class="form-control" name="town" id="town" x-autocompletetype="street-address" value="{{$user->town}}" placeholder="市区町村/番地" required>
                </div>

                <div class="form-group input-lg">
                    <input type="text" class="form-control" name="building" id="building" value="{{$user->building}}" placeholder="マンション名">
                </div>
            </section>
            <div class="form-group input-lg">
                <button type="submit" class="btn btn-primary btn-round btn-block btn-lg submit_btn">更新</button>
            </div>
            <input type="hidden" name="id" value="{{$user->id}}" />
        </form>
        <div class="table-text">
            <form action="{{ url('user/'.$user->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}     
                <button type="submit" class="btn btn-outline-primary">
                    アカウント削除 <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </div>
    </div>  
</div>
@endsection

@section("script")
<script src="{{ asset('js/ajaxzip2.js') }}"></script>
<script src="{{ asset('js/select.js') }}"></script>
@endsection

@section('style')
<style>
    .submit_btn {
        margin-top: 35px;
    }
    .pref_select {
        height: 44px;
    }
</style>
@endsection