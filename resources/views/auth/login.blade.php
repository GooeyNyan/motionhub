@extends('layouts.app')

@section('content')
    <div class="signin-container">
        <div class="signin_wrapper">
            <!-- logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-2.png') }}" alt="motionhub logo">
                </a>
            </div>

            <!-- signin form -->
            <div class="form-wrapper">
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="signin-control{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>
                            <span class="desc name">用户名</span>
                            <input name="name" class="signin-input" value="{{ old('name') }}" required autofocus>
                        </label>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="signin-control{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>
                            <span class="desc psw">密码</span>
                            <input type="password" name="password" class="signin-input" required>
                        </label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="signin_links">
                        <div class="link-wrapper">
                            <a href="{{ route('password.request') }}">忘记密码?</a>
                        </div>
                        <div class="link-wrapper">
                            <a href="{{ route('register') }}">注册账号</a>
                        </div>
                    </div>
                    <div class="button-wrapper">
                        <button class="signin_button">登录</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
