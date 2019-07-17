<template>    
    <div>
        <section class="news" v-for="item of newsBoxList" :key="item.id">
            <div class="news_top">
                {{ item.newsTop.h2Text}}
                <h2 style="">
                    <!-- {{ item.newsTop.h2Text}} -->
                    <span>
                        <!-- {{item.newsTop.spanText}} -->
                    </span>
                </h2>
                <a href="/">
                    更多 >
                </a>
            </div>
            <div class="news_list">
                <div class="list_top">
                    <div class="n_img">
                        <a href="/">
                            <img :src="item.firstList.listTop.imgUrl" alt="">
                        </a>
                    </div>
                    <div class="title_box" :style='item.firstList.listTop.textBg'>
                        <h2>
                            <a href="/">{{item.firstList.listTop.titleText}}</a>
                        </h2>
                        <span>{{item.firstList.listTop.spanText}}</span>
                    </div>
                </div>
                <ul>
                    <li class="news_li" v-for="Sitem of item.firstList.ListLis" :key="Sitem.id">
                        <div class="news_liLeft">
                            <div class="n_img">
                                <a href="/">
                                    <img src="http://m.igeqin.com/Upload/156205684452.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="news_liRight news_liR">
                            <h2>
                                <a href="/"></a>
                            </h2>
                            <p>          
                                <a href="/">了解更多</a>
                            </p>
                            <span >
                                {{item.firstList.Sitem.spanText}}       
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    name:'HomeNews',
    data() {
        return {
            newsBoxList: [{
                id:'0001',                        //最外层 两个新闻模块
                newsTop: {
                    // h2Bg:{
                    //     backgroundImage: url('http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ge_icon.png ')
                    // },
                    h2Text:'格勤新闻',
                    spanText:'News of Geqin',
                    moreLink:'/'
                },
                firstList: {                      //新闻列表
                    listTop: {
                        imgLink:'/',
                        imgUrl:'http://m.igeqin.com/Upload/1562751257.JPG',
                        textLink:'/',
                        titleText:'用足迹感知力量 格勤教育“沙漠BO...',
                        spanText:'2019-07-10'
                    },
                    listLis: [{
                        id:'00001',
                        liLeftLink :'/',
                        imgUrl:'http://m.igeqin.com/Upload/156205684452.jpg',
                        h2Link:'/',
                        h2Text:'为中小企业发展赋能增效 格勤加入《...',
                        pText:'2019年6月26日，第七届“中国中小企业投融资交...',
                        pLink:'/',
                        spanText:'发布时间：2019-07-02'
                    },{
                        id:'00002',
                        liLeftLink :'',
                        imgUrl:'',
                        h2Link:'',
                        h2Text:'',
                        pText:'',
                        pLink:'',
                        spanBg:'',
                        spanText:''
                    }]
                }
            },{
                id:'0002',
                
            }]
        }
    },
    methods : {
        go() {
            console.log(newsBoxList)
        }
    }
}
</script>

<style scoped>
    .news {
        width: 100%;
        overflow: hidden;
        padding: 2% 0%;
        background: #FFFFFF;
        margin: 15px auto;
        box-shadow: 0px 0px 10px #cccccc;
    }
    .news .news_top {
        width: 94%;
        margin: 0px auto;
        padding-bottom: 8px;
        display: flex;
        justify-content: space-between;
    }
    .news .news_top h2 {
        padding-left: 20px;
        font-size: 14px;
        color: #017dcc;
        display: block;
        background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ge_icon.png) no-repeat 0px;
        background-size: 8%;
    }
    .news .news_top h2 span {
        color: #707070;
    }
    .news .news_top a {
        display: block;
        width: 30%;
        text-align: right;
        font-size: 14px;
        color: #666666;
        margin-top: 2px;
    }

    .news .news_list {
        width: 100%;
        overflow: hidden;
    }
    .news .news_list .list_top {
        width: 100%;
        position: relative;
        margin-bottom: 10px;
    }
    .news .news_list .list_top .n_img {
        width: 100%;
        display: flex;
        align-items: center;
        overflow: hidden;
        height: 200px;
    }
    .news .news_list .list_top .n_img a {
        display: inline-block;
        height: 200px;
        border: 1px solid #f8f8f8;
        box-sizing: border-box;
    }
    .news .news_list .list_top .n_img img {
        width: 100%;
        font-weight: bold;
        font-size: 14px;
    }
    .news .news_list .list_top .title_box {
        width: 100%;
        height: 30px;
        background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/title_bj.png) no-repeat;
        background-size: 100%;
        position: absolute;
        bottom: -1px;
        display: flex;
        justify-content: space-between;
    }
    .news .news_list .list_top .title_box h2 {
        padding-left: 5px;
        width: 75%;
        text-align: center;
        line-height: 30px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        overflow: hidden;
    }
    .news .news_list .list_top .title_box h2 a {
        color: #FFFFFF;
        font-size: 14px;
        display: inline-block;
    }
    .news .news_list .list_top .title_box span {
        font-size: 14px;
        color: #FFFFFF;
        text-align: center;
        line-height: 30px;
        display: block;
        padding-right: 5px;
    }

    .news .news_list .news_li {
        width: 94%;
        margin: 0px auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0px;
        border-bottom: 1px solid #cccccc;
        display: flex;
        align-items: center;
    }
    .news .news_list .news_li .news_liLeft {
        width: 40%;
        overflow: hidden;
    }
    .news .news_list .news_li .news_liLeft .n_img {
        width: 100%;
        height: 100px;
        overflow: hidden;
    }
    .news .news_list .news_li .news_liLeft a {
        height: 100px;
        overflow: hidden;
        display: flex;
        align-items: center;
    }
    .news .news_list .news_li .news_liLeft a img {
        width: 100%;
        font-weight: bold;
        font-size: 14px;
    }

    .news .news_list .news_li .news_liRight {
        width: 56%;
        display: flex;
        align-content: space-between;
        flex-wrap: wrap;
    }
    .news .news_list .news_li .news_liRight h2 {
        margin-top: -3px;
        width: 100%;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        overflow: hidden;
    }
    .news .news_list .news_li .news_liRight h2 a {
        font-size: 14px;
        display: block;
        color: #333333;
    }
    .news .news_list .news_li .news_liRight p {
        margin: 10px 0px; 
        color: #666666;
        font-size: 12px;
    }
    .news .news_list .news_li .news_liRight p a {
        color: #2b5ca9;
    }
    .news .news_list .news_li .news_liRight span {
        display: block;
        font-size: 12px;
        color: #666666;
        padding-left: 13px;
        background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico5.png) no-repeat 0px;
        background-size: 8%;
    }
</style>
