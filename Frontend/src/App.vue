
<template>
<RouterView />
  <div >
    <Navbar />
    <Footer />
  </div>

</template>
<script setup>
import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';
import { RouterView } from 'vue-router';
</script>