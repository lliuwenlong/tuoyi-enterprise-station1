<template>
    <div>
        <div id="banner">
            <img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannnes3.jpg">
        </div>
        <div id="news">
            <div class="news_nav case_nav">
                <div class="swiper-container li_box swiper-container-horizontal swiper-container-free-mode swiper-container-android">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-slide-active font_style"  v-for="item of menus" :key="item.id">
                            <a :href="item.aHref">{{item.title}}</a>
                        </div>
                        <!-- <div class="swiper-slide swiper-slide-active" style="width: 77.3636px; margin-right: 5px;">
                            <a href="/qclsxy.html?wxref=mp.weixin.qq.com">汽车零售行业</a>
                        </div>
                        <div class="swiper-slide swiper-slide-next" style="width: 77.3636px; margin-right: 5px;">
                            <a href="/case1.html?wxref=mp.weixin.qq.com">餐饮管理</a>
                        </div>
                        <div class="swiper-slide" style="width: 77.3636px; margin-right: 5px;">
                            <a href="/case4.html?wxref=mp.weixin.qq.com">生产制造</a>
                        </div>
                        <div class="swiper-slide" style="width: 77.3636px; margin-right: 5px;">
                            <a href="/case2.html?wxref=mp.weixin.qq.com">医疗服务</a>
                        </div>
                        <div class="swiper-slide" style="width: 77.3636px; margin-right: 5px;">
                            <a href="/case5.html?wxref=mp.weixin.qq.com">工程机械</a>
                        </div>
                        <div class="swiper-slide" style="width: 77.3636px; margin-right: 5px;">
                            <a href="/case3.html?wxref=mp.weixin.qq.com">商贸百货</a>
                        </div>
                        <div class="swiper-slide" style="width: 77.3636px; margin-right: 5px;">
                            <a href="/case6.html?wxref=mp.weixin.qq.com">服饰加工</a>
                        </div>
                        <div class="swiper-slide" style="width: 77.3636px; margin-right: 5px;">
                            <a href="/case7.html?wxref=mp.weixin.qq.com">其他</a>
                        </div> -->
                    </div>
                </div>
            </div>

            <ul class="news_list">

                <li v-for="item of picLists" :key="item.id">
                    <div class="img">
                        <a :href="item.aHref">
                            <img :src="item.picUrl" alt="台州烹小鲜餐饮管理有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a :href="item.aHref">{{item.title}}</a>
                        </h2>
                        <p>{{item.txt}}
                            <a :href="item.aHref">{{item.more}}</a>
                        </p>
                        <div class="bottom">
                            <span>{{item.time}}</span>
                        </div>
                    </div>
                </li>


                <!-- <li>
                    <div class="img">
                        <a href="/case1/1677.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1543304077.png" alt="台州烹小鲜餐饮管理有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/1677.html?wxref=mp.weixin.qq.com">台州烹小鲜餐饮管理有...</a>
                        </h2>
                        <p>1.公司导入积分后，员工做事变得积极主动...
                            <a href="/case1/1677.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2018-11-27</span>
                        </div>
                    </div>
                </li> -->


                <!-- <li>
                    <div class="img">
                        <a href="/case1/1483.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/153354261840.png" alt="诸城市晨翔食品有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/1483.html?wxref=mp.weixin.qq.com">诸城市晨翔食品有限公...</a>
                        </h2>
                        <p>导入积分／岗位量化之后整体总体产量提升3...
                            <a href="/case1/1483.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2018-08-06</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/1481.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1533542898.png" alt="山东亚圣食品有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/1481.html?wxref=mp.weixin.qq.com">山东亚圣食品有限公司</a>
                        </h2>
                        <p>2018年1-4月累计销售收入5500万...
                            <a href="/case1/1481.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2018-08-06</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/1323.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1526782875.jpg" alt="胶州味道餐饮有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/1323.html?wxref=mp.weixin.qq.com">胶州味道餐饮有限公司</a>
                        </h2>
                        <p> 学习格勤运营系统后， 1、重新制订了...
                            <a href="/case1/1323.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2018-05-20</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/983.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1512436554.jpg" alt="烟台全喜餐饮管理有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/983.html?wxref=mp.weixin.qq.com">烟台全喜餐饮管理有限...</a>
                        </h2>
                        <p>全喜餐饮落地导入运营系统方案后，企业的市...
                            <a href="/case1/983.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2017-12-04</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/1326.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1526784952.jpg" alt="沈阳韩味园餐饮管理有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/1326.html?wxref=mp.weixin.qq.com">沈阳韩味园餐饮管理有...</a>
                        </h2>
                        <p>韩味园通过《运营系统班》战略定位模块的学...
                            <a href="/case1/1326.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2018-05-20</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/1324.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1526783527.jpg" alt="辽宁金鼎餐饮管理有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/1324.html?wxref=mp.weixin.qq.com">辽宁金鼎餐饮管理有限...</a>
                        </h2>
                        <p>辽宁金鼎餐饮导入运营系统方案落地执行后，...
                            <a href="/case1/1324.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2018-05-20</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/980.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1526787346.jpg" alt="日照食为天">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/980.html?wxref=mp.weixin.qq.com">日照食为天</a>
                        </h2>
                        <p>日照食为天导入运营系统方案后员工积极性空...
                            <a href="/case1/980.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2017-12-04</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/981.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1526784548.jpg" alt="青岛铭家餐饮管理有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/981.html?wxref=mp.weixin.qq.com">青岛铭家餐饮管理有限...</a>
                        </h2>
                        <p>铭家餐饮在2014年的第一季度营业额提升...
                            <a href="/case1/981.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2017-12-04</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/1325.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1526783897.jpg" alt="青岛赤火牛排餐饮管理有限公司">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/1325.html?wxref=mp.weixin.qq.com">青岛赤火牛排餐饮管理...</a>
                        </h2>
                        <p>赤火牛排在2014年12月从积分开始陆续...
                            <a href="/case1/1325.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2018-05-20</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/984.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1526784169.jpg" alt="大连阁麟海鲜府董事长">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/984.html?wxref=mp.weixin.qq.com">大连阁麟海鲜府董事长</a>
                        </h2>
                        <p>重新定位了新品牌门店：”旭日海味王“并设...
                            <a href="/case1/984.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2017-12-04</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <a href="/case1/982.html?wxref=mp.weixin.qq.com">
                            <img src="http://m.igeqin.com/Upload/1513061356.jpg" alt="辽宁振武集团">
                        </a>
                    </div>
                    <div class="right">
                        <h2>
                            <a href="/case1/982.html?wxref=mp.weixin.qq.com">辽宁振武集团</a>
                        </h2>
                        <p>振武贵宾楼服务明显提升，企业文化高度统一...
                            <a href="/case1/982.html?wxref=mp.weixin.qq.com">了解更多</a>
                        </p>
                        <div class="bottom">
                            <span>时间：2017-12-04</span>
                        </div>
                    </div>
                </li> -->
            </ul>
            <section class="footer"></section>
        </div> 
    </div>
    
