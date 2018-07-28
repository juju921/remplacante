import Vue from 'vue'
import VueRouter from 'vue-router'
import home from '../components/Home.vue'
import show from '../views/user/Show.vue'



Vue.use(VueRouter)



const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/',
			component: home,
			name:'home'
		},
		{
			path: '/user/:id',
			component: show,
			name: 'user'
		},


	],

})

export default router
