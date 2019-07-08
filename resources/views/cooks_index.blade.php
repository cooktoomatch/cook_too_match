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
    @if (count($cooks) > 0)
    <div class="album py-5">
        <div class="row">
        @foreach ($cooks as $cook)
            <div class="col-6 col-md-4">
                <div class="card shadow-sm">
                    <div class="thumbnail">
                        <img src="{{ asset('storage/cook_image/'.$cook->image) }}" class="bd-placeholder-img card-img-top" width="100%">
                        <div class="overlay"></div>
                        <p class="price">¥ {{ $cook->price }}</p>
                    </div>
                    <div class="card-body">
                        <p class="cook_name">{{ $cook->name }}</p>
                        <!-- <p class="card-text">{{ $cook->description }}</p> -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action="{{ url('cooks/show/'.$cook->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-primary" style="margin-right: 8px;">more</button>
                                </form>
                                <form action="{{ url('cooks/edit/'.$cook->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-default btn-outline-default btn-icon btn-round">
                                        <i class="far fa-thumbs-up"></i>
                                    </button>
                                </form>
                            </div>
                            <small class="text-muted">{{ $cook->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</main>
</div>
<script>
    function initMap() {
        const users = <?php echo $users; ?>;
        const currentUser = <?php echo $currentUser; ?>;

        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: {lat: currentUser.latitude, lng: currentUser.longitude}
        });

        
        users.forEach(user => {
            const marker = new google.maps.Marker({
                map: map,
                position: {lat: user.latitude, lng: user.longitude},
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
            google.maps.event.addListener(marker, 'mouseover', function (event) {
                new google.maps.InfoWindow({
                    content: info
                }).open(marker.getMap(), marker);
            });
        }
    };
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_wlIFXfpic4yHk5ycglzt35H1akkc_Uo&callback=initMap" type="text/javascript"></script>
@endsection

@section('script')

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
</style>
<link href="{{ asset('css/cook_list.css') }}" rel="stylesheet">
@endsection