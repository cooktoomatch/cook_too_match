@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="card-title">
        <h1>料理一覧</h1>
        <a class="btn" href="{{ url('/cooks/create') }}">新規投稿</a>
    </div>
    @include('common.errors')

    @if (count($cooks) > 0)
    <div class="card-body">
        <div class="card-body">
            <div id="map" style="height: 400px;"></div>
            <table class="table table-striped task-table">
                <tbody>
                    @foreach ($cooks as $cook)
                    <tr>
                        <td class="table-text">
                            <div>{{ $cook->name }}</div>
                        </td>
                        <td>
                            <form action="{{ url('cooks/show/'.$cook->id) }}" method="GET">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">詳細</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ url('cooks/edit/'.$cook->id) }}" method="GET">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">更新</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ url('cook/'.$cook->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                {{ $cooks->links()}}
            </div>
        </div>
    </div>
    @endif
</div>
<script>
    function initMap() {
        const tatebayashi = {
            lat: 36.2448429,
            lng: 139.5419484
        };
        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: tatebayashi
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_wlIFXfpic4yHk5ycglzt35H1akkc_Uo&callback=initMap" type="text/javascript"></script>
@endsection