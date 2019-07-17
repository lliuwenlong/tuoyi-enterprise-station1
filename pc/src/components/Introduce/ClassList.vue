<template>
    <div class="classSystem">
        <div class="about_title wow fadeInDown" data-wow-delay="0.2s">
            <p>CURRICULUM</p>
            <div class="pro">
                <span></span>
                <h3>课程体系</h3>
                <span></span>
            </div>
        </div>
        <div class="classList">
            <div class="wow rotateInDownLeft classList-item cur" data-wow-delay="0.1s">
                <h2>《裂变式增长》</h2>
                <span class="se"></span>
                <p>
                    成为第一的
                    <br />商业逻辑
                </p>
                <div class="cls_er">
                    <a href="lrqd.html">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/cls_er.png"
                            alt
                        />
                    </a>
                </div>
            </div>
            <div class="wow rotateInDownLeft classList-item" data-wow-delay="0.2s">
                <h2>《运营系统班》</h2>
                <span class="se"></span>
                <p>
                    从战略到运营配称的
                    <br />持续发展系统
                </p>
                <div class="cls_er">
                    <a href="yyxtb.html">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/cls_er.png"
                            alt
                        />
                    </a>
                </div>
            </div>
            <div class="wow rotateInDownLeft classList-item" data-wow-delay="0.3s">
                <h2>《系统运营官》</h2>
                <span class="se"></span>
                <p>
                    打造激活组织系统
                    <br />核心圈
                </p>
                <div class="cls_er">
                    <a href="xtyyg.html">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/cls_er.png"
                            alt
                        />
                    </a>
                </div>
            </div>
            <div class="wow rotateInDownLeft classList-item" data-wow-delay="0.4s">
                <h2>《二梯队孵化》</h2>
                <span class="se"></span>
                <p>
                    团队生长
                    <br />企业重生
                </p>
                <div class="cls_er">
                    <a href="etdfh.html">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/cls_er.png"
                            alt
                        />
                    </a>
                </div>
            </div>
            <div class="wow rotateInDownLeft classList-item" data-wow-delay="0.5s">
                <h2>《股权战略》</h2>
                <span class="se"></span>
                <p>
                    打造内部上市体系
                    <br />构造持股平台
                </p>
                <div class="cls_er">
                    <a href="gqdll.html">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/cls_er.png"
                            alt
                        />
                    </a>
                </div>
            </div>
            <div class="wow rotateInDownLeft classList-item" data-wow-delay="0.7s">
                <h2>《勤商会》</h2>
                <span class="se"></span>
                <p>
                    打造全球第一大商帮
                    <br />构建商界共同体
                </p>
                <div class="cls_er">
                    <a href="hdhkc.html">
                        <img
                            src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/cls_er.png"
                            alt
                        />
                    </a>
                </div>
            </div>
        </div>
        <div class="cl_img">
            <img src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/bj_04.png" />
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang="less" scoped>
.classSystem {
    width: 1200px;
    height: 740px;
    margin: 0px auto;
    position: relative;
}
.classSystem .about_title {
    margin-top: 80px;
}
.classSystem .classList {
    width: 1260px;
    height: auto;
    display: flex;
    flex-wrap: wrap;
    margin-top: 60px;
}
.classSystem .classList .classList-item {
    width: 180px;
    height: 280px;
    border: 1px solid #ffffff;
    cursor: pointer;
    margin-bottom: 40px;
    margin-right: 60px;
}
.classSystem .classList .classList-item h2 {
    font-size: 24px;
    color: #333333;
    text-align: center;
    margin-top: 35px;
}
.classSystem .classList .classList-item .se {
    width: 36px;
    height: 4px;
    background: #0071c3;
    display: block;
    margin-left: 30px;
    margin-top: 20px;
}
.classSystem .classList .classList-item p {
    padding-left: 30px;
    font-size: 16px;
    color: #333333;
    margin-top: 20px;
}
.classSystem .classList .classList-item .cls_er {
    width: 40px;
    height: 40px;
    margin-left: 30px;
    margin-top: 50px;
    display: none;
}
.classSystem .classList .cur {
    border: 1px solid #999999;
    .cls_er {
        display: block;
    }
}
.classSystem .cl_img {
    position: absolute;
    right: 0px;
    bottom: -65px;
}
</style>
