@extends('layouts.toppage')

@section('content')
<main role="main" class="inner cover">
    <h1 class="cover-heading">Cook too match!</h1>
    <p class="lead">食を通じてご近所さんと交流できるサービス<p>
    <p class="lead">
        <a href="{{ route('login') }}" class="btn btn-lg btn-success btn-try">Let's Try!</a>
    </p>
</main>
@endsection