@extends('layouts.default')

@section('content')
    <div class="signin-container">
        <div class="signin_wrapper">
            <!-- logo -->
            <div class="logo">
                <img src="{{ asset('images/logo-2.png') }}" alt="motionhub logo">
            </div>

            <!-- signin form -->
            <div class="form-wrapper">
                <form action="#" method="post">
                    {{ csrf_field() }}
                    <div class="signin-control">
                        <label>
                            <span class="desc name">用户名</span>
                            <input name="name" class="signin-input" required autofocus>
                        </label>
                    </div>
                    <div class="signin-control">
                        <label>
                            <span class="desc psw">密码</span>
                            <input type="password" name="password" class="signin-input" required>
                        </label>
                    </div>
                    {{--<div>--}}
                        {{--<div class="checkbox">--}}
                            {{--<label>--}}
                                {{--<input type="checkbox" name="is_remember"> 记住我--}}
                            {{--</label>--}}
                        {{--</div>--}}
                        <div class="signin_links">
                            <div class="link-wrapper">
                                <a href="#">忘记密码?</a>
                            </div>
                            <div class="link-wrapper">
                                <a href="{{ route('register') }}">注册账号</a>
                            </div>
                        </div>
                    {{--</div>--}}
                    <div class="button-wrapper">
                        <button type="submit" class="signin_button">登录</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection