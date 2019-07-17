<template>
    <div class="service_Items">
        <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
            <p>SERVICE ITEMS</p>
            <div class="pro">
                <span></span>
                <h3>服务项目</h3>
                <span></span>
            </div>
        </div>

        <div class="service_box">
            <ul class="service_list">
                <div class="se_list">
                    <li class="wow rotateInDownLeft" data-wow-delay="0.1s">
                        <h2>课前辅导</h2>
                        <span></span>
                        <p>
                            课程介绍
                            <br />企业调研
                            <br />课前沟通
                        </p>
                    </li>
                    <li class="wow rotateInDownLeft" data-wow-delay="0.2s">
                        <h2>开课期间</h2>
                        <span></span>
                        <p>
                            座谈答疑
                            <br />技术老师
                            <br />全程辅导
                        </p>
                    </li>
                    <li class="wow rotateInDownLeft" data-wow-delay="0.3s">
                        <h2>案例剖析</h2>
                        <span></span>
                        <p>
                            课程针对典型
                            <br />案例多维度
                            <br />深挖讲解
                        </p>
                    </li>
                    <li class="wow rotateInDownLeft" data-wow-delay="0.4s">
                        <h2>高端人脉</h2>
                        <span></span>
                        <p>
                            全国近10万
                            <br />名各行业
                            <br />企业家资源
                        </p>
                    </li>
                </div>

                <div class="se_list">
                    <li class="wow rotateInDownLeft" data-wow-delay="0.2s">
                        <h2>深入细节</h2>
                        <span></span>
                        <p>
                            深度分析企业
                            <br />运营问题
                            <br />并给建议
                        </p>
                    </li>
                    <li class="wow rotateInDownLeft" data-wow-delay="0.3s">
                        <h2>现场落实</h2>
                        <span></span>
                        <p>
                            运营班现场
                            <br />出方案确定
                            <br />执行人员
                        </p>
                    </li>
                    <li class="wow rotateInDownLeft" data-wow-delay="0.4s">
                        <h2>学员分享</h2>
                        <span></span>
                        <p>
                            成功学员分享
                            <br />信息互通
                            <br />资源共享
                        </p>
                    </li>
                    <li class="wow rotateInDownLeft" data-wow-delay="0.5s">
                        <h2>免费复训</h2>
                        <span></span>
                        <p>
                            课程落地难
                            <br />下期课程
                            <br />免费复训
                        </p>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang="less" scoped>
.service_Items {
    width: 100%;
    height: 800px;
    background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/bj_03.jpg) no-repeat;
    background-position: center;
    overflow: hidden;
}

.service_Items .about_title {
    width: 270px;
    margin: 60px auto;
}

.service_Items .about_title p {
    font-size: 32px;
    color: #666666;
    text-align: center;
    font-weight: 400;
}

.service_Items .about_title .pro {
    width: 220px;
    height: 30px;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.service_Items .about_title .pro span {
    display: block;
    width: 50px;
    height: 1px;
    background: #9d9d9d;
}

.service_Items .about_title .pro h3 {
    font-size: 24px;
    color: #333333;
    line-height: 30px;
}

.service_Items .service_box {
    width: 1200px;
    height: 373px;
    margin: 80px auto;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.service_Items .service_box .service_list {
    width: 890px;
    height: 310px;
    display: flex;
    align-content: space-between;
    flex-flow: wrap;
}

.service_Items .service_box .service_list .se_list {
    width: 100%;
    height: 121px;
    display: flex;
    justify-content: space-between;
    flex-flow: wrap;
}

.service_Items .service_box .service_list .se_list li {
    width: 143px;
    height: 121px;
    background: #ffffff;
}

.service_Items .service_box .service_list .se_list li h2 {
    font-size: 18px;
    color: #333333;
    text-align: center;
    line-height: 30px;
    margin-top: 7px;
}

.service_Items .service_box .service_list .se_list li span {
    display: block;
    background: #0071c3;
    height: 2px;
    width: 30px;
    margin: 5px auto;
}

.service_Items .service_box .service_list .se_list li p {
    width: 90px;
    margin: 0px auto;
    color: #666666;
    font-size: 14px;
    text-align: center;
}
</style>
