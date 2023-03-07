
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

import { library } from '@fortawesome/fontawesome-svg-core'
import { faHome, faDatabase, faArrowRight, faWindowClose, faExchangeAlt, faList, faCog, faSignOutAlt, faSignInAlt, faListAlt } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faHome, faDatabase, faArrowRight, faWindowClose, faExchangeAlt, faList, faCog, faSignOutAlt, faSignInAlt, faListAlt)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false

window.EventBus = new Vue();

import User from './Helpers/User'
window.User = User;

import { ClientTable  } from 'vue-tables-2';
Vue.use( ClientTable  );

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

Vue.use(require('vue-moment'));

const moment = require('moment')
require('moment/locale/es')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('AppHome', require('./components/AppHome.vue').default)
import router from './Router/router.js'

const app = new Vue({
    el: '#app',
    router
});
