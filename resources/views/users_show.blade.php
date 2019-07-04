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
                <div>住所: {{ $user->address }}</div>
            </td>
            @if ($user->id === Auth::user()->id)
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
            @endif
        </tr>
        <div class="">
            <h3>投稿した料理一覧</h3>
            @foreach ($user->cooks as $cook)
                <div>料理名: {{ $cook->name }}</div>
                <img src="{{ asset('storage/cook_image/' . $cook->image) }}" alt="thumbnail" width="300">
                <div>紹介文: {{ $cook->description }}</div>
                <div>提供可能数: {{ $cook->num }}</div>
                <div>提供可能開始日時: {{ $cook->start_time }}</div>
                <div>提供可能終了日時: {{ $cook->end_time }}</div>
                <div>備考: {{ $cook->etc }}</div>
            @endforeach
        </div>
    </div>
</div>
@endsection