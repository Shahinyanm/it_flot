import Vue from "vue";
import VueRouter from "vue-router";
import NProgress from 'nprogress'

import Home from './views/Home'
import Profile from './views/Profile'
import Login from './views/Auth/Login'
import Register from './views/Auth/Register'

Vue.use(VueRouter);


const routes = [
        {
            path: '/',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            }
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                auth: false
            }
        },
        {
            path: '/home',
            name: 'home',
            component: Home,
            meta: {
                auth: true
            }
        },
    {
        path: '/profile',
        name: 'profile',
        component: Profile,
        meta: {
            auth: true
        }
    },
    ];


const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})


export default router;
