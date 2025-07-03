<template>
  <div class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md shadow-gray-300 z-50 p-4">
      <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-3">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgLeIH5PtQCty0ZtaLV8aYaUzaTVQpVQHp0A&s"
            alt="Lotus Outreach Logo"
            class="w-14 h-14 object-contain"
          />
          <h1 class="text-2xl font-bold text-pink-600">Lotus Outreach</h1>
        </div>
        <ul class="flex space-x-6 text-gray-800 font-medium">
          <li><RouterLink to="/" class="hover:text-pink-600">Why Girl?</RouterLink></li>
          <li><RouterLink to="/about" class="hover:text-pink-600">About Us</RouterLink></li>
          <li><RouterLink to="/cambodia" class="hover:text-pink-600">Cambodia</RouterLink></li>
          <li><RouterLink to="/news" class="hover:text-pink-600">News</RouterLink></li>
          <li><RouterLink to="/donate" class="hover:text-pink-600">Donate</RouterLink></li>
          <li>
            <RouterLink
              to="/login"
              class="px-4 py-2 bg-pink-600 text-white rounded hover:bg-pink-700 font-semibold"
            >Login</RouterLink>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow mt-24 p-6 max-w-7xl mx-auto w-full">
      <h2 class="text-2xl font-bold mb-4">Welcome to Lotus Outreach</h2>
      <p class="text-gray-700">
        This is where your page content goes. Add your About, Cambodia, or News content here.
      </p>
    </main>

   
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
