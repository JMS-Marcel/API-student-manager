import './bootstrap';

import { createApp } from "vue";
import router from './router'
import HomePage from "./pages/AuthPage.vue"

const app = createApp();

app.component('homePage', HomePage );

app.use(router);

app.mount('#app');