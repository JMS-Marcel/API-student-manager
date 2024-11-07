import { createRouter, createWebHistory } from "vue-router";
import Home from './pages/HomePage.vue';
import Auth from './pages/AuthPage.vue';
import Register from './Auth/RegisterPage.vue';
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
  {
    path: '/register',
    name: 'Register',
    component: Register,
  },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});