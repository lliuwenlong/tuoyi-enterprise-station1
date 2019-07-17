<template>
    <div>
        <common-header></common-header>
        <home-swiper></home-swiper>
        <home-num></home-num>
        <home-nav></home-nav>
        <!-- <home-news></home-news> -->
        <!-- <home-content></home-content> -->
        <home-list-news></home-list-news>
        <home-list-case></home-list-case>
        <home-list-manage></home-list-manage>
        <common-footer></common-footer>
    </div>
</template>


<script>
import CommonHeader    from '@/common/components/Header'
import HomeSwiper    from './components/Swiper'
import HomeNum       from './components/Num'
import HomeNav       from './components/Nav'
// import HomeNews   from './components/News'
// import HomeContent   from './components/Content'
import HomeListNews  from './components/ListNews'
import HomeListCase  from './components/ListCase'
import HomeListManage from './components/ListManage'
import CommonFooter  from '@/common/components/Footer'



export default {
    name :'Home',
    components: {
        CommonHeader,
        HomeSwiper,
        HomeNum,
        HomeNav,
        // HomeNews
        // HomeContent,
        HomeListNews,
        HomeListCase,
        HomeListManage,
        CommonFooter,
    }
}
</script>

<style lang="stylus" scoped>

</style>


