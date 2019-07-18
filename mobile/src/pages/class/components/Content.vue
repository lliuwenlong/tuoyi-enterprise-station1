<template>
    <div>
        <div id="banner">
            <img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannnes4.jpg">
        </div>
        <div id="daoda">
            <section class="answer">
                <div class="about_title wow fadeInDown" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="pro">
                        <span></span>
                        <h3>到答课堂</h3>
                        <span></span>
                    </div>
                    <p style="margin:5px">DAODA CLASSROOM</p>
                </div>
                <div class="dada_js">
                    <ul>
                        <li>到答课堂是一款个人专属移动课堂</li>
                        <li>提供实效的企业管理方法和前沿商业思想是创业者、企业家、</li>
                        <li>高管、职业经理等人群从0到1,1到N的实战商学平台</li>
                    </ul>
                    <!-- <br>到答课堂是一款个人专属移动课堂,
                    <br>提供实效的企业管理方法和前沿商业思想是创业者、企业家、
                    <br>高管、职业经理等人群从0到1,1到N的实战商学平台 -->
                </div>
                <div class="biao">
                    <img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/daoda_biao.png">
                </div>
            </section>
            <section class="youshi">
                <ul>
                    <li><span>语音课程</span>：上下班途中听到答碎片化时间上到答</li>
                    <li><span>视频课程</span>：每周两集战略、股权、财务、法律、薪酬、积分课程</li>
                    <li><span>到答商城</span>：企业管理图书，操作手册在线平台直接购买</li>
                    <li><span>边学边赚</span>：程学习结束分享朋友圈，好友学习亦可获取奖金</li>
                    <li><span>精选好文</span>：世界百强知名企业内部管理干货精选案列展示</li>
                </ul>
            </section>
            <!-- <section class="youshi">
                <p class="yous">
                    <span>语音课程</span>：上下班途中听到答碎片化时间上到答</p>
                <p class="yous">
                    <span>视频课程</span>：每周两集战略、股权、财务、法律、薪酬、积分课程</p>
                <p class="yous">
                    <span>到答商城</span>：企业管理图书，操作手册在线平台直接购买</p>
                <p class="yous">
                    <span>边学边赚</span>：课程学习结束分享朋友圈，好友学习亦可获取奖金</p>
                <p class="yous">
                    <span>精选好文</span>：世界百强知名企业内部管理干货精选案列展示</p>
            </section> -->
            <section class="video">
                <img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/daoda_video.jpg">
                <video id="video" loop="loop" controls="controls" poster="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/qiye_video.jpg">
                    <!--<source src="http://1253819261.vod2.myqcloud.com/372765c5vodgzp1253819261/a8a753914564972818516632474/HDsW5ALLu5MA.mp4" type="video/mp4">-->
                    <source src="http://1253819261.vod2.myqcloud.com/372765c5vodgzp1253819261/30e37eaf5285890780621953165/A3PUaBYraccA.mp4" type="video/mp4">
                </video>
                <div class="v">
                    <img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/v.png" alt="">
                </div>
            </section>
            <section class="daoda-img">
                <img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/daoda1.jpg">
            </section>
            <section class="daoda-img">
                <img src="http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/daoda2.jpg">
            </section>
        </div>
        <section class="footer"></section>
    </div>
</template>

<script>
export default {
    name:'ClassContent'
}
</script>

<style scoped>

        /*到答课堂页面*/
        #banner img{
            width: 100%;
        }
        #daoda {
            width: 100%;
        }

        #daoda .answer {
            width: 94%;
            margin: 0px auto;
            background: #FFFFFF;
            overflow: hidden;
            padding: 5% 0px;
            border-radius: 8px;
            position: relative;
            top: -30px;
            box-shadow: 0px 0px 10px #CCCCCC;
        }

        #daoda .answer .daoda_title {
            width: 50%;
            margin: 0px auto;
            padding: 10px 0px;
        }

        #daoda .answer .daoda_title img {
            width: 100%;
        }

        #daoda .answer .dada_js {
            width: 92%;
            color: #333333;
            font-size: 1.2rem;
            font-size: 12px;
            border-radius: 3px;
            /* margin: 10px auto; */
            background: #ececec;
            text-align: center;
            padding: 2%;
            line-height: 1.7rem;
            line-height: 17px;
        }
        #daoda .answer .dada_js  li{
            margin:10px;
            line-height: 28px;
            padding-top: 15px;
        }


        #daoda .answer .biao {
            width: 88%;
            overflow: hidden;
            margin: 20px auto;
        }

        #daoda .answer .biao img {
            width: 100%;
        }

        #daoda .youshi {
            width: 85%;
            background: #FFFFFF;
            margin: 0px auto;
            margin-bottom: 12%;
        }
        #daoda .youshi li{
            margin: 15px auto;
            line-height: 30px;
        }
        #daoda .youshi .yous {
            width: 90%;
            margin: 0px auto;
            font-size: 1.1rem;
            font-size: 11px;
            color: #333333;
            line-height: 2rem;
            line-height: 20px;
            padding-left: 8%;
        }
        #daoda .youshi span {
            font-size: 1.1rem;
            font-size: 11px;
            color: #333333;
            font-weight: 600;
        }

        #daoda .video {
            width: 100%;
            margin-top: -20px;
            border-top: 1px solid #cfcfcf;
            position: relative;
            overflow: hidden;
        }

        #daoda .video img {
            width: 100%;
        }

        #daoda .video #video {
            width: 85%;
            height: 50% !important;
            position: absolute;
            top: 25%;
            left: 7.5%;
        }

        #daoda .video #video source {
            width: 100%;
        }

        #daoda .video .v {
            position: absolute;
            top: 75%;
            left: 7.5%;
            width: 85%;
        }

        #daoda .video .v img {
            width: 100%;
        }

        #daoda .daoda-img {
            width: 100%;
            overflow: hidden;
        }

        #daoda .daoda-img img {
            width: 100%;
        }

        #daoda .daoda-img:last-child img {
            margin-top: -8px;
            display: block;
        }

        /* 公司介绍 */

        .about_title {
            width: 100%;
            text-align: center;
        }

        .about_title .pro {
            width: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .about_title .pro h3 {
            color: #1680cc;
            font-size: .5rem;
            /* font-size: 25px; */
            padding: 0px 3%;
            letter-spacing: 2px;
            font-weight: 700;
        }

        .about_title .pro span {
            display: block;
            width: 12%;
            height: 2px;
            background: #666666;
        }

        .about_title p {
            width: 100%;
            color: #666666;
            font-size: 1rem;
            font-size: 10px;
            text-transform: uppercase;
        }
    </style>