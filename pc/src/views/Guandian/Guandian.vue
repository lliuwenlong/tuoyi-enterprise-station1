<template>
    <div>
    	<div class="banner_img"><img src="http://www.igeqin.com/App/Tpl/Home/Defaults/Public/images/images2/banner_07.jpg"/></div>
	
        <News/>
    </div>
</template>
<script>
import News from '@/components/Article/news.vue';
export default {
    components: {
        News
    }
}
</script>
<style lang="less" scoped>
.banner_img {
  width: 100%;
  overflow: hidden;
  /*border-bottom: 2px solid #313131;*/
}
.banner_img img {
  display: block;
  margin: 0px auto;
}
</style>
