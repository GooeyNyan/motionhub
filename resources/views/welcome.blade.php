@extends('layouts.app')

@section('header-btn')
    @if(!\Auth::check())
        <div class="header-btn">
            <a href="{{ route('login') }}">登 录</a>
        </div>
    @else
        @if(Auth::user()->isAdmin())
            <div class="header-btn" style="right: 22.2083vw;">
                <a href="{{ route('admin') }}">权限分配</a>
            </div>
            <div class="header-btn" style="right: 15.2083vw;">
                <a href="{{ route('share.index') }}">分享总览</a>
            </div>
            <div class="header-btn" style="right: 8.3333vw;">
                <a href="{{ route('video.create') }}">提交视频</a>
            </div>
        @else
            <div class="header-btn" style="right: 8.3333vw;">
                <a href="{{ route('share.create') }}">分享视频</a>
            </div>
        @endif
        <div class="header-btn">
            <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button class="logout">登 出</button>
            </form>
        </div>
    @endif
@stop

@section('search-form')
    <form action="{{ route('search') }}" method="GET" class="search-form">
        <input name="q" class="video-search" placeholder="搜索视频">
        <img src="{{ asset('images/icon/icon-search.png') }}" class="search-submit">
    </form>
@endsection

@section('content')
    @include('layouts._header')
    <main id="index">
        <div class="navbar">
            <div class="nav-item index"><a href="{{ route('home') }}">首页</a></div>
            <sub-menu :categories="{{ $categories }}"></sub-menu>
            <div class="nav-item vip"><a href="{{ route('vip.index') }}">会员视频</a></div>
        </div>
        <div class="container-fluid">
            <div class="share">
                <div class="icon-wrapper">
                    {{-- url = http%3A%2F%2Fmotionhub.app%2F --}}
                    {{-- text = %E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0 --}}
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmotionhub.app%2F">
                        <img src="{{ asset('images/icon/icon-facebook.png') }}" alt="share to facebook"
                             class="icon-item">
                    </a>
                    {{-- https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmotionhub.app%2F --}}

                    <a href="https://twitter.com/intent/tweet?text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&hashtags=motionhub&url=http%3A%2F%2Fmotionhub.app%2F">
                        <img src="{{ asset('images/icon/icon-twitter.png') }}" alt="share to twitter" class="icon-item">
                    </a>
                    {{-- https://twitter.com/intent/tweet?text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&hashtags=motionhub&url=http%3A%2F%2Fmotionhub.app%2F --}}

                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fmotionhub.app%2F&title=join%20motionhub&text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&source=http%3A%2F%2Fmotionhub.app%2F">
                        <img src="{{ asset('images/icon/icon-linkedin.png') }}" alt="share to linkedin"
                             class="icon-item">
                    </a>
                    {{-- http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fmotionhub.app%2F&title=join%20motionhub&text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&source=http%3A%2F%2Fmotionhub.app%2F --}}

                    <a href="https://plus.google.com/share?url=http%3A%2F%2Fmotionhub.app%2F">
                        <img src="{{ asset('images/icon/icon-gplus.png') }}" alt="share to gplus" class="icon-item">
                    </a>
                    {{-- https://plus.google.com/share?url=http%3A%2F%2Fmotionhub.app%2F --}}

                    <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fmotionhub.app%2F&description=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&source=http%3A%2F%2Fmotionhub.app%2F">
                        <img src="{{ asset('images/icon/icon-pinterest.png') }}" alt="share to pinterest"
                             class="icon-item">
                    </a>
                    {{-- http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fmotionhub.app%2F&description=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&source=http%3A%2F%2Fmotionhub.app%2F --}}

                    <a href="">
                        <img src="{{ asset('images/icon/icon-instagram.png') }}" alt="share to instagram"
                             class="icon-item">
                    </a>

                    <a href="http://service.weibo.com/share/share.php?url=http%3A%2F%2Fmotionhub.app%2F&title=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0">
                        <img src="{{ asset('images/icon/icon-weibo.png') }}" alt="share to weibo" class="icon-item">
                    </a>
                    {{-- http://service.weibo.com/share/share.php?url=http%3A%2F%2Fmotionhub.app%2F&title=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0 --}}

                    <a href="">
                        <img src="{{ asset('images/icon/icon-wechat.png') }}" alt="share to wechat" class="icon-item">
                    </a>

                    <a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http%3A%2F%2Fmotionhub.app%2F&title=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0">
                        <img src="{{ asset('images/icon/icon-qzone.png') }}" alt="share to qzone" class="icon-item">
                    </a>
                    {{-- http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http%3A%2F%2Fmotionhub.app%2F&title=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0 --}}
                </div>
                <div class="desc">
                    <p>分享我们</p>
                    <p>和你的朋友一起学习！</p>
                </div>
            </div>
            <div class="videos">

                <category-videos></category-videos>
                <hot-videos type="hot" amount="5"></hot-videos>
                <videos type="new" amount="16"></videos>
                <videos type="titles" amount="16"></videos>
                <videos type="showreels" amount="16"></videos>

            </div>
            <div class="subscription-wrapper">
                <div class="subscription">
                    <div class="title">
                        <h2>如何成为一名数位设计师？</h2>
                    </div>
                    <div class="desc">
                        <p>作为一名设计师90%的时间都在工作。</p>
                        <p>百分之6的之间在吃喝玩乐，只有4%的学习时间。</p>
                        <p>我们愿意为那4%的学习时间服务</p>
                    </div>
                    <form action="{{ route('subscribe.store') }}" method="POST" class="subscription-form">
                        {{ csrf_field() }}
                        <button class="btn">免费订阅</button>
                        @if(Auth::check() && Auth::user()->isAdmin())
                            <a href="{{ route('subscribe.send') }}" class="btn">发送邮件</a>
                        @endif
                        <div class="text-box">
                            <input type="email" name="email" required="required" placeholder="输入邮箱，订阅最新视频内容！" class="subscribe-input">
                            <img src="{{ asset('images/icon/icon-envelope.png') }}" class="icon-envelope">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <video-player></video-player>
    </main>
@endsection