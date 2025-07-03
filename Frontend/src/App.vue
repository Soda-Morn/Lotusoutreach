
<template>
<RouterView />
  <div class="font-sans text-gray-800 bg-[#FFF8F0] min-h-screen">
    <Navbar />
    <RouterView />
    <Footer />
  </div>

</template>
<script setup>
import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';
import { RouterView } from 'vue-router';
</script>