@extends('layouts.app')

@section('content')
<div class="profile-page sidebar-collapse text-center">
    <h2 class="title">Messages</h2>
    <p class="category">メッセージ履歴</p>
    @if (count($conversations) > 0)
    <div class="container marketing">
        <div class="row">
            @foreach ($conversations as $conversation)
            <div class="col-6 col-lg-4 msgContent">
                <a href="{{ url('conversations/'.$conversation->id.'/messages') }}" class="">
                    <img src="{{asset('storage/user_icon/'.$conversation->otherUser->icon)}}" class="rounded-circle img-fluid" width="140" height="140">
                    <h3 class="user_name">{{ $conversation->otherUser->name }}</h3>
                    <p class="description"></p>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    @else
    <div>ないよ</div>
    @endif

</div>
@endsection

@section('style')
<style>
    .msgContent {
        margin-bottom: 30px;
    }

    .msgContent a {
        text-decoration: none;
        color: #2c2c2c;
    }

    .msgContent:hover img {
        box-shadow: 0 10px 25px 0 rgba(0, 0, 0, .3);
        transition: 0.3s ease-out;
    }

    .msgContent:hover a {
        color: #f96332;
        transition: 0.3s ease-out;
    }

    .profile-page .title {
        margin-top: 0;
    }

    .user_name {
        font-weight: bold;
        margin: 0;
    }
</style>
@endsection