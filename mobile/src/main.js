// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import fastClick from 'fastclick'
import VueAwesomeSwiper from 'vue-awesome-swiper'

// styles
import "./assets/styles/reset.css"
// import "./assets/styles/border.css"
import 'swiper/dist/css/swiper.css'

// 适配
import 'lib-flexible/flexible'

fastClick.attach(document.body)
Vue.use(VueAwesomeSwiper, /* { default global options } */)

Vue.config.productionTip = false


/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})

// 跳转头部
router.afterEach((to,from,next) => {
  window.scrollTo(0,0);
})






