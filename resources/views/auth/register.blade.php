@extends('layouts.app')

@section('content')
    <div class="register-container">
        <div class="register_wrapper">
            <!-- logo -->
            <div class="logo">
                <img src="{{ asset('images/logo-2.png') }}" alt="motionhub logo">
            </div>

            <!-- register form -->
            <div class="form-wrapper">
                <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="register-control{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>
                            <span class="desc name">用户名</span>
                            <input name="name" class="register-input" value="{{ old('name') }}" required autofocus>
                        </label>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="register-control{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>
                            <span class="desc name">邮箱</span>
                            <input type="email" name="email" value="{{ old('email') }}" class="register-input" required>
                        </label>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="register-control{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>
                            <span class="desc psw">密码</span>
                            <input type="password" name="password" class="register-input" required>
                        </label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="register-control{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>
                            <span class="desc psw">确认密码</span>
                            <input type="password" name="password_confirmation" class="register-input" required>
                        </label>
                    </div>

                    <div class="button-wrapper">
                        <button class="register_button">注册</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
