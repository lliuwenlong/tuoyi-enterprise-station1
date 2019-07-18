<template>
    <section class="local">
		<div class="local_top wow fadeInDownBig" data-wow-delay="0.01s">
			<h2 class="h23">管理视界/
                <span>Management horizon</span
            ></h2>
			<a href="/mgmtNews.html?wxref=mp.weixin.qq.com">更多 ></a>
		</div>
		<ul class="case_list">
			<li>
				<div class="li_img">
                    <a href="/mgmtNews/1870.html?wxref=mp.weixin.qq.com">
                        <img src="http://m.igeqin.com/Upload/1555569653.jpg"/>
                    </a>
                </div>
				<div class="li_right">
					<h2>
                        <a href="/mgmtNews/1870.html?wxref=mp.weixin.qq.com">瑞幸咖啡完成1.5亿美元B+轮融资...</a>
                    </h2>
					<p class="top">       4月18日，瑞幸咖啡宣布，在2018年11月完成的B轮融资基础上，额外获得共...
                        <a href="/mgmtNews/1870.html?wxref=mp.weixin.qq.com">了解更多</a>
                    </p>
					<p class="time">时间：2019-04-18</p>
				</div>
			</li>			
            <li class="meiti">
				<span>媒体<br/>报道</span>
				<div class="list-meiti">
					<div class="swiper-container2 li_box">
				        <div class="swiper-wrapper">
				        	<div class="swiper-slide"><a href="" target="_blank" rel="nofollow"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/m2.png" alt="凤凰网"/></a></div>
				        	<div class="swiper-slide"><a href="http://dwz.cn/72MKW4" target="_blank" rel="nofollow"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/m1.png" alt="搜狐网"/></a></div>
				        	<div class="swiper-slide"><a href="http://suo.im/4wze4u" target="_blank" rel="nofollow"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/m9.png" alt="网易"/></a></div>
				        	<div class="swiper-slide"><a href="http://dwz.cn/72NXvv" target="_blank" rel="nofollow"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/m10.png" alt="今日头条"/></a></div>
				        	<div class="swiper-slide"><a href="http://dwz.cn/72MSR8" target="_blank" rel="nofollow"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/m6.png" alt="百家号"/></a></div>
				        	<div class="swiper-slide"><a href="http://dwz.cn/72MJuT" target="_blank" rel="nofollow"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/m5.png" alt="一点咨询"/></a></div>
				            <div class="swiper-slide"><a href="" target="_blank" rel="nofollow"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/m7.png" alt="新浪新闻"/></a></div>
				            <div class="swiper-slide"><a href="" target="_blank" rel="nofollow"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/m8.png" alt="中国网"/></a></div>
				        	<div class="swiper-slide"></div>
				        </div>
				    </div>
				</div>
			</li>
            <div v-for="item of newLists" :key="item.id">
                <li class="shijie">
                    <p>
                        <a :href="item.aHerf">{{item.txt}}</a>
                    </p>
                    <span>{{item.time}}</span>
                </li>
            </div>
			<!-- <li class="shijie">
                <p>
                    <a href="/mgmtNews/1870.html?wxref=mp.weixin.qq.com">瑞幸咖啡完成1.5亿美元B+轮融资...</a>
                </p>
                    <span>2019-04-18</span>
            </li>
            <li class="shijie">
                <p>
                    <a href="/mgmtNews/1797.html?wxref=mp.weixin.qq.com">《裂变式增长》口碑裂变 -- 三只...</a>
                </p>
                <span>2019-02-25</span>
            </li>
            <li class="shijie">
                <p>
                    <a href="/mgmtNews/1796.html?wxref=mp.weixin.qq.com">luckin coffee瑞辛咖啡...</a>
                </p>
                <span>2019-02-25</span>
            </li>
            <li class="shijie">
                <p>
                    <a href="/mgmtNews/1731.html?wxref=mp.weixin.qq.com">新经济新常态下企业如何发现利润区 ...</a>
                </p>
                <span>2019-01-21</span>
            </li>
            <li class="shijie">
                <p>
                    <a href="/mgmtNews/1711.html?wxref=mp.weixin.qq.com">中国品牌之路的崛起，瑞幸咖啡仅半年...</a>
                </p>
                <span>2018-12-05</span>
            </li>
            <li class="shijie">
                <p>
                    <a href="/mgmtNews/1675.html?wxref=mp.weixin.qq.com">品牌定位：茅台啤酒为什么失败？</a>
                </p>
                <span>2018-11-26</span>
            </li>		 -->
        </ul>
	</section>

</template>

