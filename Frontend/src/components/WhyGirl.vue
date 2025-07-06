<template>
  <div class="relative">
    <!-- Banner Section with Slideshow -->
    <div class="relative bg-gray-100 h-[90vh]">
      <div class="w-full h-full overflow-hidden">
        <div class="relative w-full h-full flex transition-transform duration-500 ease-in-out" 
             :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
          <div v-for="(image, index) in images" :key="index" class="w-full h-full flex-shrink-0">
            <img :src="image.src" :alt="image.alt" class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center justify-center" 
                 :class="['bg-black', { 'bg-opacity-20': currentSlide === 0, 'bg-opacity-55': currentSlide !== 0 }]">
              <div class="text-center text-white max-w-2xl px-4">
                <h2 class="text-4xl font-bold mb-4">Why Girls?</h2>
                <p class="text-xl mb-6">For at risk women and girls our help can change everything</p>
                <router-link to="/donate"
                  class="px-8 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-semibold transition inline-block">
                  Give Now
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Navigation Dots -->
      <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <button v-for="(image, index) in images" :key="index" @click="currentSlide = index"
          class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 focus:outline-none"
          :class="{ 'bg-opacity-100': currentSlide === index }"></button>
      </div>
    </div>

    <!-- Cards Section -->
    <div class="container mx-auto py-8 px-4 mt-20">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div
          class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 ease-in-out transform hover:scale-[1.02] hover:shadow-xl active:scale-[1.01] cursor-pointer group">
          <!-- Image with zoom effect -->
          <div class="relative overflow-hidden">
            <img src="https://lotusoutreach.org/wp-content/uploads/2018/12/Girls-Access-to-Education-1.jpg"
              alt="Empowered girls"
              class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
            <!-- Subtle overlay on hover -->
            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300">
            </div>
          </div>

          <!-- Content with hover effects -->
          <div class="p-6 transition-colors duration-300 group-hover:bg-pink-50">
            <h3 class="text-2xl font-bold text-center text-pink-500 mb-4 group-hover:text-pink-600 transition-colors">
              When you empower a girl,<br>you transform a community.
            </h3>
            <p class="text-gray-600 text-center group-hover:text-gray-800 transition-colors">
              Thank nearly 1 in 8 people worldwide. We operate in range of the most neglected rural areas of India and
              Cambodia serving as risk engineering unit educators, training, anti-trafficking, and health and water
              services.
            </p>

            <!-- Hidden button that appears on hover -->
            <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            </div>
          </div>
        </div>
        <div
          class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 ease-in-out transform hover:scale-[1.02] hover:shadow-lg cursor-pointer">
          <div class="relative overflow-hidden">
            <img
              src="https://media.licdn.com/dms/image/v2/C561BAQHovERV7NaR7g/company-background_10000/company-background_10000/0/1615466141859/lotusoutreachinternational_cover?e=2147483647&v=beta&t=E2rwHcaKf0iDwP57SpCCBdOm12F61_c_-Pd5g8VQ8kg"
              alt="Children in need" class="w-full h-64 object-cover transition-transform duration-500 hover:scale-110">
          </div>
          <div class="p-6 hover:bg-pink-50 w-full h-full transition-colors duration-300">
            <h3 class="text-2xl font-bold text-center text-pink-500 mb-2 hover:text-pink-600 transition-colors">1
              billion</h3>
            <p class="text-center text-gray-600 font-semibold mb-4 hover:text-gray-800 transition-colors">children
              worldwide are living in poverty and at risk of eradication</p>
            <p class="text-gray-600 text-center hover:text-gray-800 transition-colors">
              Thank nearly 1 in 8 people worldwide. We operate in some of the most neglected rural areas of India and
              Cambodia serving as risk engineering unit educators, training, anti-trafficking, and health and water
              services.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Card from './Card.vue'

export default {
  name: 'WhyGirl',
  components: {
    Card
  },
  data() {
    return {
      currentSlide: 0,
      images: [
        { src: 'https://business-cambodia.com/cms/assets/2f22a1db-85ee-42e9-8a8c-a0a134e1a82c', alt: 'Group Photo' },
        { src: 'https://lotusoutreach.org/wp-content/uploads/2018/12/Girls-Access-to-Education-1.jpg', alt: 'Empowered Girls' },
        { src: 'https://media.licdn.com/dms/image/v2/C561BAQHovERV7NaR7g/company-background_10000/company-background_10000/0/1615466141859/lotusoutreachinternational_cover?e=2147483647&v=beta&t=E2rwHcaKf0iDwP57SpCCBdOm12F61_c_-Pd5g8VQ8kg', alt: 'Children in Need' }
      ]
    }
  },
  mounted() {
    this.startAutoSlide()
  },
  beforeDestroy() {
    clearInterval(this.slideInterval)
  },
  methods: {
    startAutoSlide() {
      this.slideInterval = setInterval(() => {
        this.currentSlide = (this.currentSlide + 1) % this.images.length
      }, 5000) // Change slide every 5 seconds
    }
  }
}
</script>