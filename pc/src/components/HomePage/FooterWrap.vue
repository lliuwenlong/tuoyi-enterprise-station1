<template>
    <footer>
        <div class="footer_box">
            <div class="footer_left">
                <div class="nav-list">
                    <a href="index.html">首页 |</a>
                    <a href="introduce.html">格勤介绍 |</a>
                    <a href="schedule.html">格勤课程 |</a>
                    <a href="lrqd.html">裂变式增长 |</a>
                    <a href="ddkt.html">到答课堂 |</a>
                    <a href="team.html">师资力量 |</a>
                    <a href="case.html">客户案例 |</a>
                    <a href="geqinNews.html">格勤观点 |</a>
                    <a href="join.html">渠道加盟</a>
                </div>
                <!--<div class="nav-list">
				<a href="javascript:;">友情链接：</a>
				<a href="http://www.mamingren.com" target="_blank" rel="nofollow">马明仁 | </a>
				<a href="http://www.haijipinge.com" target="_blank" rel="nofollow">海记品鸽 | </a>
				<a href="http://www.ipeidun.com" target="_blank" rel="nofollow">培顿教育 | </a>
				<a href="http://www.sfhaishen.com" target="_blank" rel="nofollow">圣丰海参 | </a>
				<a href="http://www.ituniang.com" target="_blank" rel="nofollow">土酿酒业 | </a>
				<a href="http://www.bazifood.com" target="_blank" rel="nofollow">巴子食品 | </a>
				<a href="http://www.xurihaiweiwang.com" target="_blank" rel="nofollow">旭日海味王</a> 
                </div>-->
                <div class="ipcs">
                    <img
                        src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/fot_logo.png"
                        alt
                    />
                    <div class="icp_box">
                        <p>
                            网站备案号:
                            <a
                                href="http://icp.chinaz.com/info?q=igeqin.com"
                                rel="nofollow"
                                target="_blank"
                            >京ICP备16042441号</a> &nbsp; Copyright©2018
                        </p>
                        <p>
                            <a
                                target="_blank"
                                class="gbeian beian"
                                href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11011202000919"
                                rel="nofollow"
                            >
                                <img
                                    src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/beian.png"
                                />京公网安备 11011202000919号
                            </a> &nbsp; 版权所有：北京格勤世纪教育科技有限公司
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer_right">
                <img
                    src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/fot_erma.png"
                />
            </div>
        </div>
    </footer>
</template>
<script>
export default {};
</script>
<style lang="less" scoped>
footer {
    width: 100%;
    background: #404040;
    padding: 20px 0px;
    overflow: hidden;
}

footer .footer_box {
    width: 1050px;
    margin: 0px auto;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

footer .footer_box .footer_left {
    width: 60%;
    overflow: hidden;
    padding-left: 20px;
    float: left;
}

footer .footer_box .footer_left .nav-list {
    width: 100%;
    text-align: left;
    height: 30px;
    line-height: 20px;
}

footer .footer_box .footer_left .nav-list a {
    color: #fff;
    font-size: 14px;
}

footer .footer_box .footer_left .ipcs {
    width: 100%;
    display: flex;
    align-items: center;
    height: 50px;
}

footer .footer_box .footer_left .ipcs img {
    display: block;
    float: left;
}

footer .footer_box .footer_left .ipcs .icp_box {
    overflow: hidden;
    float: left;
    margin-left: 10px;
}

footer .footer_box .footer_left .ipcs .icp_box p {
    font-size: 12px;
    color: #fff;
    line-height: 26px;
}

footer .footer_box .footer_left .ipcs .icp_box p a {
    font-size: 12px;
    color: #fff;
}

footer .footer_box .footer_right {
    float: right;
    width: 32%;
}
</style>
