@extends('layouts.app')

@section('content')
@include('common.errors')
<div class="cooks_show_wrapper">
    <div class="leftSide">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach ($cook->images as $image)
                    @if ($loop->first)
                        <div class="carousel-item active">
                            <img class="d-block" src="{{ asset('storage/cook_image/'.$image->image) }}" alt="cook_image">
                        </div>
                    @else if ($loop->first)
                        <div class="carousel-item">
                            <img class="d-block" src="{{ asset('storage/cook_image/'.$image->image) }}" alt="cook_image">
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <i class="now-ui-icons arrows-1_minimal-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <i class="now-ui-icons arrows-1_minimal-right"></i>
            </a>
        </div>
    </div>
    <div class="rightSide">
        <div class="profile-page sidebar-collapse">
            <h3 class="title">{{ $cook->name }}</h3>
            <div class="description">{{ $cook->description }}</div>
            <table class="table">
                <tbody>
                    <tr>
                        <th>オーナー</th>
                        <td>
                            <a href="{{url('/users/show/'.$cook->user->id)}}">
                                <img src="{{asset('storage/user_icon/'.$cook->user->icon)}}" alt="owner_icon" width="30" height="30" style="border-radius: 15px;">
                                <span>{{ $cook->user->name }}</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>金額</th>
                        <td>{{ number_format($cook->price) }}円</td>
                    </tr>
                    <tr>
                        <th>提供可能数</th>
                        <td>{{ $cook->num }}</td>
                    </tr>
                    <tr>
                        <th>提供可能開始時間</th>
                        <td>{{ $cook->start_time }}</td>
                    </tr>
                    <tr>
                        <th>提供可能終了時間</th>
                        <td>{{ $cook->end_time }}</td>
                    </tr>
                    <tr>
                        <th>備考</th>
                        <td>{{ $cook->etc }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="btnArea">
                @if (Auth::id() === $cook->user_id)
                    <form action="{{ url('cooks/edit/'.$cook->id) }}" method="GET">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-success">編集 <i class="far fa-edit"></i></button>
                    </form>
                    <form action="{{ url('cook/'.$cook->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-outline-primary">削除 <i class="far fa-trash-alt"></i></button>
                    </form>
                @else
                    <button id="purchase" class="btn btn-lg btn-outline-primary btn-round col-12">購入</button>
                @endif
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" value="{{ Auth::id() }}" class="user_id">
            <textarea type="text" class="form-control text"></textarea>
            <button class="pyorosiku btn btn-primary">コメント</button>
        </div>


        <!-- <div class="display">

    </div> -->
        <ul class="msgArea"></ul>
    </div>
</div>
@endsection

@section("script")
<script src="{{ asset('js/comment.js') }}" defer></script>
<!-- <script src="{{ asset('js/purchase.js') }}" defer></script> -->
<script>
@endsection

@section("style")
<link href="{{ asset('css/cooks_show.css') }}" rel="stylesheet">
<link href="{{ asset('css/message.css') }}" rel="stylesheet">
@endsection