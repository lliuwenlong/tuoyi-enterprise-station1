<template>
    <section class="local">
		<div class="local_top wow fadeInDownBig" data-wow-delay="0.01s">
			<h2>{{NewsContent.localTopH2}}<span>{{NewsContent.localTopSpan}}</span></h2>
			<!-- <a href="/geqinNews.html?wxref=mp.weNews of Geqinixin.qq.com">更多 ></a> -->
            <router-link tag="a" :to='NewsContent.localTopMore'>更多 ></router-link>
		</div>
		<div class="news_geqin">
			<div class="news_top">
                <div class="n_img">
                    <router-link :to="NewsContent.newsTopLink">
                        <img :src="NewsContent.newsTopImgUrl" alt="用足迹感知力量 格勤教育“沙漠BOSS能量秘训”再燃激情  ">
                    </router-link>
                </div>
                <div class="title_box">
                    <h2>
                        <router-link :to="NewsContent.titleBoxLink">{{NewsContent.titleBoxText}}</router-link>
                    </h2>
                    <span>{{NewsContent.titleBoxTime}}</span>
                </div>
			</div>
            <div class="news_li"
                v-for="item of NewsContent.newsLis"
                :key="item.id"
            >
                <div class="news_liLeft">
                    <div class="n_img">
                        <router-link :to="item.newsLeftLink">
                            <img :src="item.newsLeftImgUrl" alt="为中小企业发展赋能增效 格勤加入《中国中小企业培训服务联盟》" style="font-weight: bold;font-size: 1.6rem;font-size: 16px;"/>
                        </router-link>
                </div>
                </div>
                <div class="news_liRight news_liR"> 
                    <h2>
                        <router-link :to="item.newsRightLink">{{item.newsRightLinkText}}</router-link>
                    </h2>
                    <p>{{item.newsRightText}}
                        <router-link :to="item.newsRightLink">了解更多</router-link>
                    </p>
                    <span>{{item.newsRightTime}}</span>
                </div>
            </div>
            		
        </div>
	</section>
</template>

<script>
export default {
    name:'HomeListCase',
    data() {
        return {
            NewsContent: {
                localTopH2:'客户案例/',
                localTopSpan:'Customer case',
                localTopMore:'./Case',
                newsTopLink: '/CommonNews',
                newsTopImgUrl: 'http://m.igeqin.com/Upload/1553221352.png',
                titleBoxLink:'/CommonNews',
                titleBoxImgUrl:'',
                titleBoxText:'烟台希雅斯葡萄酒有限公司 ',
                titleBoxTime:'2019-07-11',
                newsLis:[{
                    id:'0001',
                    newsLeftLink:'/CommonNews',
                    newsLeftImgUrl:'http://m.igeqin.com/Upload/1553221089.png',
                    newsRightLink:'/CommonNews',
                    newsRightLinkText:'为中小企业发展赋能增效 格勤加入《...',
                    newsRightText:'2019年6月26日，第七届“中国中小企业投融资交...',
                    newsRightTime:'发布时间：2019-07-02'

                },{
                    id:'0002',
                    newsLeftLink:'/CommonNews',
                    newsLeftImgUrl:'http://m.igeqin.com/Upload/1553219486.png',
                    newsRightLink:'/CommonNews',
                    newsRightLinkText:'构建裂变基因 格勤第89期《裂变式...',
                    newsRightText:'2019年6月30日，格勤教育第89期《裂变式增长...',
                    newsRightTime:'发布时间：2019-07-10'
                }]
            }
        }
    }
}
</script>
    
<style>
    .local {
        width: 100%;
        overflow: hidden;
        padding: 2% 0%;
        background: #FFFFFF;
        margin: 15px auto;
        box-shadow: 0px 0px 10px #cccccc;
        /* form */
        }
        .local .local_top {
        width: 94%;
        height: 45px;
        line-height: 45px;
        margin: 0px auto;
        padding-bottom: 8px;
        display: flex;
        justify-content: space-between;
        /* border: 1px solid red; */
        }
        .local .local_top h2 {
            padding-left: 33px;
            font-size: .35rem;
            color: #017dcc;
            display: block;
            background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico3.png) no-repeat 0px;
            background-size: 8%;
        }
        .local .local_top h2 span {
            color: #707070;
        }
        .local .local_top .case_icon {
            background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico3.png) no-repeat 0px;
            background-size: 8%;
        }
        .local .local_top .h23 {
            background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/icn4.png) no-repeat 0px;
            background-size: 7%;
        }
        .local .local_top a {
            display: block;
            width: 30%;
            text-align: right;
            font-size: 1.2rem;
            font-size:15px;
            color: #666666;
            margin-top: 2px;
        }
        .local .news_geqin {
            width: 100%;
            overflow: hidden;
        }
        .local .news_geqin .news_top {
            width: 100%;
            /* position: relative; */
            margin-bottom: 15px;
        }
        .local .news_geqin .news_top .n_img {
            width: 100%;
            /* display: flex; */
            /* align-items: center; */
            overflow: hidden;
            height: 380px;
        }
        .local .news_geqin .news_top .n_img a{
            display: inline-block;
            height: 200px;
            border: 1px solid #f8f8f8;
            box-sizing: border-box;
        }
        .local .news_geqin .news_top .n_img img {
            /* width: 100%; */
            position: absolute;
            top:0;
            overflow: hidden;
        }
        .local .news_geqin .news_top .title_box {
            width: 100%;
            height: 60px;
            background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/title_bj.png) no-repeat;
            background-size: 100%;
            position: absolute;
            bottom: -12px;
            display: flex;
            justify-content: space-between;
            
        }
        .local .news_geqin .news_top .title_box h2 {
            padding-left: 5px;
            width: 75%;
            text-align: center;
            line-height: 60px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            overflow: hidden;
            font-weight: 700;
        }
        .local .news_geqin .news_top .title_box h2 a{
            color: #FFFFFF;
            font-size: 1.3rem;
            font-size:13px;
            display: inline-block;
        }
        .local .news_geqin .news_top .title_box span {
            font-size: 1.3rem;
            font-size:13px;
            color: #FFFFFF;
            text-align: center;
            line-height: 60px;
            display: block;
            padding-right: 10px;
        }
        .local .news_geqin .news_li {
            width: 100%;
            margin: 0 auto;
            display: flex;
            position: relative;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0px;
            border-bottom: 1px solid #cccccc;
            display: flex;
            align-items: center;
            background: #f8f8f8;
        }
        .local .news_geqin .news_li .news_liLeft {
            width: 40%;
            overflow: hidden;
        }
        .local .news_geqin .news_li .news_liLeft .n_img {
            width: 90%;
            height:180px;
            /* border:5px solid #000; */
            margin-left: 5%;
            overflow: hidden;
        }
        .local .news_geqin .news_li .news_liLeft .n_img a{
            display: inline-block;
            height: 100px;
            overflow:visible;
            display: flex;
            align-items: center;
        }
        .local .news_geqin .news_li .news_liLeft .n_img img {
            width: 100%;
            margin-top:100px;
        }
        .local .news_geqin .news_li .news_liRight {
            width: 55%;
            margin: 0 auto;
            display: flex;
            margin-top:15px;
            align-content: space-between;
            flex-wrap: wrap;
            /* border: 1px solid red; */
        }
        .local .news_geqin .news_li .news_liRight h2 {
            width: 100%;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            /* overflow: hidden; */
            padding: 13px 0 13px 0;
            font-weight: 700;
        }
        .local .news_geqin .news_li .news_liRight h2 a{
            font-size: 1.4rem;
            font-size: 14px;
            display: block;
            color: #333333;
        }
        .local .news_geqin .news_li .news_liRight p {
            font-size: 1.2rem;
            font-size:12px;
            line-height: 38px;
            margin: 3px 0px;
            color: #666666;
        }
        .local .news_geqin .news_li .news_liRight  a {
        color: #2b5ca9;

        }
        .local .news_geqin .news_li .news_liRight span {
            display: block;
            font-size: 1.2rem;
            font-size: 12px;
            color: #666666;
            padding-left: 30px;
            background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico5.png) no-repeat 0px;
            background-size: 8%;
        }
        .local .news_geqin .news_li .news_liR p {
        margin: 12px 0px;
        }
        .local .news_geqin .case_li .news_liRight p {
        margin: 5px 0px;
    }
</style>


