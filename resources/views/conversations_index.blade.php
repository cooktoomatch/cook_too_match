@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('js/userIcon.js') }}"></script>
<div class="profile-page sidebar-collapse text-center">
    <h2 class="title">Messages</h2>
    <p class="category">メッセージ履歴</p>
    @if (count($conversations) > 0)
    <div class="container marketing">
        <div class="row">
            @foreach ($conversations as $conversation)
                <div class="col-6 col-lg-4 msgContent">
                    <a href="{{ url('conversations/'.$conversation->id.'/messages') }}" class="">
                        <div class="photo-container">
                            <img src="{{asset('storage/user_icon/'.$conversation->otherUser->icon)}}" id="userIcon-{{ $conversation->otherUser->id }}" class="rounded-circle img-fluid">
                        </div>
                        <h3 class="user_name">{{ $conversation->otherUser->name }}</h3>
                        <p class="description">{{ $conversation->messages[0]->content }}</p>
                    </a>
                </div>
                <script>
                    setIcon($('#userIcon-{{ $conversation->otherUser->id }}'));
                </script>
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