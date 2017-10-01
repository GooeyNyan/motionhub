<header>
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}">
        </a>
    </div>
    <div class="search-wrapper">

        @yield('search-form')

        <span class="desc">例如：Photoshop, After Effects, Cinema 4D</span>
    </div>
    @yield('header-btn')
    {{--<div class="video-submit">@yield('header-btn', '提交视频')</div>--}}
</header>