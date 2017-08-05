@extends('layouts.app')

@section('content')
    <div id="vip-detail">
        <span class="head">3D场景艺术创作：从零开始创建</span>
        <div class="page">
            <div class="video">
                <embed height="420" width="685" quality="high" allowfullscreen="true"
                       type="application/x-shockwave-flash" src="//static.hdslb.com/miniloader.swf"
                       flashvars="aid=720011&page=1"
                       pluginspage="//www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash"></embed>
            </div>
            <div class="right-message">
                <span class="notice">内容信息</span>
                <hr>
                <div class="circle"></div>
                <span class="grade">&nbsp;&nbsp;等级：基本</span><br><br>
                <img src={{ asset("images/icon/icon-time.png") }} class="cd"><span
                        class="time">&nbsp;&nbsp;1小时18分</span>
                <div class="page-end">
                    <span class="use">使用软件</span>
                    <hr>
                    <img src={{ asset("images/icon/icon-ae.png") }} class="ae">
                    <hr>
                    <span class="data">发布时间：&nbsp;2017年x月x日</span>
                </div>
            </div>
        </div>
        <span class="price">¥188</span><br>
        <span>
        <button class="move">添加<img src={{ asset("images/icon/icon-cart.png") }}></button>
        <button class="buy">现在购买</button>
    </span><br>
        <span class="about">关于内容</span>
        <div class="description">
            <hr>
            从事品牌创建工作10年，<br>善于结合艺术与商业，<br> 创造独特的视觉语言表达。<br> 通过品牌塑造，<br> 搭建品牌与消费者间独特的沟通桥梁。<br>在集团品牌，产品品牌，<br>消费零售品牌等方便有着丰富的经验。<br><br>
            从事品牌创建工作10年，<br> 善于结合艺术与商业， <br>创造独特的视觉语言表达。 <br>通过品牌塑造， <br>搭建品牌与消费者间独特的沟通桥梁。<br>在集团品牌，产品品牌，<br>消费零售品牌等方便有着丰富的经验。<br>
            <img src={{ asset("images/end.png") }} class="end-pic">
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
