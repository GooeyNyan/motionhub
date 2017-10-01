@extends('layouts.app')

@section('content')
    <div id="vip-detail">
        <span class="head">{{ $video->name }}</span>
        <div class="page">
            <div class="video">
                {!! $video->link !!}
            </div>
            <div class="right-message">
                <span class="notice">内容信息</span>
                <hr>
                <div class="circle"></div>

                <span class="grade">&nbsp;&nbsp;等级：{{ $video->rank === 1 ? '基本' : ($video->rank === 2 ? '中级' : '高级') }}</span><br><br>
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
        <span class="price">￥{{ $video->price }}</span><br>

        @if(!Auth::user()->permitted($video->id))
            <key-validator csrf="{{ csrf_token() }}"></key-validator>
        @else
            <key-validator csrf="{{ csrf_token() }}"></key-validator>
        @endif

        <button class="buy">
            <a href="{{ $video->tb_link }}" target="_blank">现在购买</a>
        </button>
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
            background-size: 100%;
            width: 100%;
            height: auto;
        }
    </style>
@endsection
