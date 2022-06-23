import {createAuth} from '@websanova/vue-auth';
import axios from 'axios';
import driverAuthBearer from '@websanova/vue-auth/dist/drivers/auth/bearer.esm.js';
import driverHttpAxios from '@websanova/vue-auth/dist/drivers/http/axios.1.x.esm.js';
import driverRouterVueRouter from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.esm.js';
import router from './router';

export default createAuth({
    plugins: {
        http: axios,
        router: router,
    },
    drivers: {
        http: driverHttpAxios,
        auth: driverAuthBearer,
        router: driverRouterVueRouter
    },
    options: {
        tokenDefaultName: 'laravel-jwt-auth',
        tokenStore: ['localStorage'],

        // API endpoints used in Vue Auth.
        registerData: {
            url: 'auth/register',
            method: 'POST',
            redirect: '/welcome'
        },
        loginData: {
            url: 'auth/login',
            method: 'POST',
            redirect: '',
            fetchUser: true
        },
        logoutData: {
            url: 'auth/logout',
            method: 'POST',
            redirect: '/',
            makeRequest: true
        },
        fetchData: {
            url: 'auth/user',
            method: 'GET',
            enabled: true
        },
        refreshData: {
            url: 'auth/refresh',
            method: 'GET',
            enabled: true,
            interval: 30
        }
    }
});