<script>
export default {    
    name:'HomeListManage',
    data() {
        return {
            newLists: [{
                id: '0',
                aHref: '/mgmtNews/1711.html?wxref=mp.weixin.qq.com',
                txt: '品牌定位：茅台啤酒为什么失败？',
                time: '2018-11-26'
            },{
                id: '1',
                aHref: '/mgmtNews/1711.html?wxref=mp.weixin.qq.com',
                txt: '品牌定位：茅台啤酒为什么失败？',
                time: '2018-11-26'
            },{
                id: '2',
                aHref: '/mgmtNews/1711.html?wxref=mp.weixin.qq.com',
                txt: '品牌定位：茅台啤酒为什么失败？',
                time: '2018-11-26'
            },{
                id: '3',
                aHref: '/mgmtNews/1711.html?wxref=mp.weixin.qq.com',
                txt: '品牌定位：茅台啤酒为什么失败？',
                time: '2018-11-26'
            }]
        }
    }
}
</script>

<style scoped>
    .local .local_top {
        width: 94%;
        margin: 5px auto;
        padding-bottom: 8px;
        display: flex;
        justify-content: space-between;
    }
    .local .local_top h2 {
        padding-left: 33px;
        font-size: 1.5rem;
        font-size: 15px;
        color: #017dcc;
        display: block;
        background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/icn4.png) no-repeat 0px;
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
        font-size: .35rem;
    }
    .local .local_top a {
        display: block;
        width: 30%;
        text-align: right;
        font-size: 1.2rem;
        font-size: 12px;
        color: #666666;
        margin-top: 2px;
    }
    .local .news_geqin {
        width: 100%;
        overflow: hidden;
    }
    .local .news_geqin .case_li .news_liRight p {
        margin: 5px 0px;
    }
    .local .case_list {
        width: 94%;
        margin: 10px auto;
        margin-top: 0px;
    }
    .local .case_list li:first-child {
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
    }
    .local .case_list li:first-child .li_img {
        width: 45%;
        display: flex;
        align-items: center;
    }
    .local .case_list li:first-child .li_img img {
        width: 100%;
    }
    .local .case_list li:first-child .li_right {
        width: 52%;
        display: flex;
        align-content: space-between;
        flex-wrap: wrap;
        margin-top:13px;
    }
    .local .case_list li:first-child .li_right h2 {
        width: 100%;
        padding:8px 0 0 0;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        overflow: hidden;
        font-weight: 700;
    }
    .local .case_list li:first-child .li_right h2 a {
        color: #333333;
        font-size: 1.4rem;
        font-size: 14px;
    }
    .local .case_list li:first-child .li_right .top {
        display: block;
        font-size: 1.2rem;
        font-size: 12px;
        color: #333333;
        line-height: 1.4em;
        line-height: 35px;
    }
    .local .case_list li:first-child .li_right .top a {
        color: #549efb;
        font-size: 1.2rem;
        font-size: 12px;
    }
    .local .case_list li:first-child .li_right .time {
        /* margin-top: 3px; */
        padding-left: 32px;
        font-size: 1.2rem;
        font-size: 12px;
        background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ico5.png) no-repeat 0px;
        background-size: 9%;
        color: #333333;
    }
    .local .case_list .meiti {
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        overflow: hidden;
    }
    .local .case_list .meiti span {
        display: inline-block;
        font-size: 1.3rem;
        font-size: 13px;
        padding: 2% 3%;
        background: #2b5ca9;
        color: #FFFFFF;
        text-align: center;
        line-height: 1.2em;
    }
    .local .case_list .meiti .list-meiti {
        width: 83%;
        overflow: hidden;
    }
    .local .case_list .meiti .list-meiti .swiper-slide {
        width: 25% !important;
        margin-right: 10px !important;
    }
    .local .case_list .meiti .list-meiti .swiper-slide a{
        display: inline-block;
    }
    .local .case_list .meiti .list-meiti .swiper-slide img {
        width: 100%;
        display: block;
        margin-top: 5px;
    }
    .local .case_list .first {
        border-bottom: 1px solid #cccccc;
        padding-bottom: 5px;
    }
    .local .case_list .c-li {
        width: 31.5%;
        overflow: hidden;
        float: left;
        margin-top: 8px;
    }
    .local .case_list .c-li .li_img {
        width: 100%;
        overflow: hidden;
    }
    .local .case_list .c-li .li_img img {
        width: 100%;
    }
    .local .case_list .c-li p {
        text-align: center;
        font-size: 1rem;
        font-size: 10px;
    }
    .local .case_list .shijie {
        width: 100%;
        line-height: 46px;
        padding: 8px 0px 20px 0;
        display: flex;
        justify-content: space-between;
        border-top: 1px solid #CCCCCC;
    }
    .local .case_list .shijie p {
        font-size: 1.3rem;
        font-size: 13px;
    }
    .local .case_list .shijie p a {
        color: #333333;
    }
    .local .case_list .shijie span {
        display: block;
        color: #2b5ca9;
        font-size: 1.3rem;
        font-size: 13px;
    }
    .local .case_list .shijie:last-child {
        margin-bottom: -20px;
    }
    .local .c-list {
        display: flex;
        justify-content: space-between;
        flex-flow: wrap;
    }
    .local .lrqd {
        width: 100%;
    }
    .local .lrqd img {
        width: 100%;
    }
</style>

