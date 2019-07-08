@extends('layouts.app')

@section('main')
<div id="map" style="height: 500px;"></div>
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

<script>
    function initMap() {
        debugger;
        const users = < ? php echo $users; ? > ;
        const currentUser = < ? php echo $currentUser; ? > ;

        let zoom = 12;
        let center = {
            lat: 35.681236,
            lng: 139.767125
        }
        if (currentUser.latitude) {
            center = {
                lat: currentUser.latitude,
                lng: currentUser.longitude
            }
        }
        debugger;

        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: zoom,
            center: center
        });

        users.forEach(user => {
            const marker = new google.maps.Marker({
                map: map,
                position: {
                    lat: user.latitude,
                    lng: user.longitude
                },
                icon: {
                    url: `storage/user_icon/${user.icon}`,
                    size: new google.maps.Size(46, 46),
                    scaledSize: new google.maps.Size(46, 46),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(0, 0),
                },
                animation: google.maps.Animation.DROP
            });

            let cookImages = "";
            user.cooks.forEach(cook => {
                cookImages += `<a href="cooks/show/${cook.id}"><img src="storage/cook_image/${cook.image}" class="infoCookImg"></a>`;
            });

            const info = `<div>
                          <a href="users/show/${user.id}" class="infoCookName">${user.name}</a>
                          <p class="infoCookCount">投稿数: ${user.cooks.length}</p>
                          ${cookImages}
                          </div>`;

            markerInfo(marker, info);
        });

        function markerInfo(marker, info) {
            google.maps.event.addListener(marker, 'mouseover', function(event) {
                new google.maps.InfoWindow({
                    content: info
                }).open(marker.getMap(), marker);
            });
        }
    };
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_wlIFXfpic4yHk5ycglzt35H1akkc_Uo&callback=initMap" type="text/javascript"></script>
@endsection

@section("script")
<script src="{{ asset('js/good.js') }}"></script>
<script src="{{ asset('js/buy.js') }}"></script>
@endsection

@section('style')
<style>
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
</style>
<link href="{{ asset('css/cook_list.css') }}" rel="stylesheet">
@endsection