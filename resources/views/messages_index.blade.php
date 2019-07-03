@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="card-title">
        <h1>メッセージ</h1>
    </div>
    @include('common.errors')

    <!-- <form action="{{ url('conversations/'.$conversation->id.'/messages') }}" method="POST">
        {{ csrf_field() }} -->
    <div class="form-group">
        <textarea name="content" class="form-control">{{ old('content') }}</textarea>
    </div>
    <input type="hidden" name="conversation_id" value="{{ $conversation->id }}" class="conversation_id">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="user_id">
    <div class="form-group">
        <input type="submit" value="コメント" class="btn btn-primary">
    </div>
    <!-- </form> -->

    <div class="card-body">
        <div class="card-body">
            <table class="table table-striped task-table">
                <tbody class="tbody">
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section("script")
<script src="{{ asset('js/message.js') }}"></script>
@endsection