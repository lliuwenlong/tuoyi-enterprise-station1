<template>
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
                <span id="1">7</span>
                <span id="2">12</span>
                <span id="3">20300</span>
                <span id="4">50</span>
                <span id="5">190</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'HomeNum'
}
let html1 = document.getElementsByTagName('html')[0]
</script>

<style scoped>
    .head_num {
        width: 100%;
        height: 80px;
        margin: 0px auto;
        background: url(http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bj_01.png) no-repeat;
        background-size: 100%;
        background-position: center;
        position: relative;
        top: -45px;
        z-index: 6;
        overflow: hidden;
    }
    .head_num .num_box {
        width: 100%;
        margin: 0px auto;
    }
    .head_num .num_box .box_top {
        width: 100%;
        display: flex;
        justify-content: space-between;
        line-height: 30px;
        margin-top: 15px;
    }
    .head_num .num_box .box_top span {
        color: #ffffff;
        font-size: 0.2rem;
        display: block;
        width: 25%;
        text-align: center;
        font-weight: 700;
    }

    .head_num .num_box .box_bottom {
        line-height: 20px;
        margin-top: 0px;
    }
    .box_bottom span {
        font-size: 0.2rem;
        font-weight: 700;
    }
</style>
