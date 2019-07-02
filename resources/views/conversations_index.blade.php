@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="card-title">
        <h1>メッセージ履歴</h1>
    </div>
    @if (count($conversations) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <tbody>
                        @foreach ($conversations as $conversation)
                            <tr>
                                <td class="table-text">
                                    <a href="{{ url('conversations/'.$conversation->id.'/messages') }}">
                                        {{ $conversation->id }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection