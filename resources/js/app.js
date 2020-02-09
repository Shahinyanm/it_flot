
import 'es6-promise/auto'
import axios from 'axios'
import './bootstrap'
import Vue from 'vue'
import VueInternationalization from 'vue-i18n';
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import auth from './auth'
import Buefy from 'buefy'
import App from './components/App'

import router from './router';

window.Vue = Vue
Vue.router = router
Vue.use(VueRouter)
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`
Vue.use(VueAuth, auth)

Vue.use(Buefy);


const default_locale = window.default_locale;
const fallback_locale = window.fallback_locale;
const messages = window.messages;

Vue.use(VueInternationalization);

const i18n = new VueInternationalization({
    locale: default_locale,
    messages: messages
});


const app = new Vue({
    el: '#app',
    router,
    i18n,
    render: (h) => h(App)
});

