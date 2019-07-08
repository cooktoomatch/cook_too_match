@extends('layouts.app')

@section('main')
<div class="profile-page sidebar-collapse">
    @include('common.errors')
    <div class="wrapper">
        <div class="page-header clear-filter page-header-small" filter-color="orange">

            <div class="page-header-image" data-parallax="true" style="background-image:url('../../mypage_bg02.jpg');">
            </div>

            <div class="container">

                <div class="photo-container">
                    <img src="{{ asset('storage/user_icon/' . $user->icon) }}" alt="user_icon" width="123" class="rounded-circle img-raised">
                    <!-- <img src="../assets/img/ryan.jpg" alt=""> -->
                </div>

                <h3 class="title">{{ $user->name }}</h3>
                <div class="content">
                    <div class="social-description">
                        <h2>{{ count($user->cooks) }}</h2>
                        <p>投稿</p>
                    </div>
                    <div class="social-description">
                        <h2>{{ $good_all }}</h2>
                        <p>グッド</p>
                    </div>
                    <!-- <div class="social-description">
                        <h2>48</h2>
                        <p>Bookmarks</p> -->
                </div>
            </div>

            @if ($user->id === Auth::user()->id)
            <div class="current_user_option">
                <div class="table-text">
                    <form action="{{ url('users/edit/'.$user->id) }}" method="GET">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-neutral"><i class="fas fa-user-edit"></i></button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection

@section('content')
<!-- <link href="https://demos.creative-tim.com/now-ui-kit/assets/demo/demo.css" rel="stylesheet"> -->
<main role="main">

    <div class="profile-page sidebar-collapse">
        <h4 class="title">ABOUT ME</h4>
        <p class="description">{{ $user->description }}</p>
        @if ($user->id !== Auth::user()->id)
        <form action="{{ url('conversations/store') }}" method="POST" class="dmBtn">
            {{ csrf_field() }}
            <input type="hidden" name="sender_user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="recipient_user_id" value="{{ $user->id }}">
            <button type="submit" class="btn btn-lg btn-primary btn-round">{{ $user->name }}さんにメッセージを送る</button>
        </form>
        @endif
        <h4 class="title">{{ $user->name }}さんの料理</h4>

        @include('layouts.components.cookShow')

        <!-- <h4 class="title">グッドした料理</h4>
    @if (count($user->cooks) > 0)
    <div class="album py-5">
        <div class="row">
        @foreach ($user->cooks as $cook)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('storage/cook_image/'.$cook->image) }}" class="bd-placeholder-img card-img-top" width="100%">
                    <div class="card-body">
                        <p class="card-text">{{ $cook->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action="{{ url('cooks/show/'.$cook->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-primary" style="margin-right: 8px;">more</button>
                                </form>
                                @if ($cook->user->id === Auth::user()->id)
                                    <form action="{{ url('cooks/edit/'.$cook->id) }}" method="GET">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-sm btn-success">edit</button>
                                    </form>
                                @endif
                                <form action="{{ url('cooks/edit/'.$cook->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-default btn-neutral btn-icon btn-round">
                                        <i class="far fa-thumbs-up"></i>
                                    </button>
                                </form>
                            </div>
                            <small class="text-muted">{{ $cook->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif -->
    </div>
</main>
@endsection

@section('style')
<style>
    .navbar {
        margin-bottom: 0;
    }

    .py-5 {
        padding-top: 0 !important;
    }

    .dmBtn {
        text-align: center;
    }
</style>
<link href="{{ asset('css/cook_list.css') }}" rel="stylesheet">
@endsection

@section("script")
<script src="{{ asset('js/good.js') }}"></script>
@endsection