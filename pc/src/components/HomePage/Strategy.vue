<template>
    <div class="strategy">
        <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
            <p>CORE STRATEGY</p>
            <div class="pro">
                <span></span>
                <h3>管理战略</h3>
                <span></span>
            </div>
        </div>
        <div class="strategy_list wow fadeInUp" data-wow-delay="0.1s">
            <div class="s_left">
                <p>战略</p>
                <span class="sx"></span>
                <span class="sy">STRATEGY</span>
            </div>
            <div class="s_jian">
                多维度讲解企业如何
                <br />合理的搭建人才梯队
            </div>
            <ul class="s_right">
                <li>
                    <span>战略定位</span>
                    <p>将企业的产品、形象、品牌等在预期消费者的头脑中占居有利的位置。</p>
                </li>
                <li>
                    <span>产品设计</span>
                    <p>通过产品分级设计让客户持续购买。</p>
                </li>
                <li>
                    <span>裂变设计</span>
                    <p>打造可让公司持续盈利的商业模式。</p>
                </li>
            </ul>
        </div>
        <div class="strategy_list wow fadeInUp" data-wow-delay="0.3s">
            <div class="s_left">
                <p>人才</p>
                <span class="sx"></span>
                <span class="sy">PERSONNEL</span>
            </div>
            <div class="s_jian">
                多维度讲解企业如何
                <br />合理的搭建人才梯队
            </div>
            <ul class="s_right">
                <li>
                    <span>架构驱动</span>
                    <p>搭建企业组织架构，实现企业平台自驱动模式。</p>
                </li>
                <li>
                    <span>机制设计</span>
                    <p>设计激励性薪酬和晋升通道，吸引和留住优秀人才。</p>
                </li>
                <li>
                    <span>文化模式</span>
                    <p>打造企业核心文化，通过文化的力量去维护人心。</p>
                </li>
            </ul>
        </div>
        <div class="strategy_list wow fadeInUp" data-wow-delay="0.5s">
            <div class="s_left">
                <p>用户</p>
                <span class="sx"></span>
                <span class="sy">USER</span>
            </div>
            <div class="s_jian">
                超新思维讲解新老客
                <br />户如何激活增大利润
            </div>
            <ul class="s_right">
                <li>
                    <span>惊喜感</span>
                    <p>销售的产品或服务让客户产生惊喜，快乐体验，逐步依赖，保持购买。</p>
                </li>
                <li>
                    <span>高强深</span>
                    <p>通过产品设计让客户产生依赖，通过服务粘住客户。</p>
                </li>
                <li>
                    <span>换身份</span>
                    <p>打造事业共同体，实现产品和客户的裂变。</p>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang="less" scoped>
.strategy {
    width: 1200px;
    margin: 40px auto;
    overflow: hidden;
    height: 620px;
}

.strategy .about_title {
    width: 292px;
    margin: 0px auto;
    margin-bottom: 60px;
}

.strategy .about_title p {
    font-size: 32px;
    color: #666666;
    text-align: center;
    font-weight: 400;
}

.strategy .about_title .pro {
    width: 220px;
    height: 30px;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.strategy .about_title .pro span {
    display: block;
    width: 50px;
    height: 1px;
    background: #9d9d9d;
}

.strategy .about_title .pro h3 {
    font-size: 24px;
    color: #333333;
    line-height: 30px;
}

.strategy .strategy_list {
    width: 1200px;
    height: 140px;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-sizing: border-box;
    margin-bottom: 30px;
    border: solid 1px #cccccc;
}

.strategy .strategy_list .s_left {
    width: 80px;
    height: 80px;
    margin-left: 55px;
}

.strategy .strategy_list .s_left p {
    font-size: 24px;
    color: #333333;
}

.strategy .strategy_list .s_left .sx {
    display: block;
    width: 17px;
    height: 2px;
    background: #999999;
    margin-top: 5px;
    margin-bottom: 5px;
}

.strategy .strategy_list .s_left .sy {
    font-size: 12px;
    color: #333333;
}

.strategy .strategy_list .s_jian {
    width: 200px;
    height: 60px;
    font-size: 18px;
    color: #333333;
    line-height: 27px;
}

.strategy .strategy_list .s_right {
    width: 620px;
    height: 100px;
}

.strategy .strategy_list .s_right li {
    width: 100%;
    display: flex;
    margin-bottom: 12px;
}

.strategy .strategy_list .s_right li span {
    display: block;
    width: 80px;
    height: 24px;
    background-color: #808080;
    text-align: center;
    font-size: 16px;
    color: #ffffff;
}

.strategy .strategy_list .s_right li p {
    line-height: 24px;
    color: #333333;
    padding-left: 20px;
}
</style>
