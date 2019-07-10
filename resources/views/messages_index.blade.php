@extends('layouts.app')

@section('content')
<div class="profile-page sidebar-collapse text-center">
    <h2 class="title">Message for ...</h2>
    <a href="{{ url('users/show/'.$conversation->otherUser->id) }}" class="userLink">
        <div class="photo-container">
            <img src="{{asset('storage/user_icon/'.$conversation->otherUser->icon)}}" id="userIcon" class="rounded-circle img-fluid">
        </div>
        <p class="category">{{ $conversation->otherUser->name }}</p>
    </a>
    @include('common.errors')
    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">

        <!-- <form action="{{ url('conversations/'.$conversation->id.'/messages') }}" method="POST">
            {{ csrf_field() }} -->
        <div class="form-group">
            <textarea name="content" class="form-control" placeholder="メッセージを入力...">{{ old('content') }}</textarea>
        </div>
        <input type="hidden" name="conversation_id" value="{{ $conversation->id }}" class="conversation_id">
        <input type="hidden" name="sender_id" value="{{ $conversation->senderUser->id }}" class="sender_id">
        <input type="hidden" name="sender_name" value="{{ $conversation->senderUser->name }}" class="sender_name">
        <input type="hidden" name="sender_icon" value="{{ $conversation->senderUser->icon }}" class="sender_icon">
        <input type="hidden" name="recipient_id" value="{{ $conversation->recipientUser->id }}" class="recipient_id">
        <input type="hidden" name="recipient_name" value="{{ $conversation->recipientUser->name }}" class="recipient_name">
        <input type="hidden" name="recipient_icon" value="{{ $conversation->recipientUser->icon }}" class="recipient_icon">
        <input type="hidden" name="messages" value="{{ $messages }}" class="messages">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}" class="user_id">
        <div class="form-group">
            <input type="submit" value="送信" class="btn btn-primary btn-round btn-block btn-lg submit_btn">
        </div>
        <!-- </form> -->

        <ul class="msgArea"></ul>
    </div>

</div>
@endsection

@section("script")
<script src="{{ asset('js/message.js') }}"></script>
<script src="{{ asset('js/userIcon.js') }}"></script>
<script>
    setIcon($('#userIcon'));
</script>
@endsection

@section('style')
<link href="{{ asset('css/message.css') }}" rel="stylesheet">
@endsection