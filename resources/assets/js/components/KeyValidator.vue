<template>
    <div class="validator">
        <div class="btn" @click="start">验证激活</div>

        <div v-if="show" class="wrapper">
            <div class="validate video-submit-wrapper">
                <div class="close" @click="stop">x</div>

                <!-- create form -->
                <div class="form-wrapper">
                    <form :action="rootURL + 'vip/validate'" method="POST">
                        <input type="hidden" name="_token" :value="csrf">

                        <div class="form-group">
                            <label for="key">激活码</label>
                            <input name="key" class="form-control" placeholder="请输入您的key" id="key">
                        </div>
                        <input type="hidden" name="video_id" :value="getVideoId()">

                        <div class="button-wrapper">
                            <button class="video-submit-btn">验证</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "keyValidator",
        props: ['csrf'],
        data: () => ({
            rootURL,
            show: false
        }),
        methods: {
            getVideoId() {
                const pieces = location.href.split('/');
                return pieces[pieces.length - 1];
            },
            start() {
                this.show = true;
            },
            stop() {
                this.show = false;
            }
        }
    }
</script>
