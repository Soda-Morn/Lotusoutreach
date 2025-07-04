<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Full Screen Slideshow -->
    <section class="relative h-screen w-full overflow-hidden">
      <!-- Slides Container -->
      <div class="relative h-full w-full">
        <!-- Slide 1 -->
        <div v-if="currentSlide === 0" class="absolute inset-0 transition-opacity duration-1000 ease-in-out">
          <img src="@/img/cam1.png" alt="Cambodia program 1" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
            <div class="text-center px-6 text-white max-w-4xl">
              <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 tracking-tight">CAMBODIA</h1>
              <div class="w-24 h-1 bg-white mx-auto mb-8"></div>
              <p class="text-xl md:text-2xl font-light leading-relaxed text-gray-100 mb-12">
                Empowering girls through education and care programs
              </p>
              <button
                class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Discover Our Programs
              </button>
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
              <button
                class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Learn About Our Programs
              </button>
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
              <button
                class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Support Our Mission
              </button>
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
              <button
                class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Support Our Mission
              </button>
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
    <section class="py-20">
      <div class="container mx-auto px-6 max-w-7xl">
        <!-- Education and Training -->
        <div class="mb-20">
          <div class="text-center mb-16">
            <div
              class="inline-flex items-center mb-6 px-8 py-4 rounded-lg bg-white shadow-lg border-l-4 border-pink-500">
              <div class="w-12 h-12 bg-pink-500 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-graduation-cap text-xl text-white"></i>
              </div>
              <h2 class="text-3xl font-bold text-gray-800">
                EDUCATION AND TRAINING
              </h2>
            </div>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">
              Building pathways to education and professional growth for young women in Cambodia
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Lotus Pedals -->
            <div
              class="group bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-pink-500 overflow-hidden">
              <div class="p-8">
                <div
                  class="w-16 h-16 bg-pink-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-pink-500 transition-colors duration-300">
                  <i
                    class="fas fa-bicycle text-2xl text-pink-500 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  Lotus Pedals
                </h3>
                <p class="text-gray-600 leading-relaxed">
                  Help provide heavy terrain bicycles to girls in rural areas who would not otherwise be able to travel
                  the long distance to school.
                </p>
              </div>
              <div
                class="h-1 bg-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
              </div>
            </div>

            <!-- GATE -->
            <div
              class="group bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-blue-500 overflow-hidden">
              <div class="p-8">
                <div
                  class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-500 transition-colors duration-300">
                  <i
                    class="fas fa-book-open text-2xl text-blue-500 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  GATE
                </h3>
                <p class="text-gray-600 leading-relaxed">
                  Help provide education scholarships and rice support for at-risk girls and their families living in
                  dire poverty in rural Cambodia.
                </p>
              </div>
              <div
                class="h-1 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
              </div>
            </div>

            <!-- CATALYST -->
            <div
              class="group bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-pink-500 overflow-hidden">
              <div class="p-8">
                <div
                  class="w-16 h-16 bg-pink-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-pink-500 transition-colors duration-300">
                  <i
                    class="fas fa-user-graduate text-2xl text-pink-500 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  CATALYST
                </h3>
                <p class="text-gray-600 leading-relaxed">
                  Help provide university scholarships, mentoring, and leadership training for at-risk female youth in
                  Cambodia.
                </p>
              </div>
              <div
                class="h-1 bg-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
              </div>
            </div>

            <!-- PNC/V -->
            <div
              class="group bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-blue-500 overflow-hidden">
              <div class="p-8">
                <div
                  class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-500 transition-colors duration-300">
                  <i
                    class="fas fa-laptop-code text-2xl text-blue-500 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  PNC/V
                </h3>
                <p class="text-gray-600 leading-relaxed">
                  Help provide high quality IT education in a holistic residential environment for at-risk female youth
                  in Cambodia and Vietnam.
                </p>
              </div>
              <div
                class="h-1 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
              </div>
            </div>
          </div>
        </div>

        <!-- CARE Section -->
        <div>
          <div class="text-center mb-16">
            <div
              class="inline-flex items-center mb-6 px-8 py-4 rounded-lg bg-white shadow-lg border-l-4 border-blue-500">
              <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-hands-helping text-xl text-white"></i>
              </div>
              <h2 class="text-3xl font-bold text-gray-800">
                CARE
              </h2>
            </div>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">
              Providing essential support and resources to communities in need
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Getting Well -->
            <div
              class="group bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-blue-500 overflow-hidden">
              <div class="p-8">
                <div
                  class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-500 transition-colors duration-300">
                  <i
                    class="fas fa-water text-2xl text-blue-500 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  Getting Well
                </h3>
                <p class="text-gray-600 leading-relaxed">
                  Help construct water wells that serve entire villages in the drought-prone regions of rural Cambodia.
                </p>
              </div>
              <div
                class="h-1 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
              </div>
            </div>

            <!-- WINS -->
            <div
              class="group bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-pink-500 overflow-hidden">
              <div class="p-8">
                <div
                  class="w-16 h-16 bg-pink-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-pink-500 transition-colors duration-300">
                  <i
                    class="fas fa-tint text-2xl text-pink-500 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  Water In Schools (WINS)
                </h3>
                <p class="text-gray-600 leading-relaxed">
                  Help install water filtration systems in schools to provide clean drinking water and improved
                  wellbeing to children in rural Cambodia.
                </p>
              </div>
              <div
                class="h-1 bg-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
              </div>
            </div>

            <!-- R4E -->
            <div
              class="group bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-blue-500 overflow-hidden">
              <div class="p-8">
                <div
                  class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-500 transition-colors duration-300">
                  <i
                    class="fas fa-utensils text-2xl text-blue-500 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  Rice 4 Education (R4E)
                </h3>
                <p class="text-gray-600 leading-relaxed">
                  Help provide rice support to villagers to help them support their girl childrens' education in rural
                  Cambodia.
                </p>
              </div>
              <div
                class="h-1 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
              </div>
            </div>

            <!-- CTC -->
            <div
              class="group bg-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 border-l-4 border-pink-500 overflow-hidden">
              <div class="p-8">
                <div
                  class="w-16 h-16 bg-pink-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-pink-500 transition-colors duration-300">
                  <i
                    class="fas fa-hands-helping text-2xl text-pink-500 group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  CTC
                </h3>
                <p class="text-gray-600 leading-relaxed">
                  Help provide trauma therapy and assistance to survivors of trafficking and sexual and domestic
                  violence in a women's shelter in rural Cambodia.
                </p>
              </div>
              <div
                class="h-1 bg-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
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
