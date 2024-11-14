import { createRouter, createWebHistory } from "vue-router";
import Home from './pages/HomePage.vue';
import Auth from './pages/AuthPage.vue';
import Register from './Auth/RegisterPage.vue';
import Login from './Auth/LoginPage.vue';
import Dashboard from './dashboard/Dashboard.vue';
import NotFound from './pages/NotFound.vue';
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
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
    meta: { requiresAuth: true }
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    component: NotFound
  },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;

router.beforeEach((to, from, next) => {
  
  if (to.meta.requiresAuth) {
    const isAuthenticated = Boolean(localStorage.getItem('token')); 
    if (isAuthenticated) {
      next(); // Autorise l'accès
    } else {
      next('/auth');
    }
  } else {
    next(); // Si pas d'authentification requise, on continue
  }
});
