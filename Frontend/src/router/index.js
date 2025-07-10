// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/WhyGirlView.vue';
import AboutView from '../views/AboutView.vue';
import CambodiaView from '@/views/CambodiaView.vue';
import NewsView from '@/views/NewsView.vue';
import DonateView from '@/views/DonateView.vue';
import ContactView from '@/views/ContactView.vue';
import SignupForm from '@/components/SignupForm.vue';
import Dashboard from '@/views/Dashboard.vue';
import AdminWhyGirl from '@/views/AdminWhyGirl.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  {
    path: '/about',
    name: 'about',
    component: AboutView,
  },
  {
    path: '/cambodia',
    name: 'cambodia',
    component: CambodiaView,
  },
  {
    path: '/news',
    name: 'news',
    component: NewsView,
  },
  {
    path: '/donate',
    name: 'donate',
    component: DonateView,
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: SignupForm, // Show signup form when clicking Dashboard
    meta: { requiresAuth: false },
  },
  {
    path: '/actual-dashboard',
    name: 'actual-dashboard',
    component: Dashboard,
    meta: { requiresAuth: true },
  },
  {
    path: '/contact',
    name: 'contact',
    component: ContactView,
  },
  {
    path: '/adminwhygirl',
    name: 'adminwhygirl',
    component:AdminWhyGirl,
  },
 
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return { top: 0 }; // Scroll to top on route change
  },
});

router.beforeEach((to, from, next) => {
  const isAuthenticated = localStorage.getItem('isAuthenticated') === 'true';
  if (to.meta.requiresAuth && !isAuthenticated) {
    next('/dashboard'); // Redirect to signup form for unauthenticated users
  } else {
    next();
  }
});

export default router;