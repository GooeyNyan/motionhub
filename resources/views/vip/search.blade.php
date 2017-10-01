@extends('layouts.app')

@section('header-btn')
    @if(!\Auth::check())
        <div class="header-btn">
            <a href="{{ route('login') }}">登 录</a>
        </div>
    @else
        @if(Auth::user()->isAdmin())
            <div class="header-btn" style="right: 292px;">
                <a href="{{ route('share.index') }}">分享总览</a>
            </div>
            <div class="header-btn" style="right: 160px;">
                <a href="{{ route('video.create') }}">提交视频</a>
            </div>
        @else
            <div class="header-btn" style="right: 160px;">
                <a href="{{ route('share.create') }}">分享视频</a>
            </div>
        @endif
        <div class="header-btn">
            <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button>登 出</button>
            </form>
        </div>
    @endif
@stop

@section('search-form')
    <form action="{{ route('vip.search') }}" method="GET" class="search-form">
        <input name="q" class="video-search" placeholder="搜索视频">
        <img src="{{ asset('images/icon/icon-search.png') }}" class="search-submit">
    </form>
@endsection

@section('content')
    @include('layouts._header')
    <main id="center">

        <div class="banner">
            <div class="title-wrapper">
                <div class="title">3D艺术创作<br>从零基础开始指导</div>
                <button class="check">点击查看</button>
            </div>
            <div class="img-wrapper">
                <img src="{{ asset("images/banner1.png") }}">
                <img src="{{ asset("images/banner2.png") }}">
            </div>
            <div class="pagination">
                <div class="page active"></div>
                <div class="page"></div>
                <div class="page"></div>
            </div>
        </div>

        <div class="profile">
            <img src="{{ asset("images/icon/icon-shopcart-2.png") }}" class="shopcart">
            <img src="{{ asset("images/icon/icon-envelope.png") }}" class="info">
            <a href="">
                <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
            </a>
            <button class="committee">
                <img src="{{ asset("images/icon/icon-home.png") }}" class="icon-committee" width="19" height="16"><span
                        class="text">居委会</span>
            </button>
        </div>

        <vip-search type="name" query="{{ $query }}"></vip-search>
        <vip-search type="tag" query="{{ $query }}" style="margin-top: 50px;"></vip-search>

    </main>
@endsection