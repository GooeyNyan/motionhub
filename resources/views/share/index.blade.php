@extends('layouts.app')

@section('content')
    <div class="video-share-container">
        <div class="video-share-wrapper">
            <!-- logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-2.png') }}" alt="motionhub logo">
                </a>
            </div>
        </div>

        @foreach($shares as $share)
            <div class="video-share-wrapper">
                <div class="share-item">
                    <p>{{ $share->name }}</p>
                    <p>{{ $share->link }}</p>
                    <p>{!! $share->desc !!}</p>
                    <p>{{ $share->user_name }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection