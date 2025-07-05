<template>
  <div class="min-h-screen bg-gray-50 flex flex-col">
    <!-- Full Screen Slideshow -->
    <section class="relative h-screen w-full overflow-hidden">
      <!-- Slides Container -->
      <div class="relative h-full w-full">
        <!-- Slide 1 -->
        <div v-if="currentSlide === 0" class="absolute inset-0 transition-opacity duration-1000 ease-in-out">
          <img src="@/img/cam1.png" alt="Cambodia program 1" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
            <div class="text-center px-6 text-white max-w-4xl">
              <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 tracking-tight">EDUCATION IS HER POWER</h1>
              <div class="w-24 h-1 bg-white mx-auto mb-8"></div>
              <p class="text-xl md:text-2xl font-light leading-relaxed text-gray-100 mb-12">
                Empowering girls through education and care programs
              </p>
              <!-- <button
                class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Discover Our Programs
              </button> -->
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div v-if="currentSlide === 1" class="absolute inset-0 transition-opacity duration-1000 ease-in-out">
          <img src="@/img/cam2.png" alt="Cambodia program 2" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
            <div class="text-center px-6 text-white max-w-4xl">
              <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 tracking-tight">EDUCATION</h1>
              <div class="w-24 h-1 bg-white mx-auto mb-8"></div>
              <p class="text-xl md:text-2xl font-light leading-relaxed text-gray-100 mb-12">
                Building pathways to education for young women
              </p>
              <!-- <button
                class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Learn About Our Programs
              </button> -->
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div v-if="currentSlide === 2" class="absolute inset-0 transition-opacity duration-1000 ease-in-out">
          <img src="@/img/cam3.png" alt="Cambodia program 3" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
            <div class="text-center px-6 text-white max-w-4xl">
              <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 tracking-tight">EMPOWERMENT</h1>
              <div class="w-24 h-1 bg-white mx-auto mb-8"></div>
              <p class="text-xl md:text-2xl font-light leading-relaxed text-gray-100 mb-12">
                Leadership training and mentorship for young women
              </p>
            </div>
          </div>
        </div>

        <!-- Slide 4 -->
        <div v-if="currentSlide === 3" class="absolute inset-0 transition-opacity duration-1000 ease-in-out">
          <img src="@/img/cam4.png" alt="Cambodia program 4" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
            <div class="text-center px-6 text-white max-w-4xl">
              <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 tracking-tight">EMPOWERMENT</h1>
              <div class="w-24 h-1 bg-white mx-auto mb-8"></div>
              <p class="text-xl md:text-2xl font-light leading-relaxed text-gray-100 mb-12">
                Leadership training and mentorship for young women
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Navigation Arrows -->
      <button @click="prevSlide"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white p-3 rounded-full shadow-md transition-all duration-300 z-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <button @click="nextSlide"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white p-3 rounded-full shadow-md transition-all duration-300 z-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>

      <!-- Indicators -->
      <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-3 z-10">
        <button v-for="(slide, index) in 4" :key="index" @click="goToSlide(index)"
          class="w-3 h-3 rounded-full transition-all duration-300"
          :class="currentSlide === index ? 'bg-white w-6' : 'bg-white/50 hover:bg-white/70'"
          :aria-label="`Go to slide ${index + 1}`">
        </button>
      </div>
    </section>

    <!-- Programs Section -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-6 max-w-7xl">
        <!-- Education and Training -->
        <div class="mb-2">
          <div class="text-center mb-16">
            <div
              class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-r from-pink-500 to-purple-600 shadow-lg mb-6 mx-auto transform transition-transform duration-500 hover:rotate-6">
              <i class="fas fa-graduation-cap text-2xl text-white"></i>
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4 font-serif tracking-tight">EDUCATION & TRAINING</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-pink-500 to-purple-600 mx-auto mb-6 rounded-full"></div>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
              Empowering Cambodian women through education and professional development initiatives
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            <!-- Lotus Pedals -->
            <div
              class="group bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
              <!-- Image -->
              <div class="h-64 overflow-hidden">
                <img src="https://lotusoutreach.org/wp-content/uploads/2023/02/IMG_7191.jpg" alt="Lotus Pedals"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
              </div>
              <!-- Content -->
              <div class="p-8">
                <div class="flex items-center mb-4">
                  <div
                    class="w-12 h-12 rounded-full bg-gradient-to-r from-pink-500 to-purple-600 flex items-center justify-center mr-4">
                    <i class="fas fa-bicycle text-lg text-white"></i>
                  </div>
                  <h3 class="text-2xl font-bold font-serif">Lotus Pedals</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                  Providing durable bicycles to girls in rural Cambodia, enabling them to travel the long distance to
                  school.
                </p>
              </div>
            </div>

            <!-- GATE -->
            <div
              class="group bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
              <!-- Image -->
              <div class="h-64 overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                  alt="GATE" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
              </div>
              <!-- Content -->
              <div class="p-8">
                <div class="flex items-center mb-4">
                  <div
                    class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-cyan-600 flex items-center justify-center mr-4">
                    <i class="fas fa-book-open text-lg text-white"></i>
                  </div>
                  <h3 class="text-2xl font-bold font-serif">GATE</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                  Providing education scholarships and rice support for at-risk girls and their families living in dire
                  poverty.
                </p>
              </div>
            </div>

            <!-- CATALYST -->
            <div
              class="group bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
              <!-- Image -->
              <div class="h-64 overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80"
                  alt="CATALYST"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
              </div>
              <!-- Content -->
              <div class="p-8">
                <div class="flex items-center mb-4">
                  <div
                    class="w-12 h-12 rounded-full bg-gradient-to-r from-pink-500 to-purple-600 flex items-center justify-center mr-4">
                    <i class="fas fa-user-graduate text-lg text-white"></i>
                  </div>
                  <h3 class="text-2xl font-bold font-serif">CATALYST</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                  Providing university scholarships, mentoring, and leadership training for at-risk female youth in
                  Cambodia.
                </p>
              </div>
            </div>

            <!-- PNC/V -->
            <div
              class="group bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
              <!-- Image -->
              <div class="h-64 overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                  alt="PNC/V"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
              </div>
              <!-- Content -->
              <div class="p-8">
                <div class="flex items-center mb-4">
                  <div
                    class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-cyan-600 flex items-center justify-center mr-4">
                    <i class="fas fa-laptop-code text-lg text-white"></i>
                  </div>
                  <h3 class="text-2xl font-bold font-serif">PNC/V</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                  Providing high quality IT education in a holistic residential environment for at-risk female youth in
                  Cambodia and Vietnam.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- CARE Section -->
