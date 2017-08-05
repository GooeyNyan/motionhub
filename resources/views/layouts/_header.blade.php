<header>
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}">
        </a>
    </div>
    <div class="search-wrapper">
        <form action="#" method="GET" class="search-form">
            <input name="video" class="video-search" placeholder="搜索视频">
            <img src="{{ asset('images/icon/icon-search.png') }}" class="search-submit">
        </form>
        <span class="desc">例如：Photoshop, After Effects, Cinema 4D</span>
    </div>
    <param name="allowScriptAccess" value="always" />
    @yield('header-btn')
    {{--<div class="video-submit">@yield('header-btn', '提交视频')</div>--}}
</header>