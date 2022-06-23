import "bootstrap";
import "bootstrap/dist/css/bootstrap.css";
import {createApp} from 'vue';
import axios from 'axios'
import VueAxios from 'vue-axios'
import Index from './Index'
import auth from './auth'
import router from './router'

const app = createApp(Index)
app.use(router);
app.use(VueAxios, axios)
axios.defaults.baseURL = `http://127.0.0.1:8000/api/v1`
app.use(auth)
app.mount('#app')
