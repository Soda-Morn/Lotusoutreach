// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/WhyGirlView.vue'
import AboutView from '../views/AboutView.vue'
import CambodiaView from '@/views/CambodiaView.vue'
import NewsView from '@/views/NewsView.vue'
import DonateView from '@/views/DonateView.vue'
import ContactView from '@/views/ContactView.vue'



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
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
      path: '/contact',
      name: 'contact',
      component: ContactView,
    },
  ],
  scrollBehavior(to, from, savedPosition) {
    // Scroll to the top of the page on route change
    return { top: 0 }
  },
})

export default router