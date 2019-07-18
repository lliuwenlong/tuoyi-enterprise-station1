<template>
    <swiper :options="swiperOption" class="w100">
        <!-- slides -->
        <swiper-slide
            v-for="item of swiperList" 
            :key="item.id"
        >
            <img :src="item.imgUrl" alt="">
        </swiper-slide>
        <!-- Optional controls -->
        <!-- <div class="swiper-pagination"  slot="pagination"></div> -->
    </swiper>
</template>

<script>
export default {
    name:'HomeSwiper',
    data() {
        return {
            // swiperOption:{
            //     loop:true,
            // //     autoplay: {       
            // //         delay:1000000,
            // //         speed:100000,
            // //         disableOnInteraction: false
            // // 　　}
            // },
            swiperOption: {
            // 　　autoplay: {
            //         delay: 30000,
            //         duration:3000,
            //         speed:3000,
            //         disableOnInteraction: false // 手动切换之后继续自动轮播
            // 　　},
                observer: true, //修改swiper自己或子元素时，自动初始化swiper
                observeParents: true,
            　　loop: true
            },
            
            swiperList: [{
                id:'0002',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannne1.jpg'
            },{
                id:'0003',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannne2.jpg'
            },{
                id:'0004',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannne3.jpg'
            }]
        }
    }
}
</script>

<style lang="stylus" scoped>
    .w100 {
        width :100%;
    }
    .w100 img {
        width :100%;
    }
</style>
