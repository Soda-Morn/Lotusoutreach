<template>
  <nav class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-[86rem] mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-20">
      <div class="flex items-center space-x-3">
        <img
          src="data:image/png;base64,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"
          alt="Lotus Outreach Logo"
          class="w-12 h-12 object-contain"
        />
        <h1 class="text-2xl font-bold text-pink-600 tracking-wide">Lotus Outreach</h1>
      </div>

      <ul class="hidden md:flex space-x-6 text-gray-800 font-medium">
        <li>
          <RouterLink to="/" :class="{ 'text-pink-600': isActive('/') }" class="hover:text-pink-600 transition-colors">
            Why Girl?
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/about" :class="{ 'text-pink-600': isActive('/about') }" class="hover:text-pink-600 transition-colors">
            About Us
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/cambodia" :class="{ 'text-pink-600': isActive('/cambodia') }" class="hover:text-pink-600 transition-colors">
            Program
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/news" :class="{ 'text-pink-600': isActive('/news') }" class="hover:text-pink-600 transition-colors">
            News
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/donate" :class="{ 'text-pink-600': isActive('/donate') }" class="hover:text-pink-600 transition-colors">
            Donate
          </RouterLink>
        </li>
        <li>
          <RouterLink to="/contact" :class="{ 'text-pink-600': isActive('/contact') }" class="hover:text-pink-600 transition-colors">
            Contact
          </RouterLink>
        </li>
       
        <li v-if="!isAuthenticated">
          <RouterLink
            to="/dashboard"
            :class="{ 'text-pink-600': isActive('/dashboard') }"
            class="px-4 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-700 font-semibold shadow transition"
          >
            Login
          </RouterLink>
        </li>
        <li v-if="isAuthenticated">
          <button @click="logout" class="px-4 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-700 font-semibold shadow transition">
            Logout
          </button>
        </li>
      </ul>

      <!-- Mobile Menu Button -->
      <div class="md:hidden">
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 hover:text-pink-600 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path
              v-if="!mobileMenuOpen"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"
            />
            <path
              v-else
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>
      </div>
    </div>
    <!-- Mobile menu can be added here if needed -->
  </nav>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const mobileMenuOpen = ref(false);
const route = useRoute();
const router = useRouter();

const isActive = (path) => {
  return route.path === path;
};

const isAuthenticated = computed(() => {
  return localStorage.getItem('isAuthenticated') === 'true';
});

const logout = () => {
  localStorage.removeItem('isAuthenticated');
  router.push('/login');
};
</script>