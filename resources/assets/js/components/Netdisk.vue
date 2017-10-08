<template>
    <div class="netdisk">
        <div class="btn" @click="rotateShow">查看网盘</div>

        <div v-if="show" class="wrapper">
            <div class="validate video-submit-wrapper">
                <div class="close" @click="rotateShow">x</div>

                <div class="form-wrapper">
                    <p>
                        网盘链接：
                        <small><a :href="disk" target="_blank">百度网盘</a></small>
                    </p>
                    <p>
                        密码：
                        <small>{{ password }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "netdisk",
        props: ['disk', 'password'],
        data: () => ({
            rootURL,
            show: false,
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
            },
            rotateShow() {
                this.show = !this.show;
            }
        }
    }
</script>
