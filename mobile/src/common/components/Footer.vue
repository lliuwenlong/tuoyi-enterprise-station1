<template>
    <div>
        <section class="bottom_nav">
            <router-link 
                tag="a"
                v-for="item of navList" 
                :key='item.id'
                :to='item.linkUrl'
            >
                {{item.navText }}
            </router-link>
            <!-- <a href="/?wxref=mp.weixin.qq.com">首页</a> | -->
        </section>
        <section class="wrapper">
            <div class="wrapper_left"><a href="http://www.igeqin.com"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/logo2.png"/></a></div>
            <div class="wrapper_right">
                <p>网站备案号:京ICP备16042441号   Copyright©2018  </p>
                <p>版权所有:北京格勤世纪教育科技有限公司 </p>
            </div>
        </section>
        <div class="kong"></div>
        <footer id="footer">
            <nav>
                <router-link
                    tag="a"
                    v-for="item of btmNav" 
                    :key='item.id'
                    :to='item.linkUrl'
                    :herf = 'item.aHerf'
                >
                    <div class="nac-img">
                        <img :src="item.imgUrl"/>
                    </div>
                    <span>{{item.navText}}</span>
                </router-link>
                <!-- <a href="/?wxref=mp.weixin.qq.com">
                    <div class="nac-img">
                        <img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico6s.png"/>
                    </div>
                    <span>首页</span>
                </a> -->
                
            </nav>
        </footer>
    </div>
</template>

<script>
export default {
    name:'CommonFooter',
    data() {
        return {
            navList: [{
                id:'0001',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav1.png',
                navText:'首页',
                linkUrl:'/'
            },{
                id:'0002',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav1.png',
                navText:'格勤介绍',
                linkUrl:'/Introduce'
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
                navText:'渠道加盟',
                linkUrl:'/Viewpoint'
            },{
                id:"0008",
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/nav7.png',
                navText:'格勤观点',
                linkUrl:'/Viewpoint'
            }],
            btmNav:[{
                id:'00001',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico6s.png',
                navText:'首页',
                linkUrl:'/',
                aHerf:''
            },{
                id:'00003',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico7s.png',
                navText:'裂变式增长',
                linkUrl:'/Increase',
                aHerf:''
            },{
                id:'00004',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico8s.png',
                navText:'到答课堂',
                linkUrl:'/Class',
                aHerf:''
            },{
                id:'00000',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico9s.png',
                navText:'到答课堂',
                linkUrl:'/Class',
                aHerf:'tel:4008880319'
            }]
        }
    }
}
</script>


<style scoped>
    .bottom_nav {
        width: 94%;
        padding: 2% 3%;
        color: #FFFFFF;
        background: #535353;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-top: 30px;
    }
    .bottom_nav a {
        color: #FFFFFF;
        font-size: 12px;
        line-height: 18px;
        display: block;
        width: 24%;
        text-align: center;

        border-left: 2px solid #FFF;
        margin-bottom: 3px;
    }
    .bottom_nav a:nth-child(1),.bottom_nav a:nth-child(5){
        border: 0 none;
    }
    .wrapper {
        width: 94%;
        margin: 0px auto;
        background: #FFFFFF;
        padding: 3%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .wrapper .wrapper_left {
        width: 25%;
        padding-right: 2%;
        border-right: 1px solid #9c9c9c;
    }
    .wrapper .wrapper_left img {
        width: 100%;
    }
    .wrapper .wrapper_right {
        width: 72%;
        padding-left: 2%;
    }
    .wrapper .wrapper_right p {
        font-size: 10px;
        color: #666666;
    }
    .kong {
        width: 100%;
        height: 60px;
    }




    #footer nav {
        width: 100%;
        background: #FFFFFF;
        position: fixed;
        bottom: 0px;
        box-shadow: 0px 0px 5px #999999;
        z-index: 66;
    }
    #footer nav a {
        display: block;
        width: 25%;
        text-align: center;
        font-size: 7.5px;
        color: white;
        margin: 0px;
        padding: 0px;
        float: left;
        padding: 5px 0px;
        height: 50px;
    }
    #footer nav a .nac-img {
        width: 100%;
        height: 20px;
    }
        #footer nav a .nac-img img {
        width: 30%;
        margin: 0px auto;
        display: block;
    }
    #footer nav a span {
        color: #999999;
        line-height: 15px;
        font-size: 15px;
    }
</style>

