import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/WhyGirlView.vue'
import AboutView from '../views/AboutView.vue'
import CambodiaView from '@/views/CambodiaView.vue'
import NewsView from '@/views/NewsView.vue'
import DonateView from '@/views/DonateView.vue'


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
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
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
  ],
})

export default router