<div class="mt-32">
  <div class="text-center mb-12">
    <h2 class="text-4xl font-bold text-gray-900 mb-4 font-serif tracking-tight">
      COMMUNITY CARE
    </h2>
    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-teal-400 mx-auto mb-6 rounded-full"></div>
    <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
      Delivering essential resources and support to strengthen Cambodian communities
    </p>
  </div>

  <div class="flex flex-col space-y-8">
    <!-- Getting Well -->
    <div class="flex flex-col md:flex-row gap-8 items-center">
      <!-- Image Container -->
      <div class="w-full md:w-1/2 h-96 rounded-xl shadow-lg overflow-hidden">
        <div class="h-full bg-[url('https://images.unsplash.com/photo-1509316785289-025f5b846b35?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1176&q=80')] bg-cover bg-center"></div>
      </div>
      <!-- Text Container -->
      <div class="w-full md:w-1/2 p-8">
        <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center shadow-lg mb-6">
          <i class="fas fa-water text-2xl text-blue-500"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 font-serif">Getting Well</h3>
        <p class="text-gray-600 text-sm leading-relaxed mb-4">
          Help construct water wells that serve entire villages in the drought-prone regions of rural Cambodia.
        </p>
        <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full my-3"></div>
      </div>
    </div>

    <!-- WINS -->
    <div class="flex flex-col md:flex-row gap-8 items-center">
      <!-- Image Container -->
      <div class="w-full md:w-1/2 h-96 rounded-xl shadow-lg overflow-hidden">
        <div class="h-full bg-[url('https://images.unsplash.com/photo-1550828484-55f0abc43e03?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80')] bg-cover bg-center"></div>
      </div>
      <!-- Text Container -->
      <div class="w-full md:w-1/2 p-8">
        <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center shadow-lg mb-6">
          <i class="fas fa-tint text-2xl text-pink-500"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 font-serif">Water In Schools (WINS)</h3>
        <p class="text-gray-600 text-sm leading-relaxed mb-4">
          Help install water filtration systems in schools to provide clean drinking water and improved
          wellbeing to children in rural Cambodia.
        </p>
        <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full my-3"></div>
      </div>
    </div>

    <!-- R4E -->
    <div class="flex flex-col md:flex-row gap-8 items-center">
      <!-- Image Container -->
      <div class="w-full md:w-1/2 h-96 rounded-xl shadow-lg overflow-hidden">
        <div class="h-full bg-[url('https://images.unsplash.com/photo-1542826438-bd32f43d626f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1292&q=80')] bg-cover bg-center"></div>
      </div>
      <!-- Text Container -->
      <div class="w-full md:w-1/2 p-8">
        <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center shadow-lg mb-6">
          <i class="fas fa-utensils text-2xl text-blue-500"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 font-serif">Rice 4 Education (R4E)</h3>
        <p class="text-gray-600 text-sm leading-relaxed mb-4">
          Help provide rice support to villagers to help them support their girl children education in rural
          Cambodia.
        </p>
        <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full my-3"></div>
      </div>
    </div>

    <!-- CTC -->
    <div class="flex flex-col md:flex-row gap-8 items-center">
      <!-- Image Container -->
      <div class="w-full md:w-1/2 h-96 rounded-xl shadow-lg overflow-hidden">
        <div class="h-full bg-[url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80')] bg-cover bg-center"></div>
      </div>
      <!-- Text Container -->
      <div class="w-full md:w-1/2 p-8">
        <div class="w-14 h-14 bg-white rounded-xl flex items-center justify-center shadow-lg mb-6">
          <i class="fas fa-hands-helping text-2xl text-pink-500"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 font-serif">CTC</h3>
        <p class="text-gray-600 text-sm leading-relaxed mb-4">
          Help provide trauma therapy and assistance to survivors of trafficking and sexual and domestic
          violence in a women's shelter in rural Cambodia.
        </p>
        <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent w-full my-3"></div>
      </div>
    </div>
  </div>
