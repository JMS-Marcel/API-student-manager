import { createRouter, createWebHistory } from "vue-router";
import Home from './pages/HomePage.vue';
import Auth from './pages/AuthPage.vue';
import Register from './Auth/RegisterPage.vue';
import Login from './Auth/LoginPage.vue';
import Dashboard from './dashboard/Dashboad.vue';
import NotFound from './pages/NotFound.vue';
import ProfilePage from './dashboard/ProfilePage.vue'
import SettingPage from './dashboard/SettingPage.vue'
import StudentList from "./components/Student/StudentList.vue";
import { title } from "process";
import StudentView from "./components/Student/StudentView.vue";
import StudentAdd from "./components/Student/StudentAdd.vue";
import StudentEdit from "./components/Student/StudentEdit.vue";
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
  {
    path: '/student-list',
    name: 'StudentList',
    component: StudentList,
    meta: { 
      requiresAuth: true,
      title: 'student list'
     },
  },
  {
    path: '/student-view',
    name: 'StudentView',
    component: StudentView,
    meta: { 
      requiresAuth: true,
      title: 'student list'
     },
  },
  {
    path: '/student-add',
    name: 'studentAdd',
    component: StudentAdd,
    meta: { 
      requiresAuth: true,
      title: 'student list'
     },
  },
  {
    path: '/student-edit',
    name: 'studentEdit',
    component: StudentEdit,
    meta: { 
      requiresAuth: true,
      title: 'student list'
     },
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
