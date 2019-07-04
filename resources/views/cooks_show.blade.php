@extends('layouts.app')
@section('content')
<div class="card-body">
    <div class="card-title">
        <h2>料理の詳細</h2>
    </div>
    @include('common.errors')
    <tr>
        <td class="table-text">
            <div>料理名: {{ $cook->name }}</div>
        </td>
        <td>
            <div>サムネイル: </div>
            <!-- <img src="{{ asset('storage/cook_image/' . $cook->image) }}" alt="cook_image" width="300"> -->
        </td>
        <td>
            <div>説明文: {{ $cook->description }}</div>
        </td>
        <td>
            <div>金額: {{ $cook->price }}</div>
        </td>
        <td>
            <div>備考: {{ $cook->etc }}</div>
        </td>
        <td>
            <div>提供可能数: {{ $cook->num }}</div>
        </td>
        <td>
            <div>提供可能開始時間: {{ $cook->start_time }}</div>
        </td>
        <td>
            <div>提供可能終了時間: {{ $cook->end_time }}</div>
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

    <input type="hidden" value="{{ Auth::user()->id }}" class="user_id">
    <input type="text" class="text">
    <button class="pyorosiku">ヒョロしく</button>
    <div class="display">

    </div>
</div>
@endsection

@section("script")
<script src="{{ asset('js/comment.js') }}" defer></script>
@endsection