<template>
  <footer class="bg-sky-100 text-gray-800 p-4 shadow-md">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-6">
        <!-- Logo and description -->
        <div class="space-y-3">
          <div class="flex items-center space-x-3">
            <img
              src="../img/logo.png"
              alt="Lotus Outreach Logo"
              class="w-16 h-16 object-contain"
            />
            <div>
              <h4 class="text-2xl font-bold text-pink-600 select-none">Lotus Outreach</h4>
              <p class="text-xs text-gray-500">Growing Communities Together</p>
            </div>
          </div>
          <p class="text-xs text-gray-500">
            Empowering communities through compassionate action and sustainable solutions.
          </p>
        </div>

        <!-- Quick Links -->
        <div>
          <h4 class="text-base font-semibold mb-3 text-blue-500">Quick Links</h4>
          <ul class="space-y-2 text-gray-500">
            <li><RouterLink to="/" class="hover:text-pink-600 transition-colors">Why Girl?</RouterLink></li>
            <li><RouterLink to="/about" class="hover:text-pink-600 transition-colors">About Us</RouterLink></li>
            <li><RouterLink to="/cambodia" class="hover:text-pink-600 transition-colors">Cambodia</RouterLink></li>
            <li><RouterLink to="/news" class="hover:text-pink-600 transition-colors">News</RouterLink></li>
            <li><RouterLink to="/donate" class="hover:text-pink-600 transition-colors">Donate</RouterLink></li>
          </ul>
        </div>

        <!-- Programs -->
        <div>
          <h4 class="text-base font-semibold mb-3 text-blue-500">Programs</h4>
          <ul class="space-y-2 text-gray-500">
            <li><a href="#" class="hover:text-pink-600 transition-colors">Food Security</a></li>
            <li><a href="#" class="hover:text-pink-600 transition-colors">Education Support</a></li>
            <li><a href="#" class="hover:text-pink-600 transition-colors">Senior Care</a></li>
            <li><a href="#" class="hover:text-pink-600 transition-colors">Youth Development</a></li>
          </ul>
        </div>

        <!-- Social Media -->
        <div>
          <h4 class="text-base font-semibold mb-3 text-blue-500">Connect With Us</h4>
          <div class="flex space-x-3 mb-3">
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-sky-400 transition-colors">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.877v-6.987h-2.54v-2.89h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.466h-1.26c-1.243 0-1.63.772-1.63 1.562v1.875h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 16.991 22 12z"/>
              </svg>
            </a>
            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-sky-400 transition-colors">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M20.45 20.45h-3.55v-5.5c0-1.31-.02-3-1.82-3-1.82 0-2.1 1.43-2.1 2.9v5.6h-3.54v-11.3h3.4v1.54h.05c.47-.9 1.62-1.84 3.33-1.84 3.56 0 4.22 2.34 4.22 5.38v6.22zM5.34 8.67c-1.14 0-2.07-.93-2.07-2.08 0-1.14.92-2.07 2.07-2.07s2.07.93 2.07 2.07c0 1.15-.92 2.08-2.07 2.08zM7.12 20.45H3.56v-11.3h3.56v11.3zM22.23 0H1.77C.79 0 0 .78 0 1.75v20.5c0 .97.79 1.75 1.77 1.75h20.46c.98 0 1.77-.78 1.77-1.75V1.75c0-.97-.79-1.75-1.77-1.75z"/>
              </svg>
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-sky-400 transition-colors">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c.55 0 1 .45 1 1v1a1 1 0 01-2 0V5c0-.55.45-1 1-1zm-5 3a5 5 0 110 10 5 5 0 010-10zm0 2a3 3 0 100 6 3 3 0 000-6z"/>
              </svg>
            </a>
            <a href="https://vimeo.com/lotusoutreach" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-sky-400 transition-colors">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M22.54 6.42c-.11 2.48-1.83 5.88-5.16 10.79-3.44 5.15-6.37 7.71-8.8 7.71-1.48 0-2.74-1.36-3.77-4.08-.67-2.3-1.34-4.6-2-6.9-.36-1.22-.73-2.03-1.11-2.43-.23-.25-.63-.42-1.2-.52-.21-.04-.39-.08-.54-.12-.11-.04-.21-.1-.28-.18-.06-.08-.1-.23-.12-.44 0-.17.04-.4.12-.7.15-.61.57-1.03 1.26-1.26 1.11-.43 2.17-.79 3.18-1.1 1.25-.39 1.8-.07 1.65 1.02-.07.43-.14.85-.21 1.26-.12.62-.22 1.1-.32 1.44-.12.42-.06.65.18.71.45.13.92.02 1.42-.33.49-.34 1.07-1.07 1.74-2.18 1.04-1.82 1.77-3.17 2.17-4.03.55-1.26 1.05-1.84 1.52-1.73.6.15 1.01.58 1.23 1.3.16.53.24 1.05.25 1.57z"/>
              </svg>
            </a>
            <a href="https://www.youtube.com/channel/UCfQFMpprcxr4HvbjIyDws8w" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-sky-400 transition-colors">
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M19.8 7.02a2.4 2.4 0 00-1.68-1.68C16.8 5 12 5 12 5s-4.8 0-6.12.34a2.4 2.4 0 00-1.68 1.68A24.05 24.05 0 004 12a24.05 24.05 0 00.2 4.98 2.4 2.4 0 001.68 1.68c1.32.34 6.12.34 6.12.34s4.8 0 6.12-.34a2.4 2.4 0 001.68-1.68A24.05 24.05 0 0020 12a24.05 24.05 0 00-.2-4.98zM10 15.5v-7l6 3.5-6 3.5z"/>
              </svg>
            </a>
          </div>
          <p class="text-xs text-gray-500">Follow us for updates on our community impact and upcoming events.</p>
        </div>
      </div>

      <div class="border-t border-gray-300 mt-4 pt-2 text-center text-gray-500 text-xs">
        <p>© 2025 Lotus Outreach. All rights reserved. | Privacy Policy | Terms of Service</p>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { RouterLink } from "vue-router";
</script>