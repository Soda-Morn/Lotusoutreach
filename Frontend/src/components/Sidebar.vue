<template>
  <div class="w-64 h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col">
    <div class="p-6 border-b border-gray-700">
      <h2 class="text-2xl font-extrabold bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 bg-clip-text text-transparent animate-pulse-slow">
        Mimity Admin
      </h2>
    </div>

    <nav class="flex-1 mt-6 overflow-y-auto">
      <ul>
        <li v-for="item in menuItems" :key="item.page">
          <button
            @click="$emit('change-page', item.page)"
            :class="[
              'w-full text-left px-6 py-3 rounded-xl transition duration-300',
              selected === item.page
                ? 'bg-gray-700 text-white font-bold'
                : 'text-gray-300 hover:bg-gray-700/40'
            ]"
          >
            <span class="mr-2">{{ item.icon }}</span>{{ item.label }}
          </button>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script setup>
defineProps(['selected'])

const menuItems = [
  { label: 'Dashboard', icon: '🏠', page: 'Dashboard' },
  { label: 'Why Girl?', icon: '👧', page: 'WhyGirl' },
  { label: 'About Content', icon: '📄', page: 'AboutContent' },
  { label: 'News', icon: '📰', page: 'News' },
  { label: 'Donate', icon: '💰', page: 'Donate' }
]
</script>

<style scoped>
@keyframes pulse-slow {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.8; }
}
.animate-pulse-slow {
  animation: pulse-slow 3s infinite;
}
</style>
