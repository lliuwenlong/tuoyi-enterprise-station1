<template>
    <div id="app">
        <Nav v-if="$route.name !== 'homePage'" />
        <router-view />
        <footer-wrap />
    </div>
</template>
<script>
import FooterWrap from "@/components/HomePage/FooterWrap.vue";
import Nav from "@/components/common/Nav.vue";
export default {
    components: {
        FooterWrap,
        Nav
    }
};
</script>

<style>
@import url("./assets/reset.css");
.about_title {
    width: 240px;
    height: 60px;
    margin: 0px auto;
}

.about_title p {
    font-size: 32px;
    color: #666666;
    text-align: center;
    font-weight: 400;
}

.about_title .pro {
    width: 220px;
    height: 30px;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.about_title .pro span {
    display: block;
    width: 50px;
    height: 1px;
    background: #9d9d9d;
}

.about_title .pro h3 {
    font-size: 24px;
    color: #333333;
    line-height: 30px;
}
</style>
