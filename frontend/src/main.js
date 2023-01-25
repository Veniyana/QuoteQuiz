import {createApp} from 'vue'
import App from './App.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import * as Constants from './constants';

const app = createApp(App);
app.use(VueAxios, axios);
app.use(Constants);
app.mount('#app');