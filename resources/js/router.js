import { createRouter, createWebHistory } from "vue-router";
import Home from './pages/HomePage.vue';
import Auth from './pages/AuthPage.vue';
const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/auth',
    name: 'Auth',
    component: Auth,
  },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});