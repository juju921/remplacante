require('./bootstrap');
import Vue from 'vue';
import Buefy from 'buefy'
import Vuex from 'vuex'
import * as VueGoogleMaps from 'vue2-google-maps'
import VueRouter from 'vue-router'
import router from './router/routes.js';
import App from './App.vue'
import AirbnbStyleDatepicker from 'vue-airbnb-style-datepicker'
import 'vue-airbnb-style-datepicker/dist/styles.css'
// import Messagerie from './components/MessagerieComponent'
import store from './store/store'


Vue.use(VueRouter)
Vue.use(Buefy);
Vue.use(Vuex);


// see docs for available options
const datepickerOptions = {}

// make sure we can use it in our components
Vue.use(AirbnbStyleDatepicker, datepickerOptions)



Vue.use(VueGoogleMaps, {
	load: {
		key: 'AIzaSyArynWtjleZ4__Zu0Y2oPJJz0kWkQGYxkc'
	},
})


const app = new Vue({
    el: '#app',
	template: `<app></app>`,
	components: { App  },
	store,
	router

});
