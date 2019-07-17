<template>
    <div class="case_list_item">
        <div class="li_img">
            <img :src="img" alt="诸城市晨翔食品有限公司" />
        </div>
        <div class="right_left">
            <h2>
                <a :href="href">{{name}}</a>
            </h2>
            <p>
                <span>成果</span>
                ：
                {{achievements}}
                <a href="javascript:void(0)">点击详情>></a>
            </p>
            <div class="prolist">
                <span class="span1">
                    学习课程：
                    <i>《{{learningCourses}}》</i>
                </span>
                <span class="span2">行业：{{industry}}</span>
                <span class="span3">上课时间：{{time}}</span>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        img: {
            type: String,
            default: ''
        },
        name: {
            type: String,
            default: ''
        },
        href: {
            type: String,
            default: ''
        },
        achievements: {
            type: String,
            default: ''
        },
        learningCourses: {
            type: String,
            default: ''
        },
        industry: {
            type: String,
            default: ''
        },
        time: {
            type: String,
            default: ''
        }
    }
};
</script>
<style lang="less" scoped>
.company .case_box .case_list .case_list_item {
    width: 96%;
    margin: 0px auto;
    height: 145px;
    padding: 1.5%;
    box-shadow: 0px 0px 5px #cacaca;
    border-radius: 3px;
    margin-bottom: 50px;
}
.company .case_box .case_list .case_list_item .li_img {
    width: 270px;
    overflow: hidden;
    height: 145px;
    float: left;
}
.company .case_box .case_list .case_list_item .li_img img {
    width: 100%;
}
.company .case_box .case_list .case_list_item .right_left {
    width: 575px;
    height: 145px;
    float: right;
}
.company .case_box .case_list .case_list_item .right_left h2 {
    font-size: 20px;
    color: #333333;
    margin-bottom: 10px;
}
.company .case_box .case_list .case_list_item .right_left h2:hover a {
    color: #0071c3;
}
.company .case_box .case_list .case_list_item .right_left p {
    display: block;
    width: 100%;
    height: 65px;
    font-size: 14px;
    color: #666666;
    line-height: 28px;
}
.company .case_box .case_list .case_list_item .right_left p span {
    font-weight: 600;
    color: #333333;
}
.company .case_box .case_list .case_list_item .right_left p a {
    color: #0071c3;
}
.company .case_box .case_list .case_list_item .right_left .prolist {
    width: 100%;
    overflow: hidden;
    margin-top: 15px;
    display: flex;
}
.company .case_box .case_list .case_list_item .right_left .prolist span {
    padding-left: 20px;
    display: block;
    float: left;
    font-size: 16px;
    margin-right: 10px;
    background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/ico2.png)
        no-repeat 0px 3.5px;
}
.company .case_box .case_list .case_list_item .right_left .prolist span i {
    color: #0071c3;
    font-style: normal;
}
.company .case_box .case_list .case_list_item .right_left .prolist .span2 {
    background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/ico2.png)
        no-repeat 0px -80px;
}
.company .case_box .case_list .case_list_item .right_left .prolist .span3 {
    background: url(http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/ico2.png)
        no-repeat 0px -156px;
}
</style>
