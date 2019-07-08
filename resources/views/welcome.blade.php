@extends('layouts.toppage')

@section('content')
<main role="main" class="inner cover">
    <h1 class="cover-heading">Cook too match!</h1>
    <p class="lead">食を通じてご近所さんと交流できるサービス<p>
            <p class="lead">
                @if(Auth::check())
                <a href="/cooks" class="btn btn-lg btn-success btn-try">Let's Try!</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-lg btn-success btn-try">Let's Try!</a>
                @endif
            </p>
</main>
@endsection