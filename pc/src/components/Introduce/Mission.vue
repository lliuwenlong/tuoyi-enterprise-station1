<template>
    <div class="mission wow flipInX" data-wow-delay="0.2s">
        <ul class="sm_jz">
            <li>
                <h2>企业愿景</h2>
                <p>打造商业平台</p>
                <p>用教育孵化产业</p>
            </li>
            <li>
                <h2>使命</h2>
                <p>帮助企业提升管理</p>
                <p>成熟度，为中国成为</p>
                <p>世界第一经济强国</p>
                <p>而奋斗终身</p>
            </li>
            <li>
                <h2>价值观</h2>
                <p>客户第一 团队合作</p>
                <p>言行一致 追求品质</p>
                <p>敢于担当 持续成长</p>
            </li>
            <li>
                <h2>核心价值</h2>
                <p>实战 系统 超值</p>
            </li>
            <li>
                <h2>经营理念</h2>
                <p>敬畏规律</p>
                <p>真爱企业</p>
            </li>
            <li>
                <h2>企业信念</h2>
                <p>突破极限</p>
                <p>向不可能挑战</p>
            </li>
        </ul>
        <h2 class="sm_title">企业定位</h2>
        <!--<p class="sm_cont">帮助企业提升管理成熟度,为中国成为世界第一经济强国而奋斗终身</p>-->
        <p class="sm_cont">企业运营系统建设领先者</p>
    </div>
</template>
<script>
export default {};
</script>
<style lang="less" scoped>
.mission {
    width: 1200px;
    height: 365px;
    background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/bj_03.png) no-repeat;
    margin: 0px auto;
    margin-top: 30px;
}
.mission .sm_jz {
    width: 100%;
    display: flex;
    justify-content: space-between;
}
.mission .sm_jz li {
    width: 170px;
    height: 200px;
    position: relative;
}
.mission .sm_jz li h2 {
    margin-top: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    font-size: 24px;
    color: #ffffff;
    margin-bottom: 10px;
}
.mission .sm_jz li p {
    color: #ffffff;
    text-align: center;
    font-size: 16px;
    line-height: 20px;
}
.mission .sm_jz li .num {
    width: 100%;
    height: 40px;
    font-size: 22px;
    color: #fff;
    text-align: center;
    display: block;
    line-height: 40px;
    position: absolute;
    bottom: 10px;
}
.mission .sm_title {
    color: #333333;
    font-size: 24px;
    text-align: center;
    margin-top: 100px;
}
.mission .sm_cont {
    color: #333333;
    font-size: 16px;
    text-align: center;
}
</style>

