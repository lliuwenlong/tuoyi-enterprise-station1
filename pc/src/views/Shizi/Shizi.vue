<template>
    <div>
        <div class="banner_img">
            <img
                src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2//banner_03.jpg"
            />
        </div>
        <div class="company">
            <!--公共左侧-->
            <div class="empty"></div>
            <Menu type="CASE" :list="list" @itemClick="itemClick"/>
            <div class="section_box" id="company_box">
                <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
                    <p>ELITE TEAM</p>
                    <div class="pro">
                        <span></span>
                        <h3>精英团队</h3>
                        <span></span>
                    </div>
                </div>
                <div class="tutor_top">
                    <div class="jieshao">
                        <h2>李青東</h2>
                        <div class="touxian">
                            <p>
                                《裂变式增长》开创者 &nbsp;&nbsp;
                                <br />&nbsp;G12理论体系奠基人
                                <br />&nbsp;格勤教育董事长
                            </p>
                        </div>
                        <p
                            class="gengduo"
                        >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 李青東老师是中国管理教育行业实战派...</p>
                        <a href="info/178-wxref=mp.weixin.qq.com.html" class="morr">查看更多</a>
                    </div>
                    <div class="thr">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/thr.png"
                            alt="格勤—李青东"
                            title="格勤—李青东"
                        />
                    </div>
                </div>
                <div class="tutor_video">
                    <video
                        loop="loop"
                        controls="controls"
                        poster="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images/tutor_video.jpg"
                        height
                        width="800"
                    >
                        <source
                            src="http://1253819261.vod2.myqcloud.com/372765c5vodgzp1253819261/f7173b624564972818487654489/n5ue84ytA10A.mp4"
                            type="video/mp4"
                        />
                        <!--<source src="http://video.699pic.com/videos/45/45/36/FRZS9Fcp16Uy1517454536.mp4" />-->
                    </video>
                    <!--<video width="800" height="" loop="loop" controls="controls" poster="/App/Tpl/Home/Defaults/Public/images/images/tutor_video.jpg">
                        <source src="http://1253819261.vod2.myqcloud.com/372765c5vodgzp1253819261/f72964e14564972818487664883/uaTzQZn1qCcA.mp4" type="video/mp4"></source>
                    </video>-->
                </div>
                <ul class="tea_list">
                    <li>
                        <div class="img">
                            <img src="http://www.igeqin.com/Upload/1524032307.jpg" alt="曹博善" />
                        </div>
                        <div class="jieshao">
                            <h2>曹博善</h2>
                            <div class="touxian">
                                <p>格勤副总裁</p>
                            </div>
                            <p class="gengduo">曹博善老师现任格勤教育副总裁，2006年进入企业管理咨询行业...</p>
                            <a href="team/212-wxref=mp.weixin.qq.com.html" class="morr">查看更多</a>
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="http://www.igeqin.com/Upload/1552874944.jpg" alt="王紫楠" />
                        </div>
                        <div class="jieshao">
                            <h2>王紫楠</h2>
                            <div class="touxian">
                                格勤赋能式投资副总裁
                                <br />赋能基金创始人
                            </div>
                            <p class="gengduo"></p>
                            <a href="team/1823-wxref=mp.weixin.qq.com.html" class="morr">查看更多</a>
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="http://www.igeqin.com/Upload/1552874849.jpg" alt="张万峰" />
                        </div>
                        <div class="jieshao">
                            <h2>张万峰</h2>
                            <div class="touxian">
                                格勤战略发展事业部总裁
                                <br />外事部副总裁
                            </div>
                            <p class="gengduo">张万峰老师，北京大学EMBA，2002年加入教育行业，相信教...</p>
                            <a href="team/1821-wxref=mp.weixin.qq.com.html" class="morr">查看更多</a>
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="http://www.igeqin.com/Upload/1552874928.jpg" alt="江枫" />
                        </div>
                        <div class="jieshao">
                            <h2>江枫</h2>
                            <div class="touxian">格勤战略发展事业部副总裁</div>
                            <p class="gengduo"></p>
                            <a href="team/1822-wxref=mp.weixin.qq.com.html" class="morr">查看更多</a>
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="http://www.igeqin.com/Upload/1531192008.jpg" alt="王尹正" />
                        </div>
                        <div class="jieshao">
                            <h2>王尹正</h2>
                            <div class="touxian">
                                格勤事业合伙人
                                <br />增长系统推广讲师
                                <br />《二梯队孵化》授课老师
                            </div>
                            <p class="gengduo">王尹正老师是具备超强学习力的企业培训导师，学习中外最前沿的思...</p>
                            <a href="team/183-wxref=mp.weixin.qq.com.html" class="morr">查看更多</a>
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="http://www.igeqin.com/asidous/Upload/1472783650.jpg" alt="郝爽" />
                        </div>
                        <div class="jieshao">
                            <h2>郝爽</h2>
                            <div class="touxian">
                                北京技术总监
                                <br />格勤事业合伙人
                            </div>
                            <p class="gengduo">郝爽老师自2010年加入管理咨询行业以来，年的时间累计辅导全...</p>
                            <a href="team/179-wxref=mp.weixin.qq.com.html" class="morr">查看更多</a>
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="http://www.igeqin.com/Upload/1544057524.jpg" alt="唐艺桐" />
                        </div>
                        <div class="jieshao">
                            <h2>唐艺桐</h2>
                            <div class="touxian">
                                格勤事业合伙人
                                <br />格勤资深技术老师
                                <br />格勤一战区营销总裁
                                <br />&nbsp;
                            </div>
                            <p class="gengduo">格勤事业合伙人，2009年进入企业管理培训行业，2013年和...</p>
                            <a href="team/185-wxref=mp.weixin.qq.com.html" class="morr">查看更多</a>
                        </div>
                    </li>
                    <li>
                        <div class="img">
                            <img src="http://www.igeqin.com/Upload/1521624522.jpg" alt="宋美霖" />
                        </div>
                        <div class="jieshao">
                            <h2>宋美霖</h2>
                            <div class="touxian">
                                青岛公司总经理
                                <br />格勤事业合伙人
                                <br />格勤资深技术老师
                            </div>
                            <p class="gengduo">宋美霖老师参加教育行业8年之久，累计辅导全国成长型民营企业构...</p>
                            <a href="team/461-wxref=mp.weixin.qq.com.html" class="morr">查看更多</a>
                        </div>
                    </li>
                </ul>
                <Page :total="100" />
            </div>
        </div>
    </div>
</template>
<script>
import Menu from "@/components/common/Menu.vue";
import { WOW } from "wowjs";
import Page from "@/components/common/Page.vue";
export default {
    components: {
        Menu,
        Page
    },
    mounted () {
        new WOW().init();
    },
    data() {
        return {
            list: [
                { id: 1, name: "精英团队" }
            ],
            typeName: '精英团队'
        };
    },
    methods: {
        itemClick (item) {
            this.typeName = item.name;
        }
    }
};
</script>

<style lang="less" scoped>
.banner_img {
    width: 100%;
    overflow: hidden;
    /*border-bottom: 2px solid #313131;*/
}
.banner_img img {
    display: block;
    margin: 0px auto;
}
.about_title {
    width: 50%;
    height: 60px;
    margin: 30px auto;
}
.about_title p {
    font-size: 30px !important;
    color: #666666 !important;
    text-align: center;
    font-weight: 400;
}
.about_title .pro {
    width: 220px;
    height: 30px;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.about_title .pro span {
    display: block;
    width: 50px;
    height: 1px;
    background: #9d9d9d;
}
.about_title .pro h3 {
    font-size: 24px;
    color: #333333;
    line-height: 30px;
}
.company {
    width: 1200px;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
    position: relative;
}
.company .empty {
    width: 200px;
    height: auto;
}
.company .common_wapr {
    width: 200px;
    height: auto;
    position: absolute;
    top: -40px;
    left: 0px;
    z-index: 66 !important;
}
.company .common_wapr .public_nav {
    width: 200px;
    height: auto;
    background: #0071c3;
}
.company .common_wapr .public_nav dt {
    height: 40px;
    font-size: 22px;
    color: #ffffff;
    text-align: center;
    line-height: 40px;
    font-weight: 700;
    border-bottom: 1px solid #ffffff;
    box-sizing: border-box;
}
.company .common_wapr .public_nav dd {
    text-align: center;
    height: 50px;
    color: #ffffff;
    font-size: 16px;
    line-height: 50px;
}
.company .common_wapr .public_nav dd a {
    display: block;
    width: 200px;
    height: 50px;
    color: #ffffff;
}
.company .common_wapr .public_nav dd a:hover {
    background: #015c9e;
}
.company .common_wapr .public_nav dd .cur {
    background: #015c9e;
}
.company .common_wapr .public_nav .cur {
    background: #015c9e;
}
.company .section_box {
    width: 900px;
    margin: 0px auto;
    overflow: hidden;
    .about_title {
        margin: 40px auto;
    }
    .tutor_top {
        width: 97%;
        height: 290px;
        margin: 0px auto;
        border: 1px solid #cccccc;
        background: #ffffff
            url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/tutor_top.jpg)
            no-repeat 0px 54px;
        margin-bottom: 40px;
        position: relative;
    }
}

.thr {
    position: absolute;
    bottom: 15px;
    left: 108px;
}
.company .section_box .tutor_top .jieshao {
    width: 460px;
    float: right;
    padding: 20px;
    .morr {
        display: block;
        width: 130px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        background: #0071c3;
        font-size: 16px;
        color: #ffffff;
        margin-top: 15px;
    }
    .gengduo {
        font-size: 14px;
        color: #333333;
        margin-top: 15px;
        line-height: 22px;
    }
    .touxian {
        width: 100%;
        p {
            font-size: 18px;
            color: #333333;
            line-height: 26px;
        }
    }
    h2 {
        border-right: 4px solid #0071c3;
        font-size: 26px;
        display: block;
        width: 90px;
        height: 25px;
        line-height: 24px;
        margin-bottom: 10px;
    }
}
.company .section_box .tutor_video {
    width: 800px;
    height: 450px;
    margin: 0px auto;
    border-radius: 5px;
    background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/yinying.png)
        no-repeat;
    background-position: bottom;
    padding-bottom: 27px;
    background-size: 98%;
    video {
        border-radius: 5px;
    }
}

.company .section_box .tea_list {
    width: 97%;
    margin: 30px auto;
    padding: 1%;
    display: flex;
    justify-content: space-between;
    flex-flow: wrap;
    li {
        width: 420px;
        height: 240px;
        background: #ffffff;
        margin-bottom: 60px;
        border-radius: 4px;
        border: 1px solid #cccccc;
        .img {
            width: 180px;
            height: 240px;
            overflow: hidden;
            float: left;
            img {
                width: 100%;
            }
        }
        .jieshao {
            width: 230px;
            height: 270px;
            float: right;
            overflow: hidden;
        }
    }
}

.company .section_box .tea_list li .jieshao h2 {
    width: 70px;
    border-right: 4px solid #0071c3;
    font-size: 20px;
    color: #333333;
    height: 20px;
    line-height: 20px;
    margin: 12px 0px;
}
.company .section_box .tea_list li .jieshao .touxian {
    width: 100%;
    font-size: 16px !important;
    color: #333333;
    line-height: 26px;
    p {
        font-size: 16px !important;
        color: #333333;
        line-height: 26px;
    }
}
.company .section_box .tea_list li .jieshao .gengduo {
    font-size: 12px;
    color: #333333;
    margin-top: 10px;
    line-height: 22px;
    border-top: 1px dashed #bfbfbf;
    margin-right: 10px;
    padding-top: 5px;
    color: #999999;
}
.company .section_box .tea_list li .jieshao .morr {
    display: block;
    width: 130px;
    height: 30px;
    text-align: center;
    line-height: 30px;
    background: #0071c3;
    font-size: 16px;
    color: #ffffff;
    margin-top: 15px;
}
</style>
