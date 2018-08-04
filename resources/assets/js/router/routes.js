import Vue from "vue";
import VueRouter from "vue-router";
import home from "../components/Home.vue";
import show from "../views/user/Show.vue";
import mission from '../components/MissionComponent';



Vue.use(VueRouter);

// let $messagerie = document.querySelector('#messagerie')


const router = new VueRouter({
	mode: 'history',
	//base: $messagerie.getAttribute('data-base'),
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
		{
			path:'/mission/:id',
			component: mission,
			name:'mission'
		}

		// {
		// 	path:'/:id',
		// 	component: MessagesComponent,
		// 	name: 'conversation'
		// },


	],

})

export default router
