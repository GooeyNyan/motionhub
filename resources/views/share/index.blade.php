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
                    <div class="info-wrapper">
                        <small>标题:</small>
                        <p>{{ $share->name }}</p>
                    </div>
                    <div class="info-wrapper">
                        <small>链接:</small>
                        <p>{{ $share->link }}</p>
                    </div>
                    <div class="info-wrapper">
                        <small>描述:</small>
                        <p>{!! $share->desc !!}</p>
                    </div>
                    <div class="info-wrapper">
                        <small>分享自:</small>
                        <p>{{ $share->user_name }}</p>
                    </div>
                </div>
                <div class="delete-btn">
                    <form action="{{ route('share.destroy', $share->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button>删除视频</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection