<template>
  <div class="min-h-screen bg-gradient-to-br from-purple-200 to-indigo-300 flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-2xl w-80 transform transition-all duration-300 hover:shadow-3xl">
      <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Signup Form</h2>
      <router-link to="/login" class="block text-center mb-6 text-indigo-600 hover:text-indigo-800 transition-colors">Login</router-link>
      <form @submit.prevent="handleSignup" class="space-y-6">
        <div>
          <input v-model="email" type="email" placeholder="Email Address" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <p v-if="errors.email" class="text-red-500 text-sm mt-1">{{ errors.email }}</p>
        </div>
        <div>
          <input v-model="password" type="password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <p v-if="errors.password" class="text-red-500 text-sm mt-1">{{ errors.password }}</p>
        </div>
        <div>
          <input v-model="confirmPassword" type="password" placeholder="Confirm password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <p v-if="errors.confirmPassword" class="text-red-500 text-sm mt-1">{{ errors.confirmPassword }}</p>
        </div>
        <button type="submit" :disabled="loading" class="w-full bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">
          {{ loading ? 'Signing up...' : 'Signup' }}
        </button>
        <p v-if="successMessage" class="text-green-500 text-center mt-2">{{ successMessage }}</p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const email = ref('');
const password = ref('');
const confirmPassword = ref('');
const loading = ref(false);
const errors = ref({ email: '', password: '', confirmPassword: '' });
const successMessage = ref('');

const handleSignup = () => {
  errors.value = { email: '', password: '', confirmPassword: '' };

  if (!email.value) {
    errors.value.email = 'Email is required';
    return;
  }
  if (!password.value) {
    errors.value.password = 'Password is required';
    return;
  }
  if (password.value !== confirmPassword.value) {
    errors.value.confirmPassword = 'Passwords do not match';
    return;
  }

  loading.value = true;
  // Simulate signup process
  setTimeout(() => {
    loading.value = false;
    successMessage.value = 'Signup successful!';
    email.value = '';
    password.value = '';
    confirmPassword.value = '';
    // Hide message after 3 seconds
    setTimeout(() => {
      successMessage.value = '';
    }, 3000);
  }, 1000);
};
</script>

<style scoped>
/* Add any additional custom styles here if needed */
</style>