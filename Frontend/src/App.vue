<template>
  <div>
    <Navbar v-if="showLayout" />
    <RouterView />
    <Footer v-if="showLayout" />
  </div>
</template>

<script setup>
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'
import { useRoute } from 'vue-router'
import { computed } from 'vue'

const route = useRoute()

// these routes will HIDE both Navbar and Footer
const hideLayoutRoutes = ['/dashboard', '/actual-dashboard', '/login', '/register','/signup']

const showLayout = computed(() => {
  return !hideLayoutRoutes.includes(route.path)
})
</script>
