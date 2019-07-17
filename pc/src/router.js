import Vue from 'vue';
import Router from 'vue-router';
import Index from './views/Index.vue';
import Profit from './views/Profit/Profit.vue';
import Introduce from './views/Introduce/Introduce.vue';
import CustomerCase from './views/CustomerCase/CustomerCase.vue';
Vue.use(Router)

export default new Router({
	mode: 'history',
	base: process.env.BASE_URL,
	routes: [
		{
			path: '/',
			name: 'homePage',
			component: Index
		},
		{
			path: '/profit',
			name: 'Profit',
			component: Profit
		},
		{
			path: '/introduce',
			name: 'Introduce',
			component: Introduce
		},
		{
			path: '/customerCase',
			name: 'customerCase',
			component: CustomerCase
		}
	]
})
