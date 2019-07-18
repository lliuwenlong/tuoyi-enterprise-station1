<template>
    <div>
        <div id="banner">
            <img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannne4.jpg"/>
        </div>
        <div id="Company_introduction">	
		    <section class="introduction intro">
                <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
                    <div class="pro">
                        <span></span>
                        <h3>格勤介绍</h3>
                        <span></span>
                    </div>
                    <p style="margin:5px">GEQIN INTRODUCE</p>
                </div>
                <p class="pany">格勤教育是一家专注于企业运营系统建设的咨询服务公司，总部设于北京；公司始终贯彻“一切以企业增长结果为导向”的课程理念，专注于为客户构建一整套可持续增长的运营系统解决方案，协助企业赢得商战，成为行业第一。</p>
                <!--<div style="font-weight: bold;padding-top: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;旗下子品牌</div>-->
                <p class="pany">公司由深研运营系统建设十余年的实战专家李青東老师等人联合创办，于2013年成立，目前拥有12家直营公司，50余家战略合作商，10名核心讲师、10余名咨询师、50余位资深技术顾问，190余项自主研发知识产权，每年参课人数近万人。格勤教育首创企业运营系统，为学员提供全生命周期服务，短短6年时间，已成功助力美佳集团、金宇机电、申通达国际物流、舜宇模具、希雅斯酒业、福柏眼科、恒大家装、船歌鱼餐饮集团等上百家企业实现翻倍增长。</p>
                <p class="pany">自创业伊始，格勤一直以简单、实效、落地而显著，深入企业提供一对一服务，从而达到学员90%以上的满意度。我们的愿景即为“打造商业平台，用教育孵化产业”，以运营系统建设为服务起点，以咨询式服务深入企业内部，以赋能式投资带动产业战略延伸，动态跟踪每个环节，帮助企业打造从战略到执行的运营系统解决方案，与企业携手共创增长成果。</p>
                <!--<p class="pany"><b>12</b> 家分子公司</p>
                <p class="pany"><b>50</b> 余家渠道合作商 </p>
                <p class="pany"><b>10</b> 名讲师 </p>
                <p class="pany"><b>10</b> 位咨询师 </p>
                <p class="pany"><b>50</b> 余位运营系统建设资深技术老师 </p>
                <p class="pany">管理软件用户近 <b>100</b> 万 </p>
                <p class="pany">6年累积辅导学员完善运营系统 5000 余家 </p>
                <p class="pany">总参课人数超过 <b>100000</b> 人 </p>
                <p class="pany">每年新增服务企业 <b>2000</b> 余家 </p>
                <p class="pany">格勤教育的产品全部自主研发，包括“裂变式增长”、“增长系统工程”，咨询类产品增长顾问，以及战略产品“勤商会”。 </p>
                <p class="pany">主营产品增长系统工程，帮助企业从高层、中层到基层统一运营思路提升运营管理能力，为企业打造从战略到执行的持续增长方案。 </p>
                <p class="pany">格勤教育秉持敬畏规律、真爱企业的经营理念，旨在帮助中国中小企业搭建一套从战略到执行的持续增长系统，助力企业增长，打造幸福型企业，为中国成为世界经济强国而奋斗终身。 </p>-->


			    <div class="zhexian"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/zhexian.png"/></div>
            </section>
                
                
            <section class="culture">
                <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
                    <div class="pro">
                        <span></span>
                        <h3>格勤文化</h3>
                        <span></span>
                    </div>
                    <p style="margin:5px">GEQIN CULTURE</p>
                </div>
                <div class="cultureList">
                    <div class="swiper-container " :options="swiperOption">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"
                            v-for="item of Texts"
                            :key="item.id"
                            >
                                <div class="cul">
                                    <div class="cTitle">
                                        <h2>{{item.titleText}}</h2>
                                        <span>{{item.titleEn}}</span>
                                    </div>
                                    <span class="xian"></span>
                                    <div class="cont">
                                        <p>{{item.titleCont}}<br>{{item.titleBr}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="swiper-slide">
                                <div class="cul">
                                    <div class="cTitle">
                                        <h2>定位</h2>
                                        <span>POSITIONING</span>
                                    </div>
                                    <span class="xian"></span>
                                    <div class="cont">
                                        <p>企业运营系统<br>建设领先者</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide ">
                                <div class="swiper-slide">
                                    <div class="cul">
                                        <div class="cTitle">
                                            <h2>企业愿景</h2>
                                            <span>ENTERPRISE VISION</span>
                                        </div>
                                        <span class="xian"></span>
                                        <div class="cont">
                                            <p>打造商业平台<br/>用教育孵化产业</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cul">
                                    <div class="cTitle">
                                        <h2>使命</h2>
                                        <span>MISSION</span>
                                    </div>
                                    <span class="xian"></span>
                                    <div class="cont">
                                        <p>帮助企业提升管理成熟度，为中国成为世界第一经济强国而奋斗终身!</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="swiper-slide">
                                <div class="cul">
                                    <div class="cTitle">
                                        <h2>价值观</h2>
                                        <span>SENSE OF WORTH</span>
                                    </div>
                                    <span class="xian"></span>
                                    <div class="cont">
                                        <p>客户第一 团队合作<br>言行一致 追求品质<br>敢于担当 持续成长</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cul">
                                    <div class="cTitle">
                                        <h2>核心价值</h2>
                                        <span>CORE VALUE</span>
                                    </div>
                                    <span class="xian"></span>
                                    <div class="cont">
                                        <p>实战 系统 超值</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cul">
                                    <div class="cTitle">
                                        <h2>经营理念</h2>
                                        <span>CONCEPT</span>
                                    </div>
                                    <span class="xian"></span>
                                    <div class="cont">
                                        <p>敬畏规律 真爱企业</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cul">
                                    <div class="cTitle">
                                        <h2>企业信念</h2>
                                        <span>ENTERPRISE BELIEF</span>
                                    </div>
                                    <span class="xian"></span>
                                    <div class="cont">
                                        <p>突破极限 <br/>向不可能挑战</p>
                                    </div>
                                </div>
                            </div> -->
                            
                        </div>
                        <!-- 如果需要分页器 -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>            
            </section>
                
                <section class="culture curriculum">
                    <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
                        <div class="pro">
                            <span></span>
                            <h3>格勤课程</h3>
                            <span></span>
                        </div>
                        <p style="margin-top:5px">GEQIN CURRICULUM</p>
                    </div>
                    <div class="cultureList curriculumList">
                        
                        <div class="cul" v-for="item of cultureLists" :key="item.id">
                            <div class="cTitle">
                                <h2>{{item.title}}</h2>
                                <span class="cTitleEn">{{item.titleEn}}</span>
                            </div>
                            <span class="xian"></span>
                            <div class="cont">
                                <p>{{item.txt}}</p>
                            </div>
                        </div>
                    </div>
                    
                </section>
                
                
                <section class="introduction">
                    <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
                        <div class="pro">
                            <span></span>
                            <h3>格勤荣誉</h3>
                            <span></span>
                        </div>
                        <p style="margin-top:5px">GEQIN HONOR</p>
                    </div>
                    <ul class="honor">
                        <li>
                            <div class="img"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ry1.jpg" alt="" /></div>
                            <p>中国管理咨询十大杰出品牌</p>
                        </li>
                        <li>
                            <div class="img"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ry2.jpg" alt="" /></div>
                            <p>中国最佳人才培训基地</p>
                        </li>
                        <li>
                            <div class="img"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ry3.jpg" alt="" /></div>
                            <p>亚洲最具成长性教育品牌</p>
                        </li>
                        <li>
                            <div class="img"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ry4.jpg" alt="" /></div>
                            <p>企业运营系统建设权威品牌</p>
                        </li>
                        <li>
                            <div class="img"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ry6.jpg" alt="" /></div>
                            <p>中国中小企业运营系统建设研究中心</p>
                        </li>
                        <li>
                            <div class="img"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/ry7.jpg" alt="" /></div>
                            <p>中国中小企业协会常务理事单位</p>
                        </li>
                    </ul>
                </section>
                
                <section class="introduction">
                    <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
                        <div class="pro">
                            <span></span>
                            <h3>公司专利</h3>
                            <span></span>
                        </div>
                        <p style="margin-top:5px">Corporate patents</p>
                    </div>
                    <ul class="honor">
                        <li>
                            <div class="img"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/zl1.jpg" alt="" /></div>
                            <p>高新技术企业证书</p>
                        </li>
                        <li>
                            <div class="img"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/zl2.jpg" alt="" /></div>
                            <p>出版物经营许可证</p>
                        </li>
                    </ul>
                    <div id="teacher" style="margin-top: 0px;">
                        <div class="banner">
                            <div class="swiper-container swiper-container2 bannne" >
                                <div class="swiper-wrapper bannne_box">
                                    <div class="swiper-slide b-list2"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/zl3.jpg"/><p>在线购买管理软件</p></div>
                                    <div class="swiper-slide b-list2"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/zl4.jpg"/><p>在线学习平台系统</p></div>
                                    <div class="swiper-slide b-list2"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/zl5.jpg"/><p>课程视频在线播放软件</p></div>
                                    <div class="swiper-slide b-list2"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/zl6.jpg"/><p>IOS-移动考核软件</p></div>
                                    <div class="swiper-slide b-list2"><img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/zl7.jpg"/><p>积分激励移动办公系统</p></div>
                                </div>
                                <!-- 如果需要分页器 -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="introduction" style="margin-bottom: 0px;">
                    <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
                        <div class="pro">
                            <span></span>
                            <h3>出版物</h3>
                            <span></span>
                        </div>
                        <p style="margin-top: 5px">GEQIN PUBLICATIONS</p>
                    </div>
                    <ul class="books">
                        <!-- <li v-for="item of books" :key="item.id">
                            <div class="img"><a :href="aHref"><img :src="item.imgUrl"/></a></div>
                            <div class="book_right">
                                <h2><a :href="ahHref">{{item.title}}</a></h2>
                                <p>{{item.datails}}<a :href="itrm.aHref">{{itrm.more}}</a></p>
                            </div>
                        </li> -->
                        <li>
                            <div class="img"><a href="/books/950.html"><img src="http://m.igeqin.com/Upload/1510626801.jpg"/></a></div>
                            <div class="book_right">
                                <h2><a href="/books/950.html">系统运营之积分管理</a></h2>
                                <p>企业运营管理的目的是为了达到“三效”，既效率、效益、效果，到达到这“三效”，必须激发员工的“三性”，...<a href="/books/950.html">了解更多</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="img"><a href="/books/949.html"><img src="http://m.igeqin.com/Upload/1510626784.jpg"/></a></div>
                            <div class="book_right">
                                <h2><a href="/books/949.html">利润驱动光盘</a></h2>
                                <p>利润事企业的灵魂，想要获得利润首先要从“四面”入手，既：利润驱动、成本管控、类金融手段、人才驱动，并...<a href="/books/949.html">了解更多</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="img"><a href="/books/825.html"><img src="http://m.igeqin.com/Upload/1510626198.jpg"/></a></div>
                            <div class="book_right">
                                <h2><a href="/books/825.html">股权的力量</a></h2>
                                <p>         中国已经进入股权时代，这是历史给的大好时机。已经有越来越多的人认识到了股权的价值，...<a href="/books/825.html">了解更多</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="img"><a href="/books/364.html"><img src="http://m.igeqin.com/Upload/1510626855.jpg"/></a></div>
                            <div class="book_right">
                                <h2><a href="/books/364.html">系统运营官</a></h2>
                                <p>先做榜样，再做管理  、 指哪打哪儿 、头顶着天，脸贴着地   、 德需配位  、  熬得住  、提...<a href="/books/364.html">了解更多</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="img"><a href="/books/359.html"><img src="http://m.igeqin.com/Upload/1510626185.jpg"/></a></div>
                            <div class="book_right">
                                <h2><a href="/books/359.html">积分管理</a></h2>
                                <p>积分制管理是建立在绩效考核的基础上，对员工的个人能力、工作业绩、日常行为等用奖励或扣分的方式进行全方...<a href="http://m.igeqin.com/books/359.html">了解更多</a></p>
                            </div>
                        </li>			
                    </ul>
                </section>
            </div>
    </div>
</template>

<script>

import { swiper, swiperSlide } from 'vue-awesome-swiper'
import 'swiper/dist/css/swiper.css'
// 轮播图未完成
export default {
    components: {
        swiper,
        swiperSlide
    },
    name:'IntroduceContent',
    data() {
        return {
            swiperOption: {
            // 　　autoplay: {
            //         delay: 30000,
            //         duration:3000,
            //         speed:3000,
            //         disableOnInteraction: false // 手动切换之后继续自动轮播
            // 　　},
                observer: true, //修改swiper自己或子元素时，自动初始化swiper
                observeParents: true,
                loop: true
            },

            Texts: [{
                    id:'0001',
                    titleText:'定位',
                    titleEn:'POSITIONING',
                    titleCont:'企业运营系统',
                    titleBr:'建设领先者'
                },{
                    id:'0002',
                    titleText:'企业愿景',
                    titleEn:'ENTERPRISEVISION',
                    titleCont:'打造商业平台',
                    titleBr:'用教育孵化产业'
                },{
                    id:'0003',
                    titleText:'使命',
                    titleEn:'MISSION',
                    titleCont:'帮助企业提升管理成熟度，为中国成为世界第一经济强国而奋斗终身!',
                    titleBr:''
                },{
                    id:'0004',
                    titleText:'价值观',
                    titleEn:'SENSE OF WORTH',
                    titleCont:'客户第一 团队合作',
                    titleBr:'敢于担当 持续成长'
                },{
                    id:'0005',
                    titleText:'核心价值',
                    titleEn:'CORE VALUE',
                    titleCont:'实战 系统 超值',
                    titleBr:'我是转折点'
                },{
                    id:'0006',
                    titleText:'经营理念',
                    titleEn:'CONCEPT',
                    titleCont:'敬畏规律 真爱企业',
                    titleBr:''
                },{
                    id:'0007',
                    titleText:'企业信念',
                    titleEn:'ENTERPRISE BELIEF',
                    titleCont:'突破极限',
                    titleBr:'向不可能挑战'
            }],
            cultureLists: [{
                    id: '0',
                    title: '裂变式增长',
                    titleEn: 'profit motivated',
                    txt: '成为第一的商业逻辑'
                },{
                    id: '1',
                    title: '运营系统班',
                    titleEn: 'profit motivated',
                    txt: '成为第一的商业逻辑'
                },{
                    id: '2',
                    title: '裂变式增长',
                    titleEn: 'profit motivated',
                    txt: '成为第一的商业逻辑'
                },{
                    id: '3',
                    title: '裂变式增长',
                    titleEn: 'profit motivated',
                    txt: '成为第一的商业逻辑'
                },{
                    id: '4',
                    title: '裂变式增长',
                    titleEn: 'profit motivated',
                    txt: '成为第一的商业逻辑'
                },{
                    id: '5',
                    title: '裂变式增长',
                    titleEn: 'profit motivated',
                    txt: '成为第一的商业逻辑'
            }],
            books: [{
                    id: '0',
                    aHref: '/books/950.html',
                    imgUrl: 'http://m.igeqin.com/Upload/1510626801.jpg',
                    title: '裂变式增长',
                    datails: '成为第一的商业逻辑',
                    more: '了解更多'
                },{
                    id: '1',
                    aHref: '/books/950.html',
                    imgUrl: 'http://m.igeqin.com/Upload/1510626801.jpg',
                    title: '裂变式增长',
                    datails: '成为第一的商业逻辑',
                    more: '了解更多'
                },{
                    id: '2',
                    aHref: '/books/950.html',
                    imgUrl: 'http://m.igeqin.com/Upload/1510626801.jpg',
                    title: '裂变式增长',
                    datails: '成为第一的商业逻辑',
                    more: '了解更多'
                },{
                    id: '3',
                    aHref: '/books/950.html',
                    imgUrl: 'http://m.igeqin.com/Upload/1510626801.jpg',
                    title: '裂变式增长',
                    datails: '成为第一的商业逻辑',
                    more: '了解更多'
                },{
                    id: '4',
                    aHref: '/books/950.html',
                    imgUrl: 'http://m.igeqin.com/Upload/1510626801.jpg',
                    title: '裂变式增长',
                    datails: '成为第一的商业逻辑',
                    more: '了解更多'
                },{
                    id: '5',
                    aHref: '/books/950.html',
                    imgUrl: 'http://m.igeqin.com/Upload/1510626801.jpg',
                    title: '裂变式增长',
                    datails: '成为第一的商业逻辑',
                    more: '了解更多'
            }],
        }
    }
}
</script>

<style>


    .swiper-slide{
        width:50%;
        height: 50%;
        /* 根据内容调整宽度 */
    }
    /* #banner {
        width: 100%;
        overflow: hidden;
    } */
    
    #banner img {
        width: 100% !important;
    }
    .about_title {
        width: 100%;
        text-align: center;
    }
    .about_title .pro {
        width: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .about_title .pro h3 {
        color: #1680cc;
        font-size: .5rem;
        /* font-size: 18px; */
        padding: 0px 3%;
        letter-spacing: 2px;
        font-weight: 700;
        width: 30%;
    }
    .about_title .pro span {
        display: block;
        width: 12%;
        height: 2px;
        background: #666666;
    }
    .about_title p {
        width: 100%;
        color: #666666;
        font-size: 1rem;
        font-size: 10px;
        text-transform: uppercase;
     }
    #Company_introduction {
        width: 100%;
        position: relative;
        top: -30px;
    }
    #Company_introduction .introduction {
        width: 94%;
        overflow: hidden;
        padding: 3%;
        background: #FFFFFF;
        margin-bottom: 15px;
    }
    #Company_introduction .introduction .pany {
        padding-top: 15px;
        width: 96%;
        display: block;
        margin: 0px auto;
        line-height: 1.5em;
        text-indent: 2em;
        font-size: 1.2rem;
        font-size: 12px;
    }
    #Company_introduction .introduction .zhexian {
        width: 94%;
        margin: 0px auto;
        margin-top: -10px;
        position: absolute;
        margin-bottom: 5%;
    }
    #Company_introduction .introduction .zhexian img {
        width: 100%;
    }
    #Company_introduction .introduction .honor {
        width: 100%;
        margin: 0px auto;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        flex-flow: wrap;
        margin-top: 20px;
    }
    #Company_introduction .introduction .honor li {
        width: 48%;
        margin-bottom: 10px;
    }
    #Company_introduction .introduction .honor li .img {
        width: 96%;
        margin: 0px auto;
        padding: 2%;
        padding-bottom: 0.5%;
        border: 1px solid #1680cc;
        box-sizing: border-box;
    }
    #Company_introduction .introduction .honor li .img img {
        width: 100%;
    }
    #Company_introduction .introduction .honor li p {
        font-size: 1.2rem;
        font-size: 12px;
        color: #666666;
        text-align: center;
        line-height: 2em;
    }
    #Company_introduction .introduction .books {
        width: 100%;
        overflow: hidden;
        padding-top: 10px;
    }
    #Company_introduction .introduction .books li {
        width: 96%;
        padding: 3% 2%;
        display: flex;
        justify-content: space-between;
    }
    #Company_introduction .introduction .books li .img {
        width: 30%;
    }
    #Company_introduction .introduction .books li .img img {
        width: 100%;
    }
    #Company_introduction .introduction .books li .book_right {
        width: 65%;
    }
    #Company_introduction .introduction .books li .book_right h2 {
        font-size: 1.6rem;
        font-size: 16px;
        line-height: 2em;
        color: #666666;
    }
    #Company_introduction .introduction .books li .book_right p {
        font-size: 1.2rem;
        font-size: 12px;
        line-height: 1.5em;
        color: #666666;
    }
    #Company_introduction .introduction .books li .book_right p a {
        color: #1680cc;
        font-size: 1.2rem;
        font-size: 12px;
    }
    #Company_introduction .intro {
        width: 90%;
        padding: 2%;
        border-radius: 6px;
        margin: 0px auto;
        position: relative;
        overflow: initial;
        padding-bottom: 40px;
        /* background: #eee; */
    }
    #Company_introduction .culture {
        overflow: hidden;
        width: 100%;
        width: 94%;
        margin: 17% auto;
        /* margin-top: 50px; */
        position: relative;
        

        /* background: #eee; */
    }
    #Company_introduction .culture .cultureList {
        width: 94%;
        margin: 0px auto;
        margin-top: 15px;
    }
    #Company_introduction .culture .cultureList .swiper-container {
        padding-bottom: 30px;
    }
    #Company_introduction .culture .cultureList .cul {
        width: 140px;
        height: 195px;
        background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/culBJ.png) no-repeat;
        background-size: 100%;
        overflow: hidden;
    }
    #Company_introduction .culture .cultureList .cul .cTitle {
        width: 80%;
        margin-top: 25px;
        margin-left: 15px;
    }
    #Company_introduction .culture .cultureList .cul .cTitle h2 {
        font-size: 1.6rem;
        font-size: 16px;
        color: #282828;
    }
    #Company_introduction .culture .cultureList .cul .cTitle span {
        font-size: 0.7rem;
        font-size: 7px;
        color: #afaeae;
    }
    #Company_introduction .culture .cultureList .cul .xian {
        display: block;
        width: 70%;
        margin-left: 15px;
        border-top: 1px solid #e0dfec;
        margin-top: 15px;
    }
    #Company_introduction .culture .cultureList .cul .cont {
        width: 80%;
        margin-left: 15px;
        margin-top: 15px;
        color: #666666;
        font-size: 1.3rem;
        font-size: 13px;
    }
    #Company_introduction .culture .cultureList .swiper-pagination {
        bottom: 5px;
    }
    #Company_introduction .culture .curriculumList {
        width: 100%;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        
    }
    #Company_introduction .culture .curriculumList .cul {
        background: #FFFFFF url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/se.png) no-repeat 170px 200px;
        width: 30%;
        height: 280px;
        margin-bottom: 10px;
        position: relative;
        border: 1px solid #ccc;
        border-radius: 10px;
       
    }
    #Company_introduction .culture .curriculumList .cul .cTitle {
        margin: 20px 0 0 10px;
    }
    #Company_introduction .culture .curriculumList .cul .cTitle span {
        text-transform: uppercase;
        display: inline-block;
        margin:40px 0 0 0;  
    }
    #Company_introduction .culture .curriculumList .cul .xian {
        width: 80%;
        position: absolute;
        top:50px;
        left: -10px;
    }
    #Company_introduction .culture .curriculumList .cul .cont {
        position: absolute;
        line-height: 30px;
        top: 120px;
        left: -5px;
    }
    #Company_introduction .curriculum {
        margin-top: 30px;
    }
</style>

