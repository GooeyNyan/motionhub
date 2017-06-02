@extends('layouts.default')

@section('header-btn')
    <div class="login-btn"><a href="{{ route('login') }}">登录</a></div>
@stop

@section('content')
    <main>
        <div class="navbar">
            <div class="nav-item index"><a href="{{ route('home') }}">首页</a></div>
            <div class="nav-item categories">分类<img src="/images/icon/icon-angle.png" class="angle"></div>
            <div class="nav-item vip"><a href="vip">会员视频</a></div>
        </div>
        <div class="container-fluid">
            <div class="share">
                <div class="icon-wrapper">
                    {{-- url = http%3A%2F%2Fmotionhub.app%2F --}}
                    {{-- text = %E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0 --}}
                    <img src="/images/icon/icon-facebook.png" alt="share to facebook" class="icon-item">
                    {{-- https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="/images/icon/icon-twitter.png" alt="share to twitter" class="icon-item">
                    {{-- https://twitter.com/intent/tweet?text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&hashtags=motionhub&url=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="/images/icon/icon-linkedin.png" alt="share to linkedin" class="icon-item">
                    {{-- http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fmotionhub.app%2F&title=join%20motionhub&text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&source=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="/images/icon/icon-gplus.png" alt="share to gplus" class="icon-item">
                    {{-- https://plus.google.com/share?url=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="/images/icon/icon-pinterest.png" alt="share to pinterest" class="icon-item">
                    {{-- http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fmotionhub.app%2F&description=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&source=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="/images/icon/icon-instagram.png" alt="share to instagram" class="icon-item">
                    <img src="/images/icon/icon-weibo.png" alt="share to weibo" class="icon-item">
                    {{-- http://service.weibo.com/share/share.php?url=http%3A%2F%2Fmotionhub.app%2F&title=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0 --}}
                    <img src="/images/icon/icon-wechat.png" alt="share to wechat" class="icon-item">
                    <img src="/images/icon/icon-qzone.png" alt="share to qzone" class="icon-item">
                    {{-- http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http%3A%2F%2Fmotionhub.app%2F&title=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0 --}}
                </div>
                <div class="desc">
                    <p>分享我们</p>
                    <p>和你的朋友一起学习！</p>
                </div>
            </div>
            <div class="videos">
                <div class="hot">
                    <div class="header">
                        <h2 class="title">热门视频</h2>
                        <div class="pagination">
                            <div class="prev">
                                <img src="/images/icon/icon-arrow-left.png">
                            </div>
                            <div class="next">
                                <img src="/images/icon/icon-arrow-right.png">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="hero">
                            <div class="video-item main"></div>
                        </div>
                        <div class="other">
                            <div class="videos-wrapper">
                                <div class="video-item"></div>
                                <div class="video-item"></div>
                                <div class="video-item"></div>
                                <div class="video-item"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new">
                    <div class="header">
                        <h2 class="title">最新视频</h2>
                        <div class="pagination">
                            <div class="prev">
                                <img src="/images/icon/icon-arrow-left.png">
                            </div>
                            <div class="next">
                                <img src="/images/icon/icon-arrow-right.png">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                    </div>
                </div>
                <div class="titles">
                    <div class="header">
                        <h2 class="title">TITLES设计</h2>
                        <div class="pagination">
                            <div class="prev">
                                <img src="/images/icon/icon-arrow-left.png">
                            </div>
                            <div class="next">
                                <img src="/images/icon/icon-arrow-right.png">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                    </div>
                </div>
                <div class="showreels">
                    <div class="header">
                        <h2 class="title">SHOWREELS</h2>
                        <div class="pagination">
                            <div class="prev">
                                <img src="/images/icon/icon-arrow-left.png">
                            </div>
                            <div class="next">
                                <img src="/images/icon/icon-arrow-right.png">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                        <div class="video-item"></div>
                    </div>
                </div>
            </div>
            <div class="subscription-wrapper">
                <div class="subscription">
                    <div class="title">
                        <h2>如何成为一名数位设计师？</h2>
                    </div>
                    <div class="desc">
                        <p>作为一名设计师90%的时间都在工作。</p>
                        <p>百分之6的之间在吃喝玩乐，只有4%的学习时间。</p>
                        <p>我们愿意为那4%的学习时间服务</p>
                    </div>
                    <form action="#" method="post" class="subscription-form">
                        <button type="submit" class="subscribe-btn">免费订阅</button>
                        <div class="text-box">
                            <input type="text" placeholder="输入邮箱，订阅最新视频内容！" class="subscribe-input">
                            <img src="/images/icon/icon-envelope.png" class="icon-envelope">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@stop