@extends('layouts.default')

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
                    <div class="register-control">
                        <label>
                            <span class="desc name">用户名</span>
                            <input type="text" name="name" class="register-input" required autofocus>
                        </label>
                    </div>
                    <div class="register-control">
                        <label>
                            <span class="desc name">邮箱</span>
                            <input type="email" name="email" class="register-input" required>
                        </label>
                    </div>
                    <div class="register-control">
                        <label>
                            <span class="desc psw">密码</span>
                            <input type="password" name="password" class="register-input" required>
                        </label>
                    </div>
                    <div class="register-control">
                        <label>
                            <span class="desc psw">确认密码</span>
                            <input type="password" name="password_confirmation" class="register-input" required>
                        </label>
                    </div>

                    <div class="button-wrapper">
                        <button type="submit" class="register_button">登录</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection