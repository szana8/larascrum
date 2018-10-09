import store from './vuex';
import router from './router';
import localforage from 'localforage';

/**
 * Local forage main configuration.
 */
localforage.config({
	driver:localforage.LOCALSTORAGE,
	storeName: 'larascrum'
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Register the Vue application main components like the application which
 * is the entry point and the all of the necessary navigation components.
 */
Vue.component('app', require('./components/App.vue'));
Vue.component('navigation', require('./components/Navigation/Navigation.vue'));

Vue.component('sidebarSearchPanel', require('./components/Panels/SidebarSearchPanel.vue'));

/**
 * Check the user token is exist or not, depends on that we redirect the user
 * to the requested page or if the page needs authentication redirect to
 * the login page to enter the credentials.
 */
store.dispatch('auth/setToken').then(() => {
	store.dispatch('auth/fetchUser').catch(() => {
		store.dispatch('auth/clearAuthentication');
		router.replace({ name: 'login' });
	})
}).catch(() => {
	store.dispatch('auth/clearAuthentication');
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    store: store,
    router: router
});
