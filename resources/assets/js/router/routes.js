import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)



const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/',
			component: require('../components/Home')
		},
		{
			path: '/profil/:id',
			component: require('../components/Profil'),
			name: 'profil'
		},


	],

})

export default router
