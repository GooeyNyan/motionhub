<header>
    <div class="logo"><img src="/images/logo.png"></div>
    <div class="search-wrapper">
        <form action="#" method="get" class="search-form">
            <input type="text" name="video" class="video-search" placeholder="搜索视频">
            <img src="/images/icon/icon-search.png" class="search-submit">
        </form>
        <span class="desc">例如：Photoshop, After Effects, Cinema 4D</span>
    </div>
    @yield('header-btn')
    {{--<div class="video-submit">@yield('header-btn', '提交视频')</div>--}}
</header>