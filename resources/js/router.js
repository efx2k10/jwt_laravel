import {createWebHistory, createRouter} from "vue-router";
import Home from './components/Home'
import Welcome from './components/Welcome'
import Register from './components/Register'
import Login from './components/Login'
import Dashboard from './components/Dashboard'

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            auth: undefined
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
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },
    {
        path: '/welcome',
        name: 'welcome',
        component: Welcome,
        meta: {
            auth: false
        }
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
