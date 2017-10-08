@extends('layouts.app')

@section('content')
    <div class="video-submit-container">
        <div class="video-submit-wrapper">
            <!-- logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-2.png') }}" alt="motionhub logo">
                </a>
            </div>

            <!-- create form -->
            <div class="form-wrapper">
                <form action="{{ route('subscribe.send') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('template') ? 'has-error' : ''}}">
                        <label for="template">邮件模板</label>
                        <input name="template" class="form-control" placeholder="调用名称，如：motionhub_register" id="template">
                        @if ($errors->has('template'))
                            <span class="help-block">
                                <strong>{{ $errors->first('template') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="button-wrapper">
                        <button class="video-submit-btn">群发邮件</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection