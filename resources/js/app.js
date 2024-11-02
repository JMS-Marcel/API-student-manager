import './bootstrap';

import { createApp } from "vue";

import HomePage from "./pages/HomePage.vue"

const app = createApp();

app.component('homePage', HomePage );

app.mount('#app');