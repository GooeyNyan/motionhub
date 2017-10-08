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
                <p class="key">激活码为 <span>{{ $key }}</span></p>
            </div>
        </div>
    </div>
@endsection
