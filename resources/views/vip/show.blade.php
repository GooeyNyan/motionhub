@extends('layouts.app')

@section('content')
    <div class="vip logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}">
        </a>
    </div>

    <div id="vip-detail">
        <h2 class="head">{{ $video->name }}</h2>
        <div class="page">
            <div class="video">
                {!! $video->link !!}
            </div>
            <div class="right-message">
                <p class="notice">内容信息</p>
                <div class="level">
                    <div class="circle"></div>
                    <span class="grade">等级：{{ $video->rank === 1 ? '基本' : ($video->rank === 2 ? '中级' : '高级') }}</span>
                </div>
                <img src={{ asset("images/icon/icon-time.png") }} class="cd"><span
                        class="time">{{ floor($video->duration / 60)  }}小时{{ $video->duration % 60 }}分钟</span>
                <div class="page-end">
                    <span class="use">使用软件</span>
                    <hr>
                    <img src={{ asset("images/icon/icon-ae.png") }} class="ae">
                    <hr>
                    <span class="data">发布时间：&nbsp;{{ $video->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>

        <div class="pay-wrapper">
            <p class="price">￥{{ $video->price }}</p>

            @if(Auth::check() && Auth::user()->permitted($video->id))
                <netdisk disk="{{ $video->download_link }}" password="{{ $video->netdisk_key }}"></netdisk>
            @else
                <button class="buy">
                    <a href="{{ $video->tb_link }}" target="_blank">现在购买</a>
                </button>

                <key-validator csrf="{{ csrf_token() }}"></key-validator>
            @endif
        </div>

        <span class="about">关于内容</span>
        <div class="description">
            {!! $video->desc !!}
        </div>
    </div>
@endsection

@section('style')
    <style>
        body {
            background: url("../images/head.png") no-repeat;
            background-size: 100% 900px;
            width: 100%;
            height: auto;
        }
    </style>
@endsection
