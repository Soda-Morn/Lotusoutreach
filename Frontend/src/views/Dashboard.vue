<template>
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="w-64 h-full bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col transition-all duration-300">
      <div class="p-6 border-b border-gray-700">
        <h2 class="text-2xl font-extrabold bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 bg-clip-text text-transparent animate-pulse-slow">Mimity Admin</h2>
      </div>
      <nav class="flex-1 mt-6 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-800">
        <ul>
          <li>
            <a href="#" class="group flex items-center py-2.5 px-6 text-gray-200 hover:bg-gray-700/50 rounded-xl transition-all duration-300 ease-out transform hover:scale-[1.02]">
              <span class="mr-4 text-xl">🏠</span>
              <span class="flex-1 font-medium">Dashboard</span>
              <span class="bg-blue-600/80 text-xs px-2.5 py-1 rounded-full group-hover:bg-blue-500 transition duration-300">New</span>
            </a>
          </li>
          <li><a href="#" class="flex items-center py-2.5 px-6 text-gray-200 hover:bg-gray-700/50 rounded-xl transition-all duration-300 ease-out transform hover:scale-[1.02]"><span class="mr-4 text-xl">🛒</span><span class="font-medium">WhyGril</span></a></li>
          <li><a href="#" class="flex items-center py-2.5 px-6 text-gray-200 hover:bg-gray-700/50 rounded-xl transition-all duration-300 ease-out transform hover:scale-[1.02]"><span class="mr-4 text-xl">📊</span><span class="font-medium">About Us</span></a></li>
          <li><a href="#" class="flex items-center py-2.5 px-6 text-gray-200 hover:bg-gray-700/50 rounded-xl transition-all duration-300 ease-out transform hover:scale-[1.02]"><span class="mr-4 text-xl">👥</span><span class="font-medium">Program</span></a></li>
          <li><a href="#" class="flex items-center py-2.5 px-6 text-gray-200 hover:bg-gray-700/50 rounded-xl transition-all duration-300 ease-out transform hover:scale-[1.02]"><span class="mr-4 text-xl">📅</span><span class="font-medium">News</span></a></li>
          <li><a href="#" class="flex items-center py-2.5 px-6 text-gray-200 hover:bg-gray-700/50 rounded-xl transition-all duration-300 ease-out transform hover:scale-[1.02]"><span class="mr-4 text-xl">💬</span><span class="font-medium">Donate</span></a></li>
          
          
        </ul>
      </nav>
      <div class="p-4 border-t border-gray-700">
        <a href="#" class="flex items-center py-2.5 px-6 text-gray-200 hover:bg-gray-700/50 rounded-xl transition-all duration-300 ease-out transform hover:scale-[1.02]">
          <span class="mr-4 text-xl">⚙️</span><span class="font-medium">Settings</span>
        </a>
      </div>
    </div>

    <!-- Navbar and Main Content -->
    <div class="flex-1 flex flex-col">
      <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between shadow-lg">
        <div class="flex items-center space-x-4">
          <button class="text-gray-300 hover:text-white transition duration-200">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
          </button>
          <div class="relative">
            <input type="text" placeholder="Search..." class="bg-gray-700 text-white p-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 pl-10 w-64 transition-all duration-200">
            <span class="absolute left-3 top-2.5 text-gray-400">🔍</span>
          </div>
        </div>
        <div class="flex items-center space-x-6">
          <button class="relative text-gray-300 hover:text-white transition duration-200">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
          </button>
          <button class="text-gray-300 hover:text-white transition duration-200">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
          </button>
          <!-- <span class="text-gray-300 text-sm font-medium">06:32 PM +07, Fri, Jul 04, 2025</span> -->
          <div class="relative group">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-700 rounded-full flex items-center justify-center text-white font-semibold shadow-md hover:shadow-lg transition duration-200">
              JD
            </div>
            <div class="absolute right-0 mt-2 w-48 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-2 hidden group-hover:block">
              <p class="text-sm">John Doe</p>
              <a href="#" class="text-blue-400 hover:text-blue-300 block mt-1">Logout</a>
            </div>
            <span class="absolute bottom-0 right-0 h-3 w-3 bg-green-500 rounded-full border-2 border-gray-900"></span>
          </div>
        </div>
      </div>
      <div class="flex-1 bg-gray-50 p-6 overflow-y-auto">
        <!-- Main content goes here -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AdminLayout'
}
</script>

<style>
@keyframes pulse-slow {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.8; }
}
.animate-pulse-slow {
  animation: pulse-slow 3s infinite;
}
.scrollbar-thin {
  scrollbar-width: thin;
}
.scrollbar-thumb-gray-600 {
  scrollbar-color: #4b5563 #1f2937;
}
.scrollbar-track-gray-800 {
  background: #1f2937;
}
</style>
