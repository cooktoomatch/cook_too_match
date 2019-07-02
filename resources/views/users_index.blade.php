@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="card-title">
        <h1>ユーザー一覧</h1>
    </div>
	@include('common.errors')

    @if (count($users) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $user->name }}</div>
                                </td>
                                <td>
                                    <form action="{{ url('users/show/'.$user->id) }}" method="GET">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">詳細</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ url('users/edit/'.$user->id) }}" method="GET">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ url('user/'.$user->id) }}" method="POST">
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
                    {{ $users->links()}}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection