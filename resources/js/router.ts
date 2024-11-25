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
import StudentList from "./components/Student/StudentList.vue";
import StudentView from "./components/Student/StudentView.vue";
import StudentAdd from "./components/Student/StudentAdd.vue";
import StudentEdit from "./components/Student/StudentEdit.vue";

import TeacherList from "./components/Teacher/TeacherList.vue"
import TeacherView from "./components/Teacher/TeacherView.vue"
import TeacherAdd from "./components/Teacher/TeacherAdd.vue"
import TeacherEdit from "./components/Teacher/TeacherEdit.vue"

import CoursList from "./components/Cours/CoursList.vue"
import CoursView from "./components/Cours/CoursView.vue"
import CoursAdd from "./components/Cours/CoursAdd.vue"
import CoursEdit from "./components/Cours/CoursEdit.vue"

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
  //Student
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
      title: 'student View'
     },
  },
  {
    path: '/student-add',
    name: 'studentAdd',
    component: StudentAdd,
    meta: { 
      requiresAuth: true,
      title: 'student add'
     },
  },
  {
    path: '/student-edit',
    name: 'studentEdit',
    component: StudentEdit,
    meta: { 
      requiresAuth: true,
      title: 'student Edit'
     },
  },
  //Teacher
  {
    path: '/teacher-list',
    name: 'TeacherList',
    component: TeacherList,
    meta: { 
      requiresAuth: true,
      title: 'teacher list'
     },
  },
  {
    path: '/teacher-view',
    name: 'TeacherView',
    component: TeacherView,
    meta: { 
      requiresAuth: true,
      title: 'teacher View'
     },
  },
  {
    path: '/teacher-add',
    name: 'TeacherAdd',
    component: TeacherAdd,
    meta: { 
      requiresAuth: true,
      title: 'teacher Add'
     },
  },
  {
    path: '/teacher-edit',
    name: 'TeacherEdit',
    component: TeacherEdit,
    meta: { 
      requiresAuth: true,
      title: 'teacher Edit'
     },
  },
  //Cours
  {
    path: '/cours-list',
    name: 'CoursList',
    component: CoursList,
    meta: { 
      requiresAuth: true,
      title: 'Cours List'
     },
  },
  {
    path: '/cours-view',
    name: 'CoursView',
    component: CoursView,
    meta: { 
      requiresAuth: true,
      title: 'Cours View'
     },
  },
  {
    path: '/cours-add',
    name: 'CoursAdd',
    component: CoursAdd,
    meta: { 
      requiresAuth: true,
      title: 'Cours Add'
     },
  },
  {
    path: '/cours-edit',
    name: 'CoursEdit',
    component: CoursEdit,
    meta: { 
      requiresAuth: true,
      title: 'Cours Edit'
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
