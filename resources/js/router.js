import { createRouter, createWebHistory } from "vue-router";
import Home from './pages/HomePage.vue';
const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  // {
  //   path: '/about',
  //   name: 'About',
  //   component: About,
  // },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});