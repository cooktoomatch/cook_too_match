@extends('layouts.app')

@section('main')
<div id="map" style="height: 500px;"></div>
@endsection

@section('content')
<main role="main">
    <div class="profile-page sidebar-collapse">
        <section class="text-center">
            <h2 class="title">Let's share the overcooked food !</h2>
            <p class="category">つくりすぎた手料理をシェアしよう！</p>
            <p class="description">あなたの登録した住所の位置情報を元に、お近くで作られた手料理を一覧で表示しております。</p>
            @include('common.errors')
        </section>
        <!-- ここから -->
        @include('layouts.components.cookShow')
        <!-- ここまで -->
</main>
</div>
<script>
    function initMap() {
        var geocoder = new google.maps.Geocoder();
        const arr = < ? php echo $addArr; ? > ;
        const currentUser = < ? php echo $currentUser; ? > ;

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: {
                lat: currentUser.latitude,
                lng: currentUser.longitude
            }
        });

        for (let i = 0; i < arr.length; i++) {
            var marker = new google.maps.Marker({
                map: map,
                position: {
                    lat: arr[i].lat,
                    lng: arr[i].lng
                }
            });
        }
    };
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_wlIFXfpic4yHk5ycglzt35H1akkc_Uo&callback=initMap" type="text/javascript"></script>
@endsection

@section("script")
<script src="{{ asset('js/good.js') }}"></script>
@endsection

@section('style')
<style>
    .navbar {
        margin-bottom: 0;
    }
</style>
<link href="{{ asset('css/cook_list.css') }}" rel="stylesheet">
@endsection