<template>
    <div class="news_wrap">
        <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
            <p>NEWS INFORMATION</p>
            <div class="pro">
                <span></span>
                <h3>新闻动态</h3>
                <span></span>
            </div>
        </div>
        <div class="news_box">
            <div class="news_lest wow fadeInLeft" data-wow-delay="0.2s">
                <div class="news-img">
                    <img src="http://www.igeqin.com/Upload/156205684452.jpg" alt />
                    <div class="time">
                        <span>02</span>
                        <p>2019-07</p>
                    </div>
                </div>
                <h2>
                    <a href="geqinNews/1947.html">为中小企业发展赋能增效 格勤加入《中国中...</a>
                </h2>
                <p>2019年6月26日，第七届“中国中小企业投融资交易会暨金融服务民营企业成果交流展”在北京举办，会中...</p>
                <a href="geqinNews.html" class="pro_more">查看更多+</a>
            </div>
            <div class="news_right">
                <ul class="news_list">
                    <li class="wow fadeInUp" data-wow-delay="0.0s">
                        <a href="mgmtNews/1870.html">
                            <div class="shijian">
                                <span>18</span>
                                <span class="sj">2019-04</span>
                            </div>
                            <div class="n_title">瑞幸咖啡完成1.5亿美元B+轮融资 投后估值29亿美元</div>
                            <div class="more_right"></div>
                        </a>
                    </li>
                    <li class="wow fadeInUp" data-wow-delay="0.2s">
                        <a href="mgmtNews/1797.html">
                            <div class="shijian">
                                <span>25</span>
                                <span class="sj">2019-02</span>
                            </div>
                            <div class="n_title">《裂变式增长》口碑裂变 -- 三只松鼠“爆发式”增长！</div>
                            <div class="more_right"></div>
                        </a>
                    </li>
                    <li class="wow fadeInUp" data-wow-delay="0.4s">
                        <a href="mgmtNews/1796.html">
                            <div class="shijian">
                                <span>25</span>
                                <span class="sj">2019-02</span>
                            </div>
                            <div class="n_title">luckin coffee瑞辛咖啡的裂变之路--《裂变式增长》</div>
                            <div class="more_right"></div>
                        </a>
                    </li>
                    <li class="wow fadeInUp" data-wow-delay="0.6s">
                        <a href="mgmtNews/1731.html">
                            <div class="shijian">
                                <span>21</span>
                                <span class="sj">2019-01</span>
                            </div>
                            <div class="n_title">新经济新常态下企业如何发现利润区</div>
                            <div class="more_right"></div>
                        </a>
                    </li>
                    <li class="wow fadeInUp" data-wow-delay="0.8s">
                        <a href="mgmtNews/1711.html">
                            <div class="shijian">
                                <span>05</span>
                                <span class="sj">2018-12</span>
                            </div>
                            <div class="n_title">中国品牌之路的崛起，瑞幸咖啡仅半年异军突起，传统企业应该如何转型？</div>
                            <div class="more_right"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'new-list'
}
</script>
<style lang="less" scoped>
.news_wrap {
	width: 1200px;
	margin: 70px auto;
    overflow: hidden;
    .about_title {
        width: 367px;
        margin: 0px auto;
        p {
            font-size: 32px;
            color: #666666;
            text-align: center;
            font-weight: 400;
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
    }
    .news_box {
        width: 1200px;
        overflow: hidden;
        margin: 30px auto;
        display: flex;
        justify-content: space-between;
        flex-flow: wrap;
        .news_lest {
            width: 550px;
            height: 550px;
            float: left;
            .news-img {
                width: 540px;
                height: 350px;
                overflow: hidden;
                position: relative;
                background: #0071C3;
                img {
                    display: block;
                    width: 100%;
                    transition: All 0.6s;
                    -webkit-transition: All 0.6s;
                    -moz-transition: All 0.6s;
                    -o-transition: All 0.6s;
                    &:hover{ 
                        transform: scale(1.2);
                        -webkit-transform: scale(1.2);
                        -moz-transform: scale(1.2);
                        -o-transform: scale(1.2);
                        -ms-transform: scale(1.2);
                    }
                }
                 .time {
                    width: 85px;
                    height: 80px;
                    background: #0071c3;
                    position: absolute;
                    top: 0px;
                    left: 30px;
                    span {
                        color: #FFFFFF;
                        font-size: 30px;
                        text-align: center;
                        display: block;
                        line-height: 45px;
                    }
                    p {
                        display: block;
                        width: 100%;
                        text-align: center;
                        color: #FFFFFF;
                        font-size: 18px;
                        margin: 0px;
                    }
                }
            }
        }
    }
}

.news_wrap .news_box .news_lest h2 {
	display: block;
	width: 100%;
	margin-top: 30px;
}

.news_wrap .news_box .news_lest h2 a {
	color: #333333;
	font-size: 24px;
}

.news_wrap .news_box .news_lest h2 a:hover {
	color: #0071C3;
}

.news_wrap .news_box .news_lest p {
	display: block;
	width: 100%;
	color: #666666;
	font-size: 16px;
	line-height: 26px;
	margin-top: 10px;
}

.news_wrap .news_box .news_lest .pro_more {
	display: block;
	width: 180px;
	height: 40px;
	border: solid 1px #999999;
	font-size: 20px;
	color: #333333;
	text-align: center;
	line-height: 40px;
	margin-top: 30px;
}

.news_wrap .news_box .news_lest .pro_more:hover {
	color: #0071c3;
	border: solid 1px #0071c3;
}

.news_wrap .news_box .news_right {
	width: 600px;
	overflow: hidden;
}

.news_wrap .news_box .news_right .news_list {
	width: 600px;
	overflow: hidden;
}

.news_wrap .news_box .news_right .news_list li {
	width: 600px;
	height: 80px;
	overflow: hidden;
	border: 1px solid #999999;
	box-sizing: border-box;
	margin-bottom: 30px;
}

.news_wrap .news_box .news_right .news_list li a {
	display: block;
	width: 600px;
	height: 80px;
	overflow: hidden;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.news_wrap .news_box .news_right .news_list li a .shijian {
	width: 80px;
	height: 80px;
	margin-left: 25px;
}

.news_wrap .news_box .news_right .news_list li a .shijian span {
	color: #666666;
	font-size: 35px;
	display: block;
	text-align: center;
}

.news_wrap .news_box .news_right .news_list li a .shijian .sj {
	color: #666666;
	font-size: 18px;
	display: block;
	text-align: center;
}

.news_wrap .news_box .news_right .news_list li a .n_title {
	width: 340px;
	height: 80px;
	display: flex;
	align-items: center;
	font-size: 18px;
	color: #666666;
	line-height: 30px;
}

.news_wrap .news_box .news_right .news_list li a .more_right {
	width: 20px;
	height: 38px;
	display: flex;
	align-items: center;
	margin-right: 28px;
	// background: url(../images/images2/right_r1.png) no-repeat;
}

.news_wrap .news_box .news_right .news_list li a:hover {
	background: #0071C3;
	border: 1px solid #0071C3;
}

.news_wrap .news_box .news_right .news_list li a:hover .n_title {
	color: #FFFFFF;
}

.news_wrap .news_box .news_right .news_list li a:hover .shijian span {
	color: #FFFFFF;
}

.news_wrap .news_box .news_right .news_list li a:hover .more_right {
	// background: url(../images/images2/right_r2.png) no-repeat;
}
</style>

