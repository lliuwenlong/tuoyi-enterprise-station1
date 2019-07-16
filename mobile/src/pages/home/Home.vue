<template>
    <div>
        <common-header></common-header>
        <home-swiper></home-swiper>
        <home-num></home-num>
        <home-nav></home-nav>
        <!-- <home-news></home-news> -->
        <home-content></home-content>
        <common-footer></common-footer>
    </div>
</template>


<script>
import CommonHeader    from '@/common/components/Header'
import HomeSwiper    from './components/Swiper'
import HomeNum       from './components/Num'
import HomeNav       from './components/Nav'
// import HomeNews   from './components/News'
import HomeContent   from './components/Content'
import CommonFooter    from '@/common/components/Footer'


export default {
    name :'Home',
    components: {
        CommonHeader,
        HomeSwiper,
        HomeNum,
        HomeNav,
        // HomeNews
        HomeContent,
        CommonFooter,
    }
}
</script>

<style lang="stylus" scoped>

</style>


