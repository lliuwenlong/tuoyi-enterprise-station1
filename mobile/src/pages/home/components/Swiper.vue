<template>
    <swiper :options="swiperOption" >
        <!-- slides -->
        <swiper-slide v-for="item of swiperList" :key="item.id">
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
            swiperOption:{
                loop:true,
            //     autoplay: {       
            //         delay:1000000,
            //         speed:100000,
            //         disableOnInteraction: false
            // 　　}
            },
            
            swiperList: [{
                id:'0001',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannne1.jpg'
            },{
                id:'0002',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannne1.jpg'
            },{
                id:'0003',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannne2.jpg'
            },{
                id:'0004',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannne3.jpg'
            },{
                id:'0005',
                imgUrl:'http://m.igeqin.com/App/Tpl/Wap/Defaults/Public/images/images/bannne1.jpg'
            }]
        }
    }
}
</script>

<style lang="stylus" scoped>
    
</style>