</div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: 'CambodiaView',
  data() {
    return {
      currentSlide: 0,
      slideInterval: null,
      totalSlides: 4
    }
  },
  mounted() {
    this.observeElements();
    this.startSlideShow();
  },
  beforeUnmount() {
    this.stopSlideShow();
  },
  methods: {
    observeElements() {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add('animate-fade-in');
            }
          });
        },
        { threshold: 0.1 }
      );

      const cards = document.querySelectorAll('.group');
      cards.forEach((card) => observer.observe(card));
    },
    startSlideShow() {
      this.slideInterval = setInterval(() => {
        this.nextSlide();
      }, 5000);
    },
    stopSlideShow() {
      if (this.slideInterval) {
        clearInterval(this.slideInterval);
      }
    },
    nextSlide() {
      this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
    },
    prevSlide() {
      this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
    },
    goToSlide(index) {
      this.currentSlide = index;
      // Reset the autoplay timer when manually changing slides
      this.stopSlideShow();
      this.startSlideShow();
    }
  }
}
</script>

<style scoped>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

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
  animation: fadeIn 0.6s ease-out forwards;
}

/* Slideshow transition */
.slide-enter-active,
.slide-leave-active {
  transition: opacity 1s ease-in-out;
}

.slide-enter-from,
.slide-leave-to {
  opacity: 0;
}

html {
  scroll-behavior: smooth;
}
</style>
