<template>
    <div class="home">
        <div class="head">
            <swiper :options="swiperOption" ref="mySwiper">
                <swiper-slide>
                    <div class="head_banne">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/banneIndex_01.jpg"
                            alt
                        />
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="head_banne">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/banneIndex_01.jpg"
                            alt
                        />
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="head_banne">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/banneIndex_01.jpg"
                            alt
                        />
                    </div>
                </swiper-slide>
            </swiper>
            <div class="head_nav wow fadeInDown" data-wow-delay="0.1s">
                <ul class="nav_list">
                    <li>
                        <router-link to="/" tag="a">
                            <span class="cur">首页</span>
                            <span class="cur">Home page</span>
                        </router-link>
                    </li>
                    <div class="nav_xian2" style="display: block !important;"></div>
                    <li>
                        <router-link to="/introduce" tag="a">
                            <span>格勤介绍</span>
                            <span>Introduce</span>
                        </router-link>
                    </li>
                    <div class="nav_xian2" style="display: block !important;"></div>
                    <li>
                        <a href="schedule.html">
                            <span>格勤课程</span>
                            <span>Curriculum</span>
                        </a>
                    </li>
                    <div class="nav_xian2" style="display: block !important;"></div>
                    <li>
                        <router-link to="/profit"  tag="a">
                            <span>裂变式增长</span>
                            <span>Profit</span>
                        </router-link>
                    </li>
                    <div class="nav_xian2" style="display: block !important;"></div>
                    <li>
                        <a href="ddkt.html">
                            <span>到答课堂</span>
                            <span>Daoda</span>
                        </a>
                    </li>
                    <div class="nav_xian2" style="display: block !important;"></div>
                    <li>
                        <a href="team.html">
                            <span>师资力量</span>
                            <span>Faculty</span>
                        </a>
                    </li>
                    <div class="nav_xian2" style="display: block !important;"></div>
                    <li>
                        <a href="case.html">
                            <span>客户案例</span>
                            <span>Customer case</span>
                        </a>
                    </li>
                    <div class="nav_xian2" style="display: block !important;"></div>
                    <li>
                        <a href="join.html">
                            <span>渠道加盟</span>
                            <span>Cooperation</span>
                        </a>
                    </li>
                    <div class="nav_xian2" style="display: block !important;"></div>
                    <li>
                        <a href="geqinNews.html">
                            <span>格勤观点</span>
                            <span>Viewpoint</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="head_num">
                <div class="num_box">
                    <div class="box_top">
                        <span>发展历程</span>
                        <span>分公司数量</span>
                        <span>企业家学员</span>
                        <span>技术团队</span>
                        <span>知识产权</span>
                    </div>
                    <div class="box_top box_bottom">
                        <span id="num1">7</span>
                        <span id="num2">12</span>
                        <span id="num3">20,300</span>
                        <span id="num4">50</span>
                        <span id="num5">190</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="about_wrap">
            <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
                <p>ABOUT US</p>
                <div class="pro">
                    <span></span>
                    <h3>关于我们</h3>
                    <span></span>
                </div>
            </div>
            <div class="about_box">
                <div class="about_left wow fadeInLeft" data-wow-delay="0.2s">
                    <video
                        class="qiye_video"
                        loop="loop"
                        controls="controls"
                        poster="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/video.jpg"
                    >
                        <source
                            src="http://1253819261.vod2.myqcloud.com/372765c5vodgzp1253819261/c2e77ed97447398154957366318/TG7pNnAVwVUA.mp4"
                            type="video/mp4"
                        />
                        <!--<source src="http://video.699pic.com/videos/18/86/89/f9fNbAIqDzyx1510188689.mp4" type="video/mp4"></source>-->
                    </video>
                </div>
                <div class="about_right">
                    <div
                        class="wow fadeInRight"
                        data-wow-delay="0.2s"
                        style="font-size: 16px;color: #333333;text-indent: 2em;line-height: 25px;margin-bottom: 10px"
                    >格勤教育是一家专注于企业运营系统建设的咨询服务公司，总部设于北京；公司始终贯彻“一切以企业增长结果为导向”的课程理念，专注于为客户构建一整套可持续增长的运营系统解决方案，协助企业赢得商战，成为行业第一。</div>
                    <div
                        class="wow fadeInRight"
                        data-wow-delay="0.3s"
                        style="color: #333333;"
                    >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司由深研运营系统建设十余年的实战专家李青東老师等人联合创办，于2013年成立，目前拥有12家直营公司，50余家战略合作商，10名核心讲师、10余名咨询师、50余位资深技术顾问，190余项自主研发知识产权，每年参课人数近万人。格勤教育首创企业运营系统，为学员提供全生命周期服务，短短6年时间，已成功助力美佳集团、金宇机电、申通达国际物流、舜宇模具、希雅斯酒业、福柏眼科、恒大家装、船歌鱼餐饮集团等上百家企业实现翻倍增长。</div>
                    <div
                        class="wow fadeInRight"
                        data-wow-delay="0.3s"
                        style="font-size: 16px;color: #333333;text-indent: 2em;line-height: 25px;margin-bottom: 10px;margin-top: 15px;"
                    >自创业伊始，格勤一直以简单、实效、落地而显著，深入企业提供一对一服务，从而达到学员90%以上的满意度。我们的愿景即为“打造商业平台，用教育孵化产业”，以运营系统建设为服务起点，以咨询式服务深入企业内部，以赋能式投资带动产业战略延伸，动态跟踪每个环节，帮助企业打造从战略到执行的运营系统解决方案，与企业携手共创增长成果。</div>
                    <!--<div class="wow fadeInRight" data-wow-delay="0.4s" style="font-size: 16px;color: #333333;text-indent: 2em;line-height: 25px;margin-bottom: 10px">格勤教育是由企业运营系统建设权威导师李青东等人创建，公司已经构建起了“培训-咨询-股权投资-软件-人才”的商业模式，旗下设有三大产品事业部“运营事业部”、“财务事业部”、“股权事业部”，两大研究中心“股权研究中心”、“行业研究院”一家商学院“格勤商学院”和12家分子公司，以及50余家渠道合作商。</div>
				<div class="wow fadeInRight" data-wow-delay="0.5s" style="font-size: 16px;color: #333333;text-indent: 2em;line-height: 25px;margin-bottom: 10px">格勤拥有10余位mini咨询师、50余位运营系统建设资深技术老师和180多项专利及知识产权，每年新增服务企业2000余家。</div>
                    <div class="wow fadeInRight" data-wow-delay="0.6s" style="font-size: 16px;color: #333333;text-indent: 2em;line-height: 25px;margin-bottom: 10px">主营产品运营系统工程，帮助企业从高层、中层到基层统一运营思路提升运营管理能力，为企业打造从战略到执行的系统解决方案。</div>-->
                </div>
            </div>
            <div class="about_bottom wow fadeInUp" data-wow-delay="0.2s">
                <div class="ab_le">
                    <span class="asidous">ASIDOUS</span>
                    <span class="shu"></span>
                </div>
                <div class="ab_ra">
                    <a href="introduce.html">查看更多+</a>
                </div>
            </div>
        </div>
        <new-list />
        <service-item />
        <Strategy />
        <div class="case_logos">
            <div class="logos_img">
                <img
                    src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/case_logos.png"
                />
            </div>
        </div>
    </div>
</template>

<script>
import { WOW } from "wowjs";
import { swiper, swiperSlide } from "vue-awesome-swiper";
import NewList from "@/components/HomePage/NewList.vue";
import ServiceItem from "@/components/HomePage/ServiceItem.vue";
import Strategy from "@/components/HomePage/Strategy.vue";
export default {
    name: "home",
    mounted() {
        new WOW().init();
        this.swiper.slideTo(0, 0, false);
    },
    data() {
        return {
            swiperOption: {
                autoplay: 3000,
                loop: true
            }
        };
    },
    components: {
        swiper,
        swiperSlide,
        NewList,
        ServiceItem,
        Strategy
    },
    computed: {
        swiper() {
            return this.$refs.mySwiper.swiper;
        }
    }
};
</script>
<style scoped lang="less">
.head {
    width: 100%;
    overflow: hidden;
    position: relative;
    .head_nav {
        width: 1200px;
        height: 120px;
        margin: 0px auto;
        background: #ffffff;
        position: absolute;
        top: 60px;
        left: 50%;
        margin-left: -600px;
        display: flex;
        align-items: center;
        z-index: 99;
        .nav_list {
            width: 1050px;
            margin: 0px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100px;
            li {
                width: 100px;
                text-align: center;
                height: 100px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                a {
                    display: block;
                    text-align: center;
                    width: 100%;
                    span:last-child {
                        font-size: 14px;
                        font-family: BaskOldFace;
                        color: #dddddd;
                        display: block;
                    }
                }
            }
            .nav_xian,
            .nav_xian2 {
                display: block;
                width: 1px;
                height: 40px;
                background: #999999;
            }
        }
    }
    .head_banne {
        width: 100%;
        height: 750px;
        position: relative;
        img {
            display: block;
            margin: 0px auto;
        }
        .img_h {
            position: absolute;
            top: 240px;
            left: 50%;
            margin-left: -300px;
        }
    }
    .head_num {
        width: 1200px;
        height: 180px;
        margin: 0px auto;
        background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/bj_01.png)
            no-repeat;
        background-position: center;
        position: relative;
        top: -90px;
        overflow: hidden;
        z-index: 99;
        .num_box {
            width: 100%;
            height: 80px;
            margin: 0px auto;
            margin-top: 50px;
            .box_bottom {
                line-height: 40px;
                span {
                    font-size: 30px;
                    font-weight: 700;
                }
            }
            .box_top {
                width: 100%;
                display: flex;
                justify-content: space-between;
                line-height: 40px;
                span {
                    color: #ffffff;
                    font-size: 18px;
                    display: block;
                    width: 25%;
                    text-align: center;
                }
            }
        }
    }
}
.about_wrap {
    width: 1110px;
    margin: 0px auto;
    margin-top: 30px;
    .about_title {
        width: 240px;
        height: 60px;
        margin: 0px auto;
        p {
            font-size: 32px;
            color: #666666;
            text-align: center;
            font-weight: 400;
        }
    }
    .pro {
        width: 220px;
        height: 30px;
        margin: 0px auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        span {
            display: block;
            width: 50px;
            height: 1px;
            background: #9d9d9d;
        }
        h3 {
            font-size: 24px;
            color: #333333;
            line-height: 30px;
        }
    }
    .about_box {
        width: 1100px;
        margin: 0px auto;
        display: flex;
        justify-content: space-between;
        margin-top: 90px;
        align-items: center;
        .about_left {
            width: 460px;
            height: 260px;
            // background: url(../images/images2/yinying.png) no-repeat;
            background-position: bottom;
            margin-top: 15px;
            padding-bottom: 14px;
            background-size: 92%;
            .qiye_video {
                width: 460px;
                height: 260px;
                display: block;
                border-radius: 5px;
            }
        }
        .about_right {
            width: 600px;
            height: 340px;
            p {
                font-size: 16px;
                color: #333333;
                text-indent: 2em;
                line-height: 30px;
                margin-bottom: 20px;
            }
        }
    }
    .about_bottom {
        width: 1100px;
        margin-top: 20px;
        position: relative;
        .ab_le {
            width: 850px;
            border-bottom: 1px solid #535353;
            position: relative;
            .asidous {
                font-size: 25px;
                color: #535353;
                margin-left: 20px;
            }
            .shu {
                width: 1px;
                height: 17px;
                display: block;
                background: #535353;
                position: absolute;
                top: 25px;
                left: 8px;
            }
        }
        .ab_ra {
            width: 180px;
            height: 40px;
            border: 1px solid #999999;
            text-align: center;
            line-height: 40px;
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 20px;
            &:hover {
                border: solid 1px #0071c3;
            }
        }
    }
}
.case_logos {
    width: 100%;
    height: 295px;
    background: #f4f4f4;
    display: flex;
    align-items: center;
    .logos_img {
        width: 1200px;
        margin: 0px auto;
    }
}
</style>

