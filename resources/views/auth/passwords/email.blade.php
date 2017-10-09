@extends('layouts.app')

@section('content')
    <div class="register-container">
        <div class="register_wrapper">
            <!-- logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-2.png') }}" alt="motionhub logo">
                </a>
            </div>

            <!-- register form -->
            <div class="form-wrapper">
                <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }}
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
                    <div class="button-wrapper">
                        <button class="register_button">发送重置密码链接</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
