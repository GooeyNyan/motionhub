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
                <form action="{{ route('vip.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label for="name">标题</label>
                        <input name="name" class="form-control" placeholder="标题" id="name" required="required">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('rank') ? 'has-error' : ''}}">
                        <label for="rank">等级</label>
                        <input type="number" name="rank" class="form-control" placeholder="1, 2, 3" id="rank" required="required">
                        @if ($errors->has('rank'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rank') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
                        <label for="duration">视频时长</label>
                        <input name="duration" class="form-control" placeholder="02:12" id="duration" required="required">
                        @if ($errors->has('duration'))
                            <span class="help-block">
                                <strong>{{ $errors->first('duration') }}</strong>
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

                    <div class="form-group {{ $errors->has('avId') ? 'has-error' : ''}}">
                        <label for="avId">B站av号</label>
                        <input name="avId" class="form-control" placeholder="或者提交B站AV号" id="avId">
                        @if ($errors->has('avId'))
                            <span class="help-block">
                                <strong>{{ $errors->first('avId') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                        <label for="price">价格</label>
                        <input type="number" name="price" class="form-control" placeholder="价格" id="price" required="required">
                        @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('tb_link') ? 'has-error' : ''}}">
                        <label for="tb_link">淘宝链接</label>
                        <input name="tb_link" class="form-control" placeholder="淘宝链接" id="tb_link" required="required">
                        @if ($errors->has('tb_link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tb_link') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('download') ? 'has-error' : ''}}">
                        <label for="download">下载链接</label>
                        <input name="download" class="form-control" placeholder="下载链接" id="download" required="required">
                        @if ($errors->has('download'))
                            <span class="help-block">
                                <strong>{{ $errors->first('download') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('netdisk_key') ? 'has-error' : ''}}">
                        <label for="netdisk_key">网盘密码</label>
                        <input name="netdisk_key" class="form-control" placeholder="可空" id="netdisk_key">
                        @if ($errors->has('netdisk_key'))
                            <span class="help-block">
                                <strong>{{ $errors->first('netdisk_key') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- tags --}}
                    <div class="form-group">
                        <label for="tag">标签</label>
                        <select name="tags[]" class="placeholder-multiple form-control" multiple="multiple"
                                id="tag"></select>
                    </div>

                    <!-- 上传图片容器 -->
                    <div class="form-group">
                        <label for="image">图片</label>
                        <script id="editor1" name="image" type="text/plain">
                            {!! old('image') !!}
                        </script>
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image    ') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- 编辑器容器 -->
                    <div class="form-group">
                        <label for="desc">描述</label>
                        <script id="editor2" name="desc" type="text/plain">
                            {!! old('desc') !!}
                        </script>
                    </div>

                    <div class="button-wrapper">
                        <button class="video-submit-btn">提交会员视频</button>
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


        // select 2
        $(document).ready(function () {
            $('.js-example-basic-single').select2();

            function formatTopic(topic) {
                return "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'>" +
                topic.name ? topic.name : "Laravel" +
                    "</div></div></div>";
            }

            function formatTopicSelection(topic) {
                return topic.name || topic.text;
            }

            $(".placeholder-multiple").select2({
                tags: true,
                placeholder: '选择相关标签',
                minimumInputLength: 2,
                ajax: {
                    url: '/api/tags',
                    dataType: 'json',
                    delay: 100,
                    data: function (params) {
                        return {
                            tag: params.term
                        };
                    },
                    processResults: function (data, params) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                templateResult: formatTopic,
                templateSelection: formatTopicSelection,
                escapeMarkup: function (markup) {
                    return markup;
                }
            });
        })
    </script>
@endsection
