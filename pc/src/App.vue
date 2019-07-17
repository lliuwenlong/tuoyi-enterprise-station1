<template>
    <div id="app">
        <Nav  v-if="$route.name !== 'homePage'"/>
        <router-view />
        <footer-wrap />
    </div>
</template>
<script>
import FooterWrap from "@/components/HomePage/FooterWrap.vue";
import Nav from '@/components/common/Nav.vue';
export default {
    components: {
        FooterWrap,
        Nav
    }
};
</script>

<style>
@import url("./assets/reset.css");
</style>
