@extends('layouts.app')

@section('content')
<div class="profile-page sidebar-collapse">
    <h2 class="title">Edit</h2>
    <p class="category">登録内容の編集</p>
    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
        <form action="{{ url('users/update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group input-lg">
                @if($errors->has('name'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('name') }}</span class="errors">
                </div>
                @endif
                <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control" placeholder="ユーザーネーム">
            </div>
            <div class="form-group input-lg">
                @if($errors->has('email'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('email') }}</span class="errors">
                </div>
                @endif
                <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control" placeholder="メールアドレス">
            </div>
            <!-- <div class="custom-file">
                <label for="icon" class="control-label" placeholder="サムネイル"></label>
                <input id="icon" type="file" class="custom-file-input" name="icon" placeholder="サムネイル">
            </div> -->
            <div class="custom-file">
                <label for="" class="control-label">アイコン</label>
                @if($errors->has('image'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('image') }}</span class="errors">
                </div>
                @endif
                <div id="upArea">
                    @if ($user->icon)
                    <img src="{{asset('/storage/user_icon/'.$user->icon)}}" alt="thumbnail" class="upImg img-raised">
                    @endif
                </div>
                <div onclick="$('#image').click();" class="fileBtn form-control">ファイルを選択</div>
                <input id="image" type="file" class="custom-file-input" name="icon" placeholder="アイコン">
            </div>

            <div class="form-group input-lg">
                @if($errors->has('description'))
                <div class="error-box">
                    <span class="errors">※{{ $errors->first('description') }}</span class="errors">
                </div>
                @endif
                <textarea name="description" class="form-control" placeholder="紹介文">{{ old('description',$user->description) }}</textarea>
            </div>

            <section class="address">
                <div class="form-group input-lg">
                    <label for="zip" class="col-sm-2 control-label"></label>
                    @if($errors->has('zip'))
                    <div class="error-box">
                        <span class="errors">※{{ $errors->first('zip') }}</span class="errors">
                    </div>
                    @endif
                    <input type="text" class="form-control alphabet" name="zip" id="zip" x-autocompletetype="postal-code" value="{{ old('zip',$user->zip) }}" placeholder="郵便番号">
                </div>

                <div class="form-group input-lg">
                    @if($errors->has('pref'))
                    <div class="error-box">
                        <span class="errors">※{{ $errors->first('pref') }}</span class="errors">
                    </div>
                    @endif
                    <select name="pref" id="pref" class="form-control pref_select" x-autocompletetype="region" data-selected="{{$user->pref}}">
                        <option value="">-- 都道府県 --</option>
                        <optgroup label="北海道">
                            <option value="1" {{ old('pref') == 1 ? 'selected' : '' }}>北海道</option>
                        </optgroup>
                        <optgroup label="東北">
                            <option value="2" {{ old('pref') == 2 ? 'selected' : '' }}>青森県</option>
                            <option value="3" {{ old('pref') == 3 ? 'selected' : '' }}>岩手県</option>
                            <option value="4" {{ old('pref') == 4 ? 'selected' : '' }}>宮城県</option>
                            <option value="5" {{ old('pref') == 5 ? 'selected' : '' }}>秋田県</option>
                            <option value="6" {{ old('pref') == 6 ? 'selected' : '' }}>山形県</option>
                            <option value="7" {{ old('pref') == 7 ? 'selected' : '' }}>福島県</option>
                        </optgroup>
                        <optgroup label="関東">
                            <option value="8" {{ old('pref') == 8 ? 'selected' : '' }}>茨城県</option>
                            <option value="9" {{ old('pref') == 9 ? 'selected' : '' }}>栃木県</option>
                            <option value="10" {{ old('pref') == 10 ? 'selected' : '' }}>群馬県</option>
                            <option value="11" {{ old('pref') == 11 ? 'selected' : '' }}>埼玉県</option>
                            <option value="12" {{ old('pref') == 12 ? 'selected' : '' }}>千葉県</option>
                            <option value="13" {{ old('pref') == 13 ? 'selected' : '' }}>東京都</option>
                            <option value="14" {{ old('pref') == 14 ? 'selected' : '' }}>神奈川県</option>
                        </optgroup>
                        <optgroup label="北陸">
                            <option value="15" {{ old('pref') == 15 ? 'selected' : '' }}>新潟県</option>
                            <option value="16" {{ old('pref') == 16 ? 'selected' : '' }}>富山県</option>
                            <option value="17" {{ old('pref') == 17 ? 'selected' : '' }}>石川県</option>
                            <option value="18" {{ old('pref') == 18 ? 'selected' : '' }}>福井県</option>
                        </optgroup>
                        <optgroup label="中部">
                            <option value="19" {{ old('pref') == 19 ? 'selected' : '' }}>山梨県</option>
                            <option value="20" {{ old('pref') == 20 ? 'selected' : '' }}>長野県</option>
                            <option value="21" {{ old('pref') == 21 ? 'selected' : '' }}>岐阜県</option>
                            <option value="22" {{ old('pref') == 22 ? 'selected' : '' }}>静岡県</option>
                            <option value="23" {{ old('pref') == 23 ? 'selected' : '' }}>愛知県</option>
                        </optgroup>
                        <optgroup label="近畿">
                            <option value="24" {{ old('pref') == 24 ? 'selected' : '' }}>三重県</option>
                            <option value="25" {{ old('pref') == 25 ? 'selected' : '' }}>滋賀県</option>
                            <option value="26" {{ old('pref') == 26 ? 'selected' : '' }}>京都府</option>
                            <option value="27" {{ old('pref') == 27 ? 'selected' : '' }}>大阪府</option>
                            <option value="28" {{ old('pref') == 28 ? 'selected' : '' }}>兵庫県</option>
                            <option value="29" {{ old('pref') == 29 ? 'selected' : '' }}>奈良県</option>
                            <option value="30" {{ old('pref') == 30 ? 'selected' : '' }}>和歌山県</option>
                        </optgroup>
                        <optgroup label="中国">
                            <option value="31" {{ old('pref') == 31 ? 'selected' : '' }}>鳥取県</option>
                            <option value="32" {{ old('pref') == 32 ? 'selected' : '' }}>島根県</option>
                            <option value="33" {{ old('pref') == 33 ? 'selected' : '' }}>岡山県</option>
                            <option value="34" {{ old('pref') == 34 ? 'selected' : '' }}>広島県</option>
                            <option value="35" {{ old('pref') == 35 ? 'selected' : '' }}>山口県</option>
                        </optgroup>
                        <optgroup label="四国">
                            <option value="36" {{ old('pref') == 36 ? 'selected' : '' }}>徳島県</option>
                            <option value="37" {{ old('pref') == 37 ? 'selected' : '' }}>香川県</option>
                            <option value="38" {{ old('pref') == 38 ? 'selected' : '' }}>愛媛県</option>
                            <option value="39" {{ old('pref') == 39 ? 'selected' : '' }}>高知県</option>
                        </optgroup>
                        <optgroup label="九州/沖縄">
                            <option value="40" {{ old('pref') == 40 ? 'selected' : '' }}>福岡県</option>
                            <option value="41" {{ old('pref') == 41 ? 'selected' : '' }}>佐賀県</option>
                            <option value="42" {{ old('pref') == 42 ? 'selected' : '' }}>長崎県</option>
                            <option value="43" {{ old('pref') == 43 ? 'selected' : '' }}>熊本県</option>
                            <option value="44" {{ old('pref') == 44 ? 'selected' : '' }}>大分県</option>
                            <option value="45" {{ old('pref') == 45 ? 'selected' : '' }}>宮崎県</option>
                            <option value="46" {{ old('pref') == 46 ? 'selected' : '' }}>鹿児島県</option>
                            <option value="47" {{ old('pref') == 47 ? 'selected' : '' }}>沖縄県</option>
                        </optgroup>
                    </select>
                </div>

                <div class="form-group input-lg">
                    @if($errors->has('town'))
                    <div class="error-box">
                        <span class="errors">※{{ $errors->first('town') }}</span class="errors">
                    </div>
                    @endif
                    <input type="text" class="form-control" name="town" id="town" x-autocompletetype="street-address" value="{{ old('town',$user->town) }}" placeholder="市区町村/番地">
                </div>

                <div class="form-group input-lg">
                    @if($errors->has('building'))
                    <div class="error-box">
                        <span class="errors">※{{ $errors->first('building') }}</span class="errors">
                    </div>
                    @endif
                    <input type="text" class="form-control" name="building" id="building" value="{{ old('building',$user->building) }}" placeholder="マンション名">
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
<script src="{{ asset('js/fileUp.js') }}"></script>
@endsection

@section('style')
<style>
    .submit_btn {
        margin-top: 35px;
    }

    .pref_select {
        height: 44px;
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