@extends('layouts.app')

@section('main')
<div id="map" style="height: 500px;">
    <img class="loader" src="{{ asset('loader.gif') }}">
</div>
@endsection

@section('content')
<main role="main">

    <img class="nanase" src="http://imgcc.naver.jp/kaze/mission_anm/USER/20181110/35/3012705/1/500x210x8f173d0eaffc4b90c0c0361b.gif" alt="">

    <div class="profile-page sidebar-collapse">
        <section class="text-center">
            <h2 class="title">Let's share the overcooked food !</h2>
            <p class="category">つくりすぎた手料理をシェアしよう！</p>
            <p class="description">あなたの登録した住所の位置情報を元に、お近くで作られた手料理を一覧で表示しております。</p>
            @include('common.errors')
        </section>
        @if ($currentUser->address)
            <!-- ここから -->
            @include('layouts.components.cookShow')
            <!-- ここまで -->
        @else
        <div class="text-center">
            <a href="{{ url('users/edit/'.$currentUser->id) }}" class="btn btn-primary btn-round btn-lg">住所を登録する</a>
        </div>
        @endif
    </div>
</main>
@endsection

@section('php')
<?php
function json_safe_encode($data){
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}
?>
@endsection

@section("script")
<script src="{{ asset('js/good.js') }}"></script>
<script src="{{ asset('js/buy.js') }}"></script>
<script src="{{ asset('js/map.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_wlIFXfpic4yHk5ycglzt35H1akkc_Uo&callback=getUsers" type="text/javascript"></script>
@endsection

@section('style')
<style>
    #map {
        position:relative;
        border-bottom: solid 1px #ddd;
    }
    .navbar {
        margin-bottom: 0;
    }

    .infoCookImg {
        width: 50px;
        height: 50px;
        margin-left: 5px;
    }

    .infoCookCount {
        font-size: 14px;
    }

    .infoCookName {
        font-weight: bold;
        display: inline-block;
        margin-bottom: 10px;
    }

    .nanase {
        display: none;
        height: 120%;
        width: 120%;
        position: fixed;
        z-index: 100;
        top: -10%;
        left: 0%;
    }

    .loader {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
</style>
<link href="{{ asset('css/cook_list.css') }}" rel="stylesheet">
@endsection