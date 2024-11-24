import { createRouter, createWebHistory } from "vue-router";
import Home from './pages/HomePage.vue';
import Auth from './pages/AuthPage.vue';
import Register from './Auth/RegisterPage.vue';
import Login from './Auth/LoginPage.vue';
import Dashboard from './dashboard/Dashboad.vue';
import NotFound from './pages/NotFound.vue';
import ProfilePage from './dashboard/ProfilePage.vue'
import SettingPage from './dashboard/SettingPage.vue'
import { title } from "process";
const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    component: NotFound
  },
  {
    path: '/auth',
    name: 'Auth',
    component: Auth,
  },
  {
    path: '/auth/register',
    name: 'Register',
    component: Register,
  },
  {
    path: '/auth/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
    meta: { 
      requiresAuth: true,
      title: 'Dashboard'
     }
  },
  {
    path: '/profil',
    name: 'profile',
    component: ProfilePage,
    meta: { 
      requiresAuth: true,
      title: 'Profil'
     }
  },
  {
    path: '/settings',
    name: 'parametre',
    component: SettingPage,
    meta: { 
      requiresAuth: true,
      title: 'Setting'
     }
  },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
  document.title = `EduTrack ${to.meta.title} | track your school with EduTrack`
  next()
})


export default router;

router.beforeEach((to, from, next) => {
  
  if (to.meta.requiresAuth) {
    const isAuthenticated = Boolean(sessionStorage.getItem('token')); 
    if (isAuthenticated) {
      next(); // Autorise l'accès
    } else {
      next('/auth');
    }
  } else {
    next();// on continue
  }
});
