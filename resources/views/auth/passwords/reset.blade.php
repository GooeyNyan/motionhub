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
                <form action="{{ route('password.request') }}" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="register-control{{ $errors->has('email') ? ' has-error' : '' }}">
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
                    <div class="register-control{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>
                            <span class="desc psw">密码</span>
                            <input type="password" name="password" minlength='6' maxlength='100' class="register-input" required>
                        </label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="register-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label>
                            <span class="desc psw">确认密码</span>
                            <input type="password" name="password_confirmation" minlength='6' maxlength='100' class="register-input" required>
                        </label>
                        @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                    </div>

                    <div class="button-wrapper">
                        <button class="register_button">重置密码</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
