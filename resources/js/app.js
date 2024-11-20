import './bootstrap';
import '../css/satoshi.css'
import '../css/tailwind.css'

import { createApp } from "vue";
import { createPinia } from 'pinia';
import router from './router'


const app = createApp();



app.use(createPinia())
app.use(router);

app.mount('#app');