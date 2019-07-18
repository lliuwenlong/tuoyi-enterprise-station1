<template>
    <!-- <section class="nav">
        <ul>
            <li v-for="item of navList" :key='item.id'>
                <a href="/">
                    <div class="img">
                        <img :src="item.imgUrl" alt="">
                    </div>
                    <span>{{item.navText}}</span>
                </a>
            </li>
        </ul>
    </section> -->
    <section class="nav">
        <ul>
            <router-link 
                tag="li"
                v-for="item of navList" 
                :key='item.id'
                :to='item.linkUrl'
            >
                <a href="/">
                    <div class="img">
                        <img :src="item.imgUrl" alt="">
                    </div>
                    <span>{{item.navText}}</span>
                </a>
            </router-link>
        </ul>
    </section>
</template>

<script>
export default {
    name:'HomeNav',
    data() {
        return {
            navList: [{
                id:'0001',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav1.png',
                navText:'格勤介绍',
                linkUrl:'/Introduce'
            },{
                id:'0002',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav3.png',
                navText:'格勤课程',
                linkUrl:'/Course'
            },{
                id:'0003',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav2.png',
                navText:'裂变式增长',
                linkUrl:'/Increase'
            },{
                id:'0004',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav4.png',
                navText:'到答课堂',
                linkUrl:'/Class'
            },{
                id:"0005",
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav5.png',
                navText:'师资力量',
                linkUrl:'/Teachers'
            },{
                id:"0006",
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav9.png',
                navText:'客户案例',
                linkUrl:'/Case'
            },{
                id:"0007",
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav7.png',
                navText:'格勤观点',
                linkUrl:'/Viewpoint'
            },{
                id:"0008",
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav6.png',
                navText:'格勤课表',
                linkUrl:'/Timetable'
            }]
        }
    }
}
</script>

<style scoped>
    .nav {
        width: 92%;
        overflow: hidden;
        padding: 1% 4%;
        background: #FFFFFF;
        /* background: #ccc; */
        margin: 15px auto;
        box-shadow: 0px 0px 10px #cccccc;
        padding-top: 45px;
        margin-top: -64px;
    }
    .nav ul {
        width: 100%;
        overflow: hidden;
        display: flex;
        justify-content: space-around;
        flex-flow: wrap;
    }
    .nav ul li {
        width: 20%;
        overflow: hidden;
        margin: 10px 2px;
    }
    .nav ul li a {
        display: block;
    }
    .nav ul li a .img {
        padding: 0px 10px;
    }
    .nav ul li a img {
        width: 80%;
    }
    .nav ul li a span {
        display: block;
        text-align: center;
        margin-top:13px;
        font-size: 14px;
        color: black;
    }
</style>


