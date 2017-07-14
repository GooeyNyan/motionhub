@extends('layouts.default')

@section('header-btn')
    @if(!\Auth::check())
        <div class="login-btn"><a href="{{ route('login') }}">登录</a></div>
    @else
        <div class="video-submit"><a href="">提交视频</a></div>
    @endif
@stop

@section('content')
    @include('layouts._header')
    <main id="index">
        <div class="navbar">
            <div class="nav-item index"><a href="{{ route('home') }}">首页</a></div>
            <div class="nav-item categories">分类<img src="{{ asset('images/icon/icon-angle.png') }}" class="angle"></div>
            <div class="nav-item vip"><a href="vip">会员视频</a></div>
        </div>
        <div class="container-fluid">
            <div class="share">
                <div class="icon-wrapper">
                    {{-- url = http%3A%2F%2Fmotionhub.app%2F --}}
                    {{-- text = %E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0 --}}
                    <img src="{{ asset('images/icon/icon-facebook.png') }}" alt="share to facebook" class="icon-item">
                    {{-- https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="{{ asset('images/icon/icon-twitter.png') }}" alt="share to twitter" class="icon-item">
                    {{-- https://twitter.com/intent/tweet?text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&hashtags=motionhub&url=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="{{ asset('images/icon/icon-linkedin.png') }}" alt="share to linkedin" class="icon-item">
                    {{-- http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fmotionhub.app%2F&title=join%20motionhub&text=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&source=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="{{ asset('images/icon/icon-gplus.png') }}" alt="share to gplus" class="icon-item">
                    {{-- https://plus.google.com/share?url=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="{{ asset('images/icon/icon-pinterest.png') }}" alt="share to pinterest" class="icon-item">
                    {{-- http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fmotionhub.app%2F&description=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0&source=http%3A%2F%2Fmotionhub.app%2F --}}
                    <img src="{{ asset('images/icon/icon-instagram.png') }}" alt="share to instagram" class="icon-item">
                    <img src="{{ asset('images/icon/icon-weibo.png') }}" alt="share to weibo" class="icon-item">
                    {{-- http://service.weibo.com/share/share.php?url=http%3A%2F%2Fmotionhub.app%2F&title=%E5%88%86%E4%BA%ABmotionhub%EF%BC%8C%E5%92%8C%E6%9C%8B%E5%8F%8B%E4%BB%AC%E4%B8%80%E8%B5%B7%E5%AD%A6%E4%B9%A0 --}}
                    <img src="{{ asset('images/icon/icon-wechat.png') }}" alt="share to wechat" class="icon-item">
                    <img src="{{ asset('images/icon/icon-qzone.png') }}" alt="share to qzone" class="icon-item">
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
                                <img src="{{ asset('images/icon/icon-arrow-left.png') }}">
                            </div>
                            <div class="next">
                                <img src="{{ asset('images/icon/icon-arrow-right.png') }}">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="hero">
                            <div class="video-item main">
                                <div class="title">After Effects</div>
                            </div>
                        </div>
                        <div class="other">
                            <div class="videos-wrapper">
                                <div class="video-item">
                                    <div class="title">Cinema 4D</div>
                                </div>
                                <div class="video-item">
                                    <div class="title">3D Max</div>
                                </div>
                                <div class="video-item">
                                    <div class="title">Maya</div>
                                </div>
                                <div class="video-item">
                                    <div class="title">Houdini</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new">
                    <div class="header">
                        <h2 class="title">最新视频</h2>
                        <div class="pagination">
                            <div class="prev">
                                <img src="{{ asset('images/icon/icon-arrow-left.png') }}">
                            </div>
                            <div class="next">
                                <img src="{{ asset('images/icon/icon-arrow-right.png') }}">
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
                                <img src="{{ asset('images/icon/icon-arrow-left.png') }}">
                            </div>
                            <div class="next">
                                <img src="{{ asset('images/icon/icon-arrow-right.png') }}">
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
                                <img src="{{ asset('images/icon/icon-arrow-left.png') }}">
                            </div>
                            <div class="next">
                                <img src="{{ asset('images/icon/icon-arrow-right.png') }}">
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
                            <img src="{{ asset('images/icon/icon-envelope.png') }}" class="icon-envelope">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="video-container">
            <div class="video-watching"></div>
        </div>

    </main>

    <script src="http://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script>
        let mockData;

        function init() {
            $.getJSON("mockVideos.json", (data) => {
                mockData = data;
                let videoTags = ['hot', 'new', 'titles', 'showreels'];
                for (let tag of videoTags) {
                    let videoList = document.getElementsByClassName(tag)[0];
                    let videos = videoList.getElementsByClassName('video-item');
                    let i = 0;
                    let mockTag = "hot";

                    for (let video of videos) {
                        let mockIndex = i < mockData[mockTag].length ? i : mockData[mockTag].length - 1;
                        let img = document.createElement('img');
                        img.src = mockData[mockTag][mockIndex].image;
                        video.onclick = videoWatch;
                        video.dataset.index = i++;
                        video.dataset.tag = tag;
                        video.appendChild(img);
                    }
                }
            });
        }

        function videoWatch() {
            console.log(this.dataset.index);

            let videoContainer = document.getElementsByClassName('video-container')[0];
            let videoWatching = videoContainer.getElementsByClassName('video-watching')[0];
            let videoTag = this.dataset.tag;
            let videoIndex = this.dataset.index;
            videoTag = 'hot';
            videoIndex = videoIndex >= mockData[videoTag].length ? mockData[videoTag].length - 1 : videoIndex;

            videoContainer.style.zIndex = 100;

            videoWatching.innerHTML = mockData[videoTag][videoIndex].url;
            console.log(mockData[videoTag][videoIndex].title);
            videoContainer.onclick = function () {
                videoWatching.innerHTML = '';
                videoContainer.style.zIndex = -100;
            }
        }

        window.onload = init();
    </script>
@stop