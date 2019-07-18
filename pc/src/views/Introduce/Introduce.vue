<template>
    <div>
        <div class="banner_img">
            <img
                src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/banner_01.jpg"
            />
        </div>
        <div class="top_news">
            <div class="top_news_warp">
                <div class="news_warp_left">
                    <p>VIEW</p>
                    <span></span>
                </div>
                <ul class="news_warp_center wow fadeIn" data-wow-delay="0.2s">
                    <li>
                        <span>2019-07-10</span>
                        <p>
                            <a href="geqinNews/1956.html">用足迹感知力量 格勤教育“沙漠BOSS能量秘训”再燃激情</a>
                        </p>
                    </li>
                    <li>
                        <span>2019-07-02</span>
                        <p>
                            <a href="geqinNews/1947.html">为中小企业发展赋能增效 格勤加入《中国中小企业培训服务联盟》</a>
                        </p>
                    </li>
                    <li>
                        <span>2019-07-02</span>
                        <p>
                            <a href="geqinNews/1946.html">构建裂变基因 格勤第89期《裂变式增长》课程打通企业利润增长...</a>
                        </p>
                    </li>
                    <li>
                        <span>2019-06-12</span>
                        <p>
                            <a href="geqinNews/1929.html">助学兴教显大爱 格勤教育海东青助学基金成立</a>
                        </p>
                    </li>
                </ul>
                <div class="news_warp_right">
                    <img
                        src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/view_news.jpg"
                    />
                </div>
            </div>
        </div>
        <Aboutus />
        <CorporateCulture />
        <Mission />
        <ClassList />
        <Honor />
        <PublishBook />
    </div>
</template>
<script>
import Aboutus from '@/components/Introduce/Aboutus.vue';
import CorporateCulture from '@/components/Introduce/CorporateCulture.vue';
import Mission from '@/components/Introduce/Mission.vue';
import ClassList from '@/components/Introduce/ClassList.vue';
import Honor from '@/components/Introduce/Honor.vue';
import PublishBook from '@/components/Introduce/PublishBook.vue';

import { WOW } from "wowjs";

export default {
    components: {
        Aboutus,
        CorporateCulture,
        Mission,
        ClassList,
        Honor,
        PublishBook
    },
    mounted () {
        new WOW().init();
    }
};
</script>
<style lang="less" scoped>
.banner_img {
    width: 100%;
    overflow: hidden;
    img {
        display: block;
        margin: 0px auto;
    }
}
.top_news {
    width: 100%;
    height: 150px;
    background: #f3f3f3;
    position: relative;
}
.top_news .top_news_warp {
    width: 1200px;
    margin: 0px auto;
    height: 140px;
    background: #ffffff;
    position: absolute;
    top: -40px;
    left: 50%;
    margin-left: -600px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.top_news .top_news_warp .news_warp_left {
    width: 180px;
    height: 140px;
}
.top_news .top_news_warp .news_warp_left p {
    text-align: center;
    margin-top: 26px;
    color: #0082da;
}
.top_news .top_news_warp .news_warp_left span {
    display: block;
    width: 46px;
    height: 2px;
    background: #0082da;
    margin: 0px auto;
}
.top_news .top_news_warp .news_warp_center {
    width: 670px;
    height: 100px;
    display: flex;
    align-content: space-between;
    flex-wrap: wrap;
}
.top_news .top_news_warp .news_warp_center li {
    width: 550px;
    display: flex;
    justify-content: flex-start;
}
.top_news .top_news_warp .news_warp_center li span {
    display: block;
    width: 120px;
    color: #333333;
    font-size: 14px;
}
.top_news .top_news_warp .news_warp_center li p {
    font-size: 14px;
}
.top_news .top_news_warp .news_warp_center li p a {
    color: #333333;
}
.top_news .top_news_warp .news_warp_center li:hover span {
    color: #0071c3;
}
.top_news .top_news_warp .news_warp_center li:hover p a {
    color: #0071c3;
}
.top_news .top_news_warp .news_warp_right {
    width: 247px;
    height: 140px;
}
</style>
