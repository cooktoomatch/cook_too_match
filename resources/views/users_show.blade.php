@extends('layouts.app')
@section('content')
<div class="card-body">
    <div class="card-title">
        @if ($user->id === Auth::user()->id)
            <h2>マイページ</h2>
        @else
            <h2>ユーザー詳細</h2>
            <form action="{{ url('conversations/store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="sender_user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="recipient_user_id" value="{{ $user->id }}">
                <button type="submit" class="btn btn-danger">メッセージを送る</button>
            </form>
        @endif
    </div>
    @include('common.errors')
    <tr>
        <td class="table-text">
            <div>ユーザー名: {{ $user->name }}</div>
        </td>
        <td class="table-text">
            <div>メールアドレス: {{ $user->email }}</div>
        </td>
        <td class="table-text">
            <div>アイコン: </div>
            <img src="{{ asset('storage/user_icon/' . $user->icon) }}" alt="user_icon" width="300">
        </td>
        <td class="table-text">
            <div>紹介文: {{ $user->description }}</div>
        </td>
        <td class="table-text">
            <div>経度: {{ $user->longitude }}</div>
        </td>
        <td class="table-text">
            <div>緯度: {{ $user->latitude }}</div>
        </td>
        <td class="table-text">
            <form action="{{ url('users/edit/'.$user->id) }}" method="GET">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">更新</button>
            </form>
        </td>
        <td class="table-text">
            <form action="{{ url('user/'.$user->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}     
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </td>
    </tr>
</div>
@endsection