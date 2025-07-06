<template>
  <nav class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-[86rem] mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-20">
      <div class="flex items-center space-x-3">
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgLeIH5PtQCty0ZtaLV8aYaUzaTVQpVQHp0A&s"
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
       
        <li>
          <RouterLink
            to="/login"
            :class="{ 'text-pink-600': isActive('/login') }"
            class="px-4 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-700 font-semibold shadow transition"
          >
            Login
          </RouterLink>
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
import { ref, computed } from 'vue'
import { useRoute } from 'vue-router'

const mobileMenuOpen = ref(false)
const route = useRoute()

const isActive = (path) => {
  return route.path === path
}
</script>
