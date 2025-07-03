<template>
  <div class="relative">
    <!-- Banner Section -->
    <div class="relative bg-gray-100 py-12">
      <img src="https://business-cambodia.com/cms/assets/2f22a1db-85ee-42e9-8a8c-a0a134e1a82c" alt="Group Photo"
        class="w-full h-64 object-cover">
      <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40">
        <div class="text-center text-white max-w-2xl px-4">
          <h2 class="text-4xl font-bold mb-4">Why Girls?</h2>
          <p class="text-xl mb-6">For at risk women and girls our help can change everything</p>
          <button class="px-8 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 font-semibold transition">
            Give Now
          </button>
        </div>
      </div>
    </div>
    <!-- Cards Section -->
    <div class="container mx-auto py-8 px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden"> <!-- Added overflow-hidden -->
          <img src="https://lotusoutreach.org/wp-content/uploads/2018/12/Girls-Access-to-Education-1.jpg"
            alt="Empowered girls" class="w-full h-64 object-cover"> <!-- Changed from h-48 to h-64 -->
          <div class="p-6"> <!-- Wrapped content in div -->
            <h3 class="text-2xl font-bold text-center text-pink-500 mb-4">When you empower a girl,<br>you transform a
              community.
            </h3>
            <p class="text-gray-600 text-center">
              Thank nearly 1 in 8 people worldwide. We operate in range of the most neglected rural areas of India and
              Cambodia serving as risk engineering unit educators, training, anti-trafficking, and health and water
              services.
            </p>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow-md overflow-hidden"> <!-- Added overflow-hidden -->
          <img
            src="https://media.licdn.com/dms/image/v2/C561BAQHovERV7NaR7g/company-background_10000/company-background_10000/0/1615466141859/lotusoutreachinternational_cover?e=2147483647&v=beta&t=E2rwHcaKf0iDwP57SpCCBdOm12F61_c_-Pd5g8VQ8kg"
            alt="Children in need" class="w-full h-64 object-cover"> <!-- Changed from h-48 to h-64 -->
          <div class="p-6"> <!-- Wrapped content in div -->
            <h3 class="text-2xl font-bold text-center text-pink-500 mb-2">1 billion</h3>
            <p class="text-center text-gray-600 font-semibold mb-4">children worldwide are living in poverty and at risk
              of
              eradication</p>
            <p class="text-gray-600 text-center">
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
  }
}
</script>