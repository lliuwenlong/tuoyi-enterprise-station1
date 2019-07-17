<template>
    <div class="header">
        <div class="left_logo">
            <a href="/">
                <img src="http://www.igeqin.com//App/Tpl/Wap/Defaults/Public/images/images/logo.png" alt="">
            </a>
        </div>
        <div class="right_tel">
            <a href="tel:4008880319">
                <img src="http://m.igeqin.com//App/Tpl/Wap/Defaults/Public/images/images/right_tel.png" alt="">
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name:'CommonHeader'
}
</script>

<style style='stylus' scoped>
    .header {
        width: 94%;
        position: absolute;
        z-index: 7;
        top: 0px;
        display: flex;
        justify-content: space-between;
        padding: 1.5% 3%;
        border-bottom: 1px solid #FFFFFF;
        /* background: #ccc; */
    }

    .header .left_logo {
        width: 35%;
        align-items: center;
    }
    .header .left_logo a {
        display: inline-block;
        width: 100%;
        height: 100%;  
    }
    .header .left_logo img {
        width: 100%;
    }

    .header .right_tel {
        width: 30%;
        display: flex;
        align-items: center;
    }
    .header .right_tel a {
        display: inline-block;
    }
    .header .right_tel img {
        width: 100%;
    }
    
    /* http://m.igeqin.com/ */
</style>
