require('./bootstrap');
import Vue from 'vue';
import Buefy from 'buefy'
import * as VueGoogleMaps from 'vue2-google-maps'
import VueRouter from 'vue-router'
import router from './router/routes.js';
import App from './App.vue'



Vue.use(VueRouter)
Vue.use(Buefy);

Vue.use(VueGoogleMaps, {
	load: {
		key: 'AIzaSyArynWtjleZ4__Zu0Y2oPJJz0kWkQGYxkc'

	},


})
Vue.component('home', require('./components/Home.vue'));
Vue.component('profil', require('./components/Profil.vue'));

const app = new Vue({
    el: '#app',
	//render: h => h(App),
	router
});