</template>

<script>
export default {
    // 这里不用管
    name:'CaseContent',
    data() {
        return {
            menus: [{
                    id: '0',
                    aHref: '/qclsxy.html?wxref=mp.weixin.qq.com',
                    title: '汽车零售行业'
                },{
                    id: '1',
                    aHref: '/qclsxy.html?wxref=mp.weixin.qq.com',
                    title: '汽车零售行业'
                },{
                    id: '2',
                    aHref: '/qclsxy.html?wxref=mp.weixin.qq.com',
                    title: '汽车零售行业'
                },{
                    id: '3',
                    aHref: '/qclsxy.html?wxref=mp.weixin.qq.com',
                    title: '汽车零售行业'
                },{

            }],
            picLists: [{
                    id: '0',
                    aHref: '/qclsxy.html?wxref=mp.weixin.qq.com',
                    picUrl: 'http://m.igeqin.com/Upload/1543304077.png',
                    title: '汽车零售行业',
                    txt: '1.公司导入积分后，员工做事变得积极主动...',
                    more: '了解更多',
                    time: '时间：2018-11-27'
                },{
                    id: '1',
                    aHref: '/qclsxy.html?wxref=mp.weixin.qq.com',
                    picUrl: 'http://m.igeqin.com/Upload/1543304077.png',
                    title: '汽车零售行业',
                    txt: '1.公司导入积分后，员工做事变得积极主动...',
                    more: '了解更多',
                    time: '时间：2018-11-27'
                },{
                    id: '2',
                    aHref: '/qclsxy.html?wxref=mp.weixin.qq.com',
                    picUrl: 'http://m.igeqin.com/Upload/1543304077.png',
                    title: '汽车零售行业',
                    txt: '1.公司导入积分后，员工做事变得积极主动...',
                    more: '了解更多',
                    time: '时间：2018-11-27'
                },{
                    id: '3',
                    aHref: '/qclsxy.html?wxref=mp.weixin.qq.com',
                    picUrl: 'http://m.igeqin.com/Upload/1543304077.png',
                    title: '汽车零售行业',
                    txt: '1.公司导入积分后，员工做事变得积极主动...',
                    more: '了解更多',
                    time: '时间：2018-11-27'
                },{
            
            }]
        }
    }
}
</script>

<style scoped>
      

        /* 新闻页面 */

        #news {
            width: 100%;
            overflow: hidden;
            padding-bottom: 20px;
            margin-top: -3px;
        }

        #news .news_nav {
            width: 100%;
            background: #FFFFFF;
            box-shadow: 0px 0px 10px #CCCCCC;
            height: 40px;
            display: flex;
            align-items: center;
        }

        #news .news_nav a {
            display: block;
            width: 100%;
            font-size: 1.4rem;
            font-size: 14px;
            color: #333333;
            text-align: center;
            padding: 2% 0%;
        }

        #news .news_nav .cur {
            color: #333333;
            font-weight: 700;
            /* background: url(/images/images/ns.png) no-repeat 50% 32px; */
        }

        #news .news_nav span {
            display: block;
            width: 4px;
            height: 20px;
            background: #999999;
        }

        #news .news_list {
            width: 94%;
            margin: 20px auto;
            background: #ffffff;
            padding: 1% 3%;
        }

        #news .news_list li {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin: 15px auto;
            border-bottom: 1px solid #cccccc;
            padding-bottom: 15px;
            overflow: hidden;
        }

        #news .news_list li .img {
            width: 40%;
            overflow: hidden;
            height: 90px;
        }

        #news .news_list li .img a {
            display: flex;
            align-items: center;
            height: 90px;
        }

        #news .news_list li .img img {
            width: 100%;
        }

        #news .news_list li .right {
            width: 57%;
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        #news .news_list li .right h2 {
            width: 100%;
        }

        #news .news_list li .right h2 a {
            font-size: 1.4rem;
            font-size: 14px;
            color: #333333;
        }

        #news .news_list li .right p {
            font-size: 1.1rem;
            font-size: 11px;
            color: #666666;
            margin-top: 3px;
        }

        #news .news_list li .right p a {
            color: #2f93d8;
            font-size: 1rem;
            font-size: 10px;
        }

        #news .news_list li .right .bottom {
            width: 100%;
            display: flex;
        }

        #news .news_list li .right .bottom span {
            display: block;
            padding-left: 12px;
            font-size: 1.1rem;
            font-size: 11px;
            color: #666666;
            background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/icos.png) no-repeat 0px 50%;
            background-size: 18%;
        }

        #news .news_list li .right .bottom .zz {
            /* background: url(../images/images/icos.png) no-repeat 0px 110%; */
            background-size: 18%;
        }

        #news .news_list li .right .bottom .ll {
            /* background: url(../images/images/icos.png) no-repeat 0px -24%; */
            background-size: 21%;
            margin-left: 10px;
        }

        #news .case_nav {
            width: 100%;
        }

        #news .case_nav .cur {
            font-weight: 400;
            font-weight: 600;
        }

        #news .case_nav a {
            display: block;
            height: 38px;
            font-size: 1.4rem;
            font-size: 14px;
            line-height: 39px;
        }

        .swiper-container {
            margin-left: auto;
            margin-right: auto;
            position: relative;
            overflow: hidden;
            z-index: 1
        } 
        .font_style{
            height: 100%;
            width: 20%;
          
            /* margin-right: 5px; */
            
        } 
    </style>