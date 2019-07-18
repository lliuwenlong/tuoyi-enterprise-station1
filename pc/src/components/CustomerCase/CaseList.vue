<template>
    <div class="section_box case_box">
        <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
            <p>CUSTOMER CASE</p>
            <div class="pro">
                <span></span>
                <h3>{{typeName}}</h3>
                <span></span>
            </div>
        </div>
        <div class="case_list">
            <CaseItem 
                v-for="(item, key) in list" :key="key"
                :img="item.img"
                :href="item.href"
                :achievements="item.achievements"
                :learningCourses="item.learningCourses"
                :industry:="item.industry"
                :time="item.time"
                :name='item.name'
            />
        </div>
    </div>
</template>
<script>
import CaseItem from './CaseItem.vue';
export default {
    components: {
        CaseItem
    },
    props: {
        typeName: {
            type: String,
            default: ''
        }
    },
    data () {
        return {
            list: [
                {
                    img: 'http://www.igeqin.com/Upload/153354261840.png',
                    href: 'case1/1483.html',
                    achievements: '导入积分／岗位量化之后整体总体产量提升33%；员工积极性全面激活 主动承担 主动加班 关注结果；营业额2018年同比增长...',
                    learningCourses: '运营系统班',
                    industry: '餐饮',
                    time: '2017年8月',
                    name: '诸城市晨翔食品有限公司'
                },
                {
                    img: 'http://www.igeqin.com/Upload/153354261840.png',
                    href: 'case1/1483.html',
                    achievements: '导入积分／岗位量化之后整体总体产量提升33%；员工积极性全面激活 主动承担 主动加班 关注结果；营业额2018年同比增长...',
                    learningCourses: '运营系统班',
                    industry: '餐饮',
                    time: '2017年8月',
                    name: '诸城市晨翔食品有限公司'
                },
                {
                    img: 'http://www.igeqin.com/Upload/153354261840.png',
                    href: 'case1/1483.html',
                    achievements: '导入积分／岗位量化之后整体总体产量提升33%；员工积极性全面激活 主动承担 主动加班 关注结果；营业额2018年同比增长...',
                    learningCourses: '运营系统班',
                    industry: '餐饮',
                    time: '2017年8月',
                    name: '诸城市晨翔食品有限公司'
                },
                {
                    img: 'http://www.igeqin.com/Upload/153354261840.png',
                    href: 'case1/1483.html',
                    achievements: '导入积分／岗位量化之后整体总体产量提升33%；员工积极性全面激活 主动承担 主动加班 关注结果；营业额2018年同比增长...',
                    learningCourses: '运营系统班',
                    industry: '餐饮',
                    time: '2017年8月',
                    name: '诸城市晨翔食品有限公司'
                },
                {
                    img: 'http://www.igeqin.com/Upload/153354261840.png',
                    href: 'case1/1483.html',
                    achievements: '导入积分／岗位量化之后整体总体产量提升33%；员工积极性全面激活 主动承担 主动加班 关注结果；营业额2018年同比增长...',
                    learningCourses: '运营系统班',
                    industry: '餐饮',
                    time: '2017年8月',
                    name: '诸城市晨翔食品有限公司'
                },
                {
                    img: 'http://www.igeqin.com/Upload/153354261840.png',
                    href: 'case1/1483.html',
                    achievements: '导入积分／岗位量化之后整体总体产量提升33%；员工积极性全面激活 主动承担 主动加班 关注结果；营业额2018年同比增长...',
                    learningCourses: '运营系统班',
                    industry: '餐饮',
                    time: '2017年8月',
                    name: '诸城市晨翔食品有限公司'
                }
            ]
        };
    }
};
</script>
<style lang="less" scoped>
.company .section_box {
    width: 900px;
    margin: 0px auto;
    overflow: hidden;
}
.company .section_box .about_title {
    margin: 40px auto;
    width: 300px;
    p {
        font-size: 30px;
    }
}
.company .section_box .tutor_top {
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
.thr {
    position: absolute;
    bottom: 15px;
    left: 108px;
}
.company .section_box .tutor_top .jieshao {
    width: 460px;
    float: right;
    padding: 20px;
}
.company .section_box .tutor_top .jieshao h2 {
    border-right: 4px solid #0071c3;
    font-size: 26px;
    display: block;
    width: 90px;
    height: 25px;
    line-height: 24px;
    margin-bottom: 10px;
}
.company .section_box .tutor_top .jieshao .touxian {
    width: 100%;
}
.company .section_box .tutor_top .jieshao .touxian p {
    font-size: 18px;
    color: #333333;
    line-height: 26px;
}
.company .section_box .tutor_top .jieshao .gengduo {
    font-size: 14px;
    color: #333333;
    margin-top: 15px;
    line-height: 22px;
}
.company .section_box .tutor_top .jieshao .morr {
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
}
.company .section_box .tutor_video video {
    border-radius: 5px;
}
.company .section_box .tea_list {
    width: 97%;
    margin: 30px auto;
    padding: 1%;
    display: flex;
    justify-content: space-between;
    flex-flow: wrap;
}
.company .section_box .tea_list li {
    width: 420px;
    height: 240px;
    background: #ffffff;
    margin-bottom: 60px;
    border-radius: 4px;
    border: 1px solid #cccccc;
}
.company .section_box .tea_list li .img {
    width: 180px;
    height: 240px;
    overflow: hidden;
    float: left;
}
.company .section_box .tea_list li .img img {
    width: 100%;
}
.company .section_box .tea_list li .jieshao {
    width: 230px;
    height: 270px;
    float: right;
    overflow: hidden;
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
}
.company .section_box .tea_list li .jieshao .touxian p {
    font-size: 16px !important;
    color: #333333;
    line-height: 26px;
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
