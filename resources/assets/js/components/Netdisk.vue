<template>
    <div class="netdisk">
        <div class="netdisk-btn" @click="start">查看网盘</div>

        <div v-if="show" class="netdisk-wrapper">
            <div class="netdisk video-submit-wrapper">
                <div class="close" @click="stop">x</div>

                <p></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "netdisk",
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
