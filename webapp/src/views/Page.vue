<template>
    <div>
        <!--视频 autoplay="autoplay"-->
        <video :src="current.path" controls="controls" :poster="lesson.preview"></video>
        <h1>{{lesson.title}}</h1>

        <ul id="list">
            <li class="cur" v-for="v in videos"><a href="" @click.prevent="play(v)">{{v.title}}</a></li>
        </ul>
        <a @click.prevent="back()">
            <i class="glyphicon glyphicon-hand-left"></i>
        </a>
    </div>
</template>

<script>
    export default {
        name: "page",
        mounted() {
            let lessonId = this.$route.params.lessonId;
            this.axios.get('http://laravideo.paprikalang.tk/api/videos/' + lessonId).then(response => {
                this.videos = response.data.data;
                this.current = this.videos[0];
            });
            this.axios.get('http://laravideo.paprikalang.tk/api/lesson/' + lessonId).then(response => {
                this.lesson = response.data.data[0];
            });
        },
        data() {
            return {
                current: {},
                lesson: {},
                videos:[],
            }
        },
        methods: {
            play(video){
                this.current = video;
            },
            back() {
                this.$router.back();
            }

        }
    }
</script>

<style scoped>
    video[poster] {
        object-fit: cover;
    }
    * {
        padding: 0;
        margin: 0;
        color: #31343B;
    }
    a {
        text-decoration: none;
        color: #31343B;
    }
    li {
        list-style: none;
    }
    body {
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        /*padding-bottom: 15%;*/
    }
    /*底部固定导航*/
    #bottom {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        display: flex;
        background: #FFFFFF;
        margin: 0;
    }
    #bottom li {
        width: 50%;
        box-sizing: border-box;
    }
    #bottom li i.iconfont {
        color: #888;
        font-size: 6vw;
        display: block;
        text-align: center;
    }
    #bottom li span {
        font-size: 2.6vw;
        display: block;
        text-align: center;
        color: #888;
    }
    #bottom li.cur {
        /*background: #333;*/
    }
    #bottom li.cur i.iconfont {
        color: #333;
    }
    #bottom li.cur span {
        color: #333;
    }
    /*底部固定导航结束*/
    video {
        width: 100%;
    }
    h1 {
        font-size: 4.5vw;
        line-height: 2em;
        color: #31343B;
        text-indent: 2em;
        margin: 0;
        font-weight: 700;
    }
    #list {
        /*width: 92%;*/
        /*margin: 0 auto;*/
        border-top: #EFEFF4 5px solid;
        padding-top: 2%;
    }
    #list li a {
        font-size: 3.8vw;
        color: #666;
        line-height: 2.8em;
        display: block;
        margin-left: 6%;
        border-left: 1px dotted #999;
        text-indent: 1em;
        position: relative;
    }
    #list li a:before {
        content: '';
        width: 10px;
        height: 10px;
        background: #ccc;
        position: absolute;
        left: -6px;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 50%;
    }
    #list li.cur a {
        color: #333;
        font-weight: 700;
    }
    .glyphicon-hand-left {
        font-size: 9vw;
        color: #B78E36;
        position: fixed;
        right: 5%;
        top: 93%;
    }
</style>