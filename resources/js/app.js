import './bootstrap';

import { createApp } from "vue";
import router from './router/router'
import HomePage from "./pages/HomePage.vue"

const app = createApp();

app.component('homePage', HomePage );
app.use(router);
app.mount('#app');