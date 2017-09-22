@extends('layouts.app')

@section('header-btn')

    @if(!\Auth::check())
        <div class="login-btn">
            <a href="{{ route('login') }}">登 录</a>
        </div>
    @else
        <div class="video-submit">
            <a href="{{ route('video.create') }}">提交视频</a>
        </div>
        <div class="login-btn">
            <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button>登 出</button>
            </form>
        </div>
    @endif
@stop

@section('content')
    @include('layouts._header')
    <main id="index">
        <div class="container-fluid">
            <div class="videos">
                <seach-wrapper :query="{{ $query }}"></seach-wrapper>
            </div>
        </div>
        <video-player></video-player>
    </main>
@endsection