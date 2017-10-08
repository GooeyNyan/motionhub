<template>
    <div class="video-card">
        <a :href="rootURL + 'vip/' + video.id">
            <img :src="rootURL + video.image" class="video-img">
        </a>
        <div class="content">
            <a :href="rootURL + 'vip/' + video.id">
                <div class="title">{{ video.name }}</div>
            </a>
            <div class="avatar-wrapper">
                <img v-if="!!user" :src="user.avatar" width="34" height="34" class="avatar">
                <div v-if="!!user" class="info">{{ user.name }}</div>
            </div>
            <div class="level-length">
                <div class="level" :class="rank()">
                    <span class="circle"></span>
                    <span class="text">{{ rankText() }}</span>
                </div>
                <div class="length">
                    <img :src="rootURL + 'images/icon/icon-cinestrip.png'" width="15" height="11">
                    <span class="time"> {{ duration() }}</span>
                </div>
            </div>
            <div class="btn-wrapper" :class="{ active: admin == 'true' }">
                <button v-if="admin == 'true'" class="btn edit">
                    <a :href="rootURL + 'vip/' + video.id + '/edit'">编辑</a>
                </button>
                <button v-if="admin == 'true'" class="btn key">
                    <a :href="'/vip/' + video.id + '/key'" target="_blank">激活码</a>
                </button>
                <button class="btn buy">
                    <a :href="video.tb_link" target="_blank">
                        ￥{{ video.price }}<img :src="rootURL + 'images/icon/icon-shopcart.png'" width="25" height="22">
                    </a>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['video', 'admin'],
        name: "videoItem",
        data: () => ({
            rootURL,
            user: null
        }),
        methods: {
            rank() {
                const rank = this.video.rank;
                return rank === 1 ? 'primary' : rank === 2 ? 'intermediate' : 'advanced';
            },
            rankText() {
                const rank = this.video.rank;
                return rank === 1 ? '基本' : rank === 2 ? '中级' : '高级';
            },
            duration() {
                const duration = this.video.duration;
                const hours = Math.floor(duration / 60);
                const minutes = duration % 60;
                return `${hours}小时${minutes}分钟`;
            },
            getUser(id) {
                axios.get(`${apiRoot}user`, {params: {id: id,}})
                    .then(response => {
                        this.user = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },
        created() {
            this.getUser(this.video.user_id);
        }
    }
</script>
