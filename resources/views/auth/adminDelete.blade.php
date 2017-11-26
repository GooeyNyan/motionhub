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
                <form action="{{ route('admin.delete') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}

                    <div class="form-group">
                        <label for="name">用户</label>
                        <select name="name" class="data-ajax form-control" id="name"></select>
                    </div>

                    <div class="button-wrapper">
                        <button class="video-submit-btn" style="background-color: rgba(204, 41, 4, 0.7);">删除管理员权限</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- 实例化编辑器 -->
    <script>
        $(document).ready(function () {
            function formatTopic(user) {
                return "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'>" +
                user.name ? user.name : "</div></div></div>";
            }

            function formatTopicSelection(user) {
                return user.name || user.text;
            }

            $(".data-ajax").select2({
                placeholder: '输入用户名',
                minimumInputLength: 1,
                ajax: {
                    url: '/api/users',
                    dataType: 'json',
                    delay: 100,
                    data: function (params) {
                        return {
                            name: params.term
                        };
                    },
                    processResults: function (data) {
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
