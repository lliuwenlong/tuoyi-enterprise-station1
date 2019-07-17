<template>
    <div class="head_nav head_nav2" ref="nav">
        <div class="head_box">
            <div class="nav_logo">
                <img
                    src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/logo.png"
                />
            </div>

            <ul class="nav_list">
                <li>
                    <a href="index.html">
                        <span>首页</span>
                        <span>Home page</span>
                    </a>
                </li>
                <div class="nav_xian"></div>
                <li>
                    <a href="introduce.html">
                        <span>格勤介绍</span>
                        <span>Introduce</span>
                    </a>
                    <div class="children" id="dre1">
                        <dl class="children_wrap"></dl>
                    </div>
                </li>
                <div class="nav_xian"></div>
                <li>
                    <a href="schedule.html">
                        <span>格勤课程</span>
                        <span>Curriculum</span>
                    </a>
                    <div class="children" id="dre2">
                        <dl class="children_wrap">
                            <dd>
                                <a href="schedule.html">· 格勤课程表</a>
                            </dd>
                            <dd>
                                <a href="yyxtb.html">· 运营系统班</a>
                            </dd>
                            <dd>
                                <a href="xtyyg.html">· 系统运营官</a>
                            </dd>
                            <dd>
                                <a href="etdfh.html">· 二梯队孵化</a>
                            </dd>
                            <dd>
                                <a href="gqdll.html">· 股权战略</a>
                            </dd>
                            <dd>
                                <a href="merchant.html">· 勤商会</a>
                            </dd>
                        </dl>
                    </div>
                </li>
                <div class="nav_xian"></div>
                <li class="cur">
                    <a href="lrqd.html">
                        <span class="cur">裂变式增长</span>
                        <span class="cur">Profit</span>
                    </a>
                    <div class="children" id="dre3">
                        <dl class="children_wrap"></dl>
                    </div>
                </li>

                <div class="nav_xian"></div>
                <li>
                    <a href="ddkt.html">
                        <span>到答课堂</span>
                        <span>Daoda</span>
                    </a>
                </li>
                <div class="nav_xian"></div>
                <li>
                    <a href="team.html">
                        <span>师资力量</span>
                        <span>Faculty</span>
                    </a>
                    <div class="children" id="dre5">
                        <dl class="children_wrap">
                            <dd>
                                <a href="team.html">· 精英团队</a>
                            </dd>
                        </dl>
                    </div>
                </li>
                <div class="nav_xian"></div>
                <li>
                    <a href="case.html">
                        <span>客户案例</span>
                        <span>Customer case</span>
                    </a>
                    <div class="children" id="dre6">
                        <dl class="children_wrap">
                            <dd>
                                <a href="qclsxy.html">· 汽车零售行业</a>
                            </dd>
                            <dd>
                                <a href="case1.html">· 餐饮管理</a>
                            </dd>
                            <dd>
                                <a href="case4.html">· 生产制造</a>
                            </dd>
                            <dd>
                                <a href="case2.html">· 医疗服务</a>
                            </dd>
                            <dd>
                                <a href="case5.html">· 工程机械</a>
                            </dd>
                            <dd>
                                <a href="case3.html">· 商贸百货</a>
                            </dd>
                            <dd>
                                <a href="case6.html">· 服饰加工</a>
                            </dd>
                            <dd>
                                <a href="case7.html">· 其他</a>
                            </dd>
                        </dl>
                    </div>
                </li>
                <div class="nav_xian"></div>
                <li>
                    <a href="join.html">
                        <span>渠道加盟</span>
                        <span>Cooperation</span>
                    </a>
                    <div class="children" id="dre7">
                        <dl class="children_wrap"></dl>
                    </div>
                </li>
                <div class="nav_xian"></div>
                <li>
                    <a href="geqinNews.html">
                        <span>格勤观点</span>
                        <span>Viewpoint</span>
                    </a>
                    <div class="children" id="dre8">
                        <dl class="children_wrap">
                            <dd>
                                <a href="geqinNews.html">· 格勤新闻</a>
                            </dd>
                            <dd>
                                <a href="mgmtNews.html">· 管理视界</a>
                            </dd>
                            <dd>
                                <a href="lrcs.html">· 利润常识</a>
                            </dd>
                            <dd>
                                <a href="qyzl.html">· 经营常识</a>
                            </dd>
                        </dl>
                    </div>
                </li>
                <div class="nav_xian"></div>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        window.addEventListener("scroll", this.scrollHandler, true);
    },
    beforeDestroy () {
        window.removeEventListener("scroll", this.scrollHandler);
    },
    methods: {
        scrollHandler (e) {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
            if (scrollTop > 100) {
                this.$refs.nav.style.background = "#fff";
            } else {
                this.$refs.nav.style.background = "none";
            }
        }
    }
};
</script>
<style lang="less" scoped>
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
}
.head_nav .nav_list {
    width: 1050px;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100px;
}
.head_nav .nav_list li {
    width: 100px;
    text-align: center;
    height: 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.head_nav .nav_list li a {
    display: block;
    text-align: center;
    width: 100%;
}
.head_nav .nav_list li a span {
    display: block;
    font-family: MicrosoftYaHei;
    font-size: 18px;
    color: #333333;
    line-height: 30px;
}
.head_nav .nav_list li a span:last-child {
    font-size: 14px;
    font-family: BaskOldFace;
    color: #dddddd;
}
.head_nav .nav_list li a .cur {
    color: #0071c3;
}
.head_nav .nav_list li:hover a span {
    color: #0071c3;
}
.head_nav .nav_list li:hover .children {
    display: block;
}
.head_nav .nav_list .nav_xian,
.head_nav .nav_list .nav_xian2 {
    display: block;
    width: 1px;
    height: 40px;
    background: #999999;
}
.head_nav .nav_list .nav_xian:last-child {
    display: none;
}
.head_nav .nav_list .nav_xian2:last-child {
    display: none;
}
/*浜岀骇椤甸潰瀵艰埅*/
.head_nav2 {
    width: 100%;
    background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/nav_bj.png)
        no-repeat;
    /*background: none;*/
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    height: 100px;
    margin: 0px auto;
    position: fixed;
    z-index: 999;
    left: 0px;
    top: 0px;
}
.head_nav2 .head_box {
    width: 1200px;
    height: 100px;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
}
.head_nav2 .head_box .nav_logo {
    width: 200px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.head_nav2 .head_box .nav_list {
    width: 1000px;
}
.head_nav2 .nav_list li.cur {
    background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/nav_cur.png)
        0px 23px no-repeat;
}
.head_nav2 .nav_list li:hover {
    background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/nav_cur.png)
        0px 23px no-repeat;
}
.head_nav2 .nav_list li a span {
    display: block;
    font-family: MicrosoftYaHei;
    font-size: 18px;
    color: #ffffff;
    line-height: 30px;
}
.head_nav2 .nav_list li a span:last-child {
    font-size: 12px;
    font-family: BaskOldFace;
    color: #ffffff;
}
.head_nav2 .nav_list li a span {
    display: block;
    font-family: MicrosoftYaHei;
    font-size: 18px;
    color: #ffffff;
    line-height: 30px;
}
.head_nav2 .nav_list li a .cur {
    color: #ffffff;
}
.head_nav2 .nav_list li:hover a span {
    color: #ffffff;
}
.head_nav2 .nav_list li a .curs {
    color: #0071c3 !important;
}
.head_nav2 .nav_list .nav_xian {
    display: none;
}
.head_nav2 .head_box .nav_list .children {
    width: 100%;
    height: 30px;
    background: #000000;
    opacity: 0.5;
    position: absolute;
    top: 100px;
    left: 0px;
    display: none;
}
.head_nav2 .head_box .nav_list .children .children_wrap {
    height: 30px;
    width: 980px;
    position: absolute;
    left: 50%;
    margin-left: -400px;
    display: flex;
    align-items: center;
}
.head_nav2 .head_box .nav_list .children .children_wrap dd {
    width: 125px;
}
.head_nav2 .head_box .nav_list .children .children_wrap dd a {
    color: #ffffff;
}
</style>

