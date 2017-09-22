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

        <!-- register form -->
        <div class="form-wrapper">
            <form action="{{ route('video.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name">标题</label>
                    <input name="name" class="form-control" placeholder="标题" id="name">
                    @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                    <label for="link">视频链接</label>
                    <input name="link" class="form-control" placeholder="视频链接" id="link">
                    @if ($errors->has('link'))
                        <span class="help-block">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span>
                    @endif
                </div>

            {{-- tags --}}
            {{--<div class="form-group">--}}
            {{--<select name="topics[]" class="placeholder-multiple form-control" multiple="multiple">--}}
            {{--</select>--}}
            {{--</div>--}}

            <!-- 上传图片容器 -->
                <div class="form-group">
                    <label for="image">图片</label>
                    <script id="editor1" name="image" type="text/plain">
                        {!! old('image') !!}
                    </script>
                </div>

                <!-- 编辑器容器 -->
                <div class="form-group">
                    <label for="desc">描述</label>
                    <script id="editor2" name="desc" type="text/plain">
                        {!! old('desc') !!}
                    </script>
                </div>

                <div class="button-wrapper">
                    <button class="video-submit-btn">提交视频</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    @include('vendor.ueditor.assets')
    <!-- 实例化编辑器 -->
    <script>
        var ue1 = UE.getEditor('editor1', {
            toolbars: [
                ['insertimage']
            ],
            elementPathEnabled: false,
            enableContextMenu: false,
            autoClearEmptyNode: true,
            wordCount: false,
            imagePopup: false,
            autotypeset: {indent: true, imageBlockLine: 'center'}
        });
        ue1.ready(function () {
            ue1.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });

        var ue2 = UE.getEditor('editor2', {
            toolbars: [
                ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft', 'justifycenter', 'justifyright', 'link', 'insertimage', 'fullscreen']
            ],
            elementPathEnabled: false,
            enableContextMenu: false,
            autoClearEmptyNode: true,
            wordCount: false,
            imagePopup: false,
            autotypeset: {indent: true, imageBlockLine: 'center'}
        });
        ue2.ready(function () {
            ue2.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });


        //        tags

        //        $(document).ready(function () {
        //
        //            function formatTopic(topic) {
        //                return "<div class='select2-result-repository clearfix'>" +
        //                "<div class='select2-result-repository__meta'>" +
        //                "<div class='select2-result-repository__title'>" +
        //                topic.name ? topic.name : "Laravel" +
        //                    "</div></div></div>";
        //            }
        //
        //            function formatTopicSelection(topic) {
        //                return topic.name || topic.text;
        //            }
        //
        //            $(".placeholder-multiple").select2({
        //                tags: true,
        //                placeholder: '选择相关话题',
        //                minimumInputLength: 2,
        //                ajax: {
        //                    url: '/api/topics',
        //                    dataType: 'json',
        //                    delay: 100,
        //                    data: function (params) {
        //                        return {
        //                            q: params.term
        //                        };
        //                    },
        //                    processResults: function (data, params) {
        //                        return {
        //                            results: data
        //                        };
        //                    },
        //                    cache: true
        //                },
        //                templateResult: formatTopic,
        //                templateSelection: formatTopicSelection,
        //                escapeMarkup: function (markup) {
        //                    return markup;
        //                }
        //            });
        //        })
    </script>
@endsection
