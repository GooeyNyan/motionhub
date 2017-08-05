@extends('layouts.app')

@section('header-btn')
    @if(!\Auth::check())
        <div class="login-btn">
            <a href="{{ route('login') }}">登 录</a>
        </div>
    @else
        <div class="video-submit">
            <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button>登 出</button>
            </form>
        </div>
    @endif
@stop

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
        <div class="video-list">
            <div class="video-card">
                <a href="{{ route('vip.show', 1) }}">
                    <img src="{{ asset("images/sample1.jpg") }}" class="video-img">
                </a>
                <div class="content">
                    <a href="{{ route('vip.show', 1) }}">
                        <div class="title">Cinema 4D的建模和后期制作： 从头开始</div>
                    </a>
                    <div class="avatar-wrapper">
                        <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
                        <div class="info">
                            <p>Kane</p>
                            <p>视觉设计师</p>
                        </div>
                    </div>
                    <div class="level-length">
                        <div class="level primary">
                            <span class="circle"></span>基本
                        </div>
                        <div class="length">
                            <img src="{{ asset("images/icon/icon-cinestrip.png") }}" width="15" height="11">10小时56分
                        </div>
                    </div>
                    <button class="buy">
                        ￥180<img src="{{ asset("images/icon/icon-shopcart.png") }}" width="25" height="22">
                    </button>
                </div>
            </div>
            <div class="video-card">
                <a href="{{ route('vip.show', 1) }}">
                    <img src="{{ asset("images/sample2.jpg") }}" class="video-img">
                </a>
                <div class="content">
                    <a href="{{ route('vip.show', 1) }}">
                        <div class="title">3D场景艺术创作：从零开始创建</div>
                    </a>
                    <div class="avatar-wrapper">
                        <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
                        <div class="info">
                            <p>Kane</p>
                            <p>视觉设计师</p>
                        </div>
                    </div>
                    <div class="level-length">
                        <div class="level intermediate">
                            <span class="circle"></span>中级
                        </div>
                        <div class="length">
                            <img src="{{ asset("images/icon/icon-cinestrip.png") }}" width="15" height="11">4小时16分
                        </div>
                    </div>
                    <button class="buy">
                        ￥80<img src="{{ asset("images/icon/icon-shopcart.png") }}" width="25" height="22">
                    </button>
                </div>
            </div>
            <div class="video-card">
                <a href="{{ route('vip.show', 1) }}">
                    <img src="{{ asset("images/sample3.jpg") }}" class="video-img">
                </a>
                <div class="content">
                    <a href="{{ route('vip.show', 1) }}">
                        <div class="title">Cinema 4D艺术创作：机械2复活 使用After Effects后期处理</div>
                    </a>
                    <div class="avatar-wrapper">
                        <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
                        <div class="info">
                            <p>Kane</p>
                            <p>视觉设计师</p>
                        </div>
                    </div>
                    <div class="level-length">
                        <div class="level advanced">
                            <span class="circle"></span>高级
                        </div>
                        <div class="length">
                            <img src="{{ asset("images/icon/icon-cinestrip.png") }}" width="15" height="11">1小时46分
                        </div>
                    </div>
                    <button class="buy">
                        ￥70<img src="{{ asset("images/icon/icon-shopcart.png") }}" width="25" height="22">
                    </button>
                </div>
            </div>
            <div class="video-card">
                <a href="{{ route('vip.show', 1) }}">
                    <img src="{{ asset("images/sample1.jpg") }}" class="video-img">
                </a>
                <div class="content">
                    <a href="{{ route('vip.show', 1) }}">
                        <div class="title">Cinema 4D的建模和后期制作： 从头开始</div>
                    </a>
                    <div class="avatar-wrapper">
                        <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
                        <div class="info">
                            <p>Kane</p>
                            <p>视觉设计师</p>
                        </div>
                    </div>
                    <div class="level-length">
                        <div class="level primary">
                            <span class="circle"></span>基本
                        </div>
                        <div class="length">
                            <img src="{{ asset("images/icon/icon-cinestrip.png") }}" width="15" height="11">10小时56分
                        </div>
                    </div>
                    <button class="buy">
                        ￥180<img src="{{ asset("images/icon/icon-shopcart.png") }}" width="25" height="22">
                    </button>
                </div>
            </div>
            <div class="video-card">
                <a href="{{ route('vip.show', 1) }}">
                    <img src="{{ asset("images/sample2.jpg") }}" class="video-img">
                </a>
                <div class="content">
                    <a href="{{ route('vip.show', 1) }}">
                        <div class="title">3D场景艺术创作：从零开始创建</div>
                    </a>
                    <div class="avatar-wrapper">
                        <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
                        <div class="info">
                            <p>Kane</p>
                            <p>视觉设计师</p>
                        </div>
                    </div>
                    <div class="level-length">
                        <div class="level intermediate">
                            <span class="circle"></span>中级
                        </div>
                        <div class="length">
                            <img src="{{ asset("images/icon/icon-cinestrip.png") }}" width="15" height="11">4小时16分
                        </div>
                    </div>
                    <button class="buy">
                        ￥80<img src="{{ asset("images/icon/icon-shopcart.png") }}" width="25" height="22">
                    </button>
                </div>
            </div>
            <div class="video-card">
                <a href="{{ route('vip.show', 1) }}">
                    <img src="{{ asset("images/sample3.jpg") }}" class="video-img">
                </a>
                <div class="content">
                    <a href="{{ route('vip.show', 1) }}">
                        <div class="title">Cinema 4D艺术创作：机械2复活 使用After Effects后期处理</div>
                    </a>
                    <div class="avatar-wrapper">
                        <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
                        <div class="info">
                            <p>Kane</p>
                            <p>视觉设计师</p>
                        </div>
                    </div>
                    <div class="level-length">
                        <div class="level advanced">
                            <span class="circle"></span>高级
                        </div>
                        <div class="length">
                            <img src="{{ asset("images/icon/icon-cinestrip.png") }}" width="15" height="11">1小时46分
                        </div>
                    </div>
                    <button class="buy">
                        ￥70<img src="{{ asset("images/icon/icon-shopcart.png") }}" width="25" height="22">
                    </button>
                </div>
            </div>
            <div class="video-card">
                <a href="{{ route('vip.show', 1) }}">
                    <img src="{{ asset("images/sample1.jpg") }}" class="video-img">
                </a>
                <div class="content">
                    <a href="{{ route('vip.show', 1) }}">
                        <div class="title">Cinema 4D的建模和后期制作： 从头开始</div>
                    </a>
                    <div class="avatar-wrapper">
                        <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
                        <div class="info">
                            <p>Kane</p>
                            <p>视觉设计师</p>
                        </div>
                    </div>
                    <div class="level-length">
                        <div class="level primary">
                            <span class="circle"></span>基本
                        </div>
                        <div class="length">
                            <img src="{{ asset("images/icon/icon-cinestrip.png") }}" width="15" height="11">10小时56分
                        </div>
                    </div>
                    <button class="buy">
                        ￥180<img src="{{ asset("images/icon/icon-shopcart.png") }}" width="25" height="22">
                    </button>
                </div>
            </div>
            <div class="video-card">
                <a href="{{ route('vip.show', 1) }}">
                    <img src="{{ asset("images/sample2.jpg") }}" class="video-img">
                </a>
                <div class="content">
                    <a href="{{ route('vip.show', 1) }}">
                        <div class="title">3D场景艺术创作：从零开始创建</div>
                    </a>
                    <div class="avatar-wrapper">
                        <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
                        <div class="info">
                            <p>Kane</p>
                            <p>视觉设计师</p>
                        </div>
                    </div>
                    <div class="level-length">
                        <div class="level intermediate">
                            <span class="circle"></span>中级
                        </div>
                        <div class="length">
                            <img src="{{ asset("images/icon/icon-cinestrip.png") }}" width="15" height="11">4小时16分
                        </div>
                    </div>
                    <button class="buy">
                        ￥80<img src="{{ asset("images/icon/icon-shopcart.png") }}" width="25" height="22">
                    </button>
                </div>
            </div>
            <div class="video-card">
                <a href="{{ route('vip.show', 1) }}">
                    <img src="{{ asset("images/sample3.jpg") }}" class="video-img">
                </a>
                <div class="content">
                    <a href="{{ route('vip.show', 1) }}">
                        <div class="title">Cinema 4D艺术创作：机械2复活 使用After Effects后期处理</div>
                    </a>
                    <div class="avatar-wrapper">
                        <img src="{{ asset("images/icon/icon-avatar.png") }}" width="34" height="34" class="avatar">
                        <div class="info">
                            <p>Kane</p>
                            <p>视觉设计师</p>
                        </div>
                    </div>
                    <div class="level-length">
                        <div class="level advanced">
                            <span class="circle"></span>高级
                        </div>
                        <div class="length">
                            <img src="{{ asset("images/icon/icon-cinestrip.png") }}" width="15" height="11">1小时46分
                        </div>
                    </div>
                    <button class="buy">
                        ￥70<img src="{{ asset("images/icon/icon-shopcart.png") }}" width="25" height="22">
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection