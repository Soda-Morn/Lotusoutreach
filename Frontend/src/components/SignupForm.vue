<template>
  <div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600 flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md transform transition-all duration-300 hover:shadow-2xl animate-fade-in">
      <h2 class="text-3xl font-extrabold text-center mb-6 text-gray-900">{{ isSignup ? 'Create Account' : 'Login' }}</h2>
      <button
        @click="isSignup = !isSignup"
        class="block text-center mb-6 text-indigo-600 hover:text-indigo-800 transition-colors duration-200"
      >
        {{ isSignup ? 'Already have an account? Login' : 'Don’t have an account? Signup' }}
      </button>
      <form @submit.prevent="isSignup ? handleSignup() : handleLogin()" class="space-y-6">
        <div>
          <input
            v-model="email"
            type="email"
            placeholder="Email Address"
            class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200"
          />
          <p v-if="errors.email" class="text-red-500 text-sm mt-1">{{ errors.email }}</p>
        </div>
        <div class="relative">
          <input
            v-model="password"
            :type="showPassword ? 'text' : 'password'"
            placeholder="Password"
            class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200"
          />
          <button
            type="button"
            @click="showPassword = !showPassword"
            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
          >
            <svg v-if="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
            </svg>
            <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
          </button>
          <p v-if="errors.password" class="text-red-500 text-sm mt-1">{{ errors.password }}</p>
        </div>
        <div v-if="isSignup" class="relative">
          <input
            v-model="confirmPassword"
            :type="showConfirmPassword ? 'text' : 'password'"
            placeholder="Confirm Password"
            class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200"
          />
          <button
            type="button"
            @click="showConfirmPassword = !showConfirmPassword"
            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
          >
            <svg v-if="showConfirmPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
            </svg>
            <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
          </button>
          <p v-if="errors.confirmPassword" class="text-red-500 text-sm mt-1">{{ errors.confirmPassword }}</p>
        </div>
        <button
          type="submit"
          :disabled="loading"
          class="w-full bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-700 transition-colors duration-200 disabled:bg-gray-400 disabled:cursor-not-allowed"
        >
          {{ loading ? (isSignup ? 'Signing up...' : 'Logging in...') : (isSignup ? 'Signup' : 'Login') }}
        </button>
        <p v-if="successMessage" class="text-green-500 text-center mt-2">{{ successMessage }}</p>
        <p v-if="errorMessage" class="text-red-500 text-center mt-2">{{ errorMessage }}</p>
      </form>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default {
  name: 'AuthForm',
  setup() {
    const isSignup = ref(true);
    const email = ref('');
    const password = ref('');
    const confirmPassword = ref('');
    const showPassword = ref(false);
    const showConfirmPassword = ref(false);
    const loading = ref(false);
    const errors = ref({ email: '', password: '', confirmPassword: '' });
    const successMessage = ref('');
    const errorMessage = ref('');
    const router = useRouter();

    const handleSignup = () => {
      errors.value = { email: '', password: '', confirmPassword: '' };
      errorMessage.value = '';

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
      setTimeout(() => {
        loading.value = false;
        successMessage.value = 'Signup successful!';
        localStorage.setItem('isAuthenticated', 'true');
        email.value = '';
        password.value = '';
        confirmPassword.value = '';
        router.push('/actual-dashboard');
        setTimeout(() => {
          successMessage.value = '';
        }, 3000);
      }, 1000);
    };

    const handleLogin = () => {
      errors.value = { email: '', password: '', confirmPassword: '' };
      errorMessage.value = '';

      if (!email.value) {
        errors.value.email = 'Email is required';
        return;
      }
      if (!password.value) {
        errors.value.password = 'Password is required';
        return;
      }

      loading.value = true;
      setTimeout(() => {
        loading.value = false;
        if (localStorage.getItem('isAuthenticated') === 'true') {
          successMessage.value = 'Login successful!';
          email.value = '';
          password.value = '';
          router.push('/actual-dashboard');
          setTimeout(() => {
            successMessage.value = '';
          }, 3000);
        } else {
          errorMessage.value = 'Invalid credentials. Please sign up first.';
          setTimeout(() => {
            errorMessage.value = '';
          }, 3000);
        }
      }, 1000);
    };

    return {
      isSignup,
      email,
      password,
      confirmPassword,
      showPassword,
      showConfirmPassword,
      loading,
      errors,
      successMessage,
      errorMessage,
      handleSignup,
      handleLogin,
    };
  },
};
</script>

<style scoped>
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-fade-in {
  animation: fadeIn 0.5s ease-out;
}
</style>