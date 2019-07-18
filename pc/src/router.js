import Vue from 'vue';
import Router from 'vue-router';
import Index from './views/Index.vue';
import Profit from './views/Profit/Profit.vue';
import Introduce from './views/Introduce/Introduce.vue';
import CustomerCase from './views/CustomerCase/CustomerCase.vue';
import Daoda from './views/Daoda/Daoda.vue';
import Qudao from './views/Qudao/Qudao.vue';
import Shizi from './views/Shizi/Shizi.vue';
import Guandian from './views/Guandian/Guandian.vue';
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
		},
		{
			path: '/daoda',
			name: 'daoda',
			component: Daoda
		},
		{
			path: '/qudao',
			name: 'qudao',
			component: Qudao
		},
		{
			path: '/shizi',
			name: 'shizi',
			component: Shizi
		},
		{
			path: '/guandian',
			name: 'guandian',
			component: Guandian
		}
	]
})
