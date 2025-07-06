<template>
  <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white font-sans">
    <!-- Full Screen Slideshow -->
    <section class="relative h-screen w-full overflow-hidden">
      <!-- Slides Container -->
      <div class="relative h-full w-full">
        <div v-for="(slide, index) in slides" :key="index"
             v-show="currentSlide === index"
             class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
             :class="{ 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }">
          <img :src="slide.image" :alt="slide.alt" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-center justify-center">
            <div class="text-center px-6 text-white max-w-5xl animate-slide-up">
              <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold mb-6 tracking-tight uppercase drop-shadow-lg text-blue-600">
                {{ slide.title }}
              </h1>
              <div class="w-32 h-1 bg-blue-600 mx-auto mb-8 rounded-full"></div>
              <p class="text-lg sm:text-xl md:text-2xl font-light leading-relaxed text-gray-100 mb-10">
                {{ slide.description }}
              </p>
              <button class="bg-amber-400 text-gray-900 px-8 py-3 rounded-full font-semibold text-lg
                            hover:bg-amber-300 transition-all duration-300 shadow-lg hover:shadow-xl
                            transform hover:-translate-y-1">
                {{ slide.buttonText }}
              </button>
            </div>
          </div>
        </div>
      </div>


      

      <!-- Indicators -->
      <div class="absolute bottom-10 left-0 right-0 flex justify-center space-x-4 z-10">
        <button v-for="(slide, index) in slides" :key="index" @click="goToSlide(index)"
                class="w-3 h-3 rounded-full transition-all duration-300"
                :class="currentSlide === index ? 'bg-blue-600 w-8' : 'bg-white/50 hover:bg-white/80'"
                :aria-label="`Go to slide ${index + 1}`">
        </button>
      </div>
    </section>

    <!-- Programs Section -->
    <section class="py-24 bg-white">
      <div class="container mx-auto px-6 max-w-7xl">
        <!-- Education and Training -->
        <div class="mb-24">
          <div class="text-center mb-16">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-600 shadow-xl mb-6
                        transform transition-transform duration-500 hover:scale-110">
              <i class="fas fa-graduation-cap text-2xl text-white"></i>
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 font-serif tracking-tight">
              Education & Training
            </h2>
            <div class="w-32 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
            <p class="text-gray-600 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
              Empowering Cambodian women through transformative education and professional development initiatives
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div v-for="(program, index) in educationPrograms" :key="index"
                 class="group bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-500
                        hover:shadow-2xl hover:-translate-y-2">
              <div class="h-56 overflow-hidden">
                <img :src="program.image" :alt="program.title"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
              </div>
              <div class="p-6">
                <div class="flex items-center mb-4">
                  <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center mr-4
                              transform group-hover:scale-110 transition-transform duration-300">
                    <i :class="program.icon" class="text-lg text-white"></i>
                  </div>
                  <h3 class="text-xl font-bold font-serif text-gray-900">{{ program.title }}</h3>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">{{ program.description }}</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Community Care -->
        <div class="mt-24">
          <div class="text-center mb-16">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-teal-500 shadow-xl mb-6
                        transform transition-transform duration-500 hover:scale-110">
              <i class="fas fa-hands-helping text-2xl text-white"></i>
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 font-serif tracking-tight">
              Community Care
            </h2>
            <div class="w-32 h-1 bg-teal-500 mx-auto mb-6 rounded-full"></div>
            <p class="text-gray-600 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
              Strengthening Cambodian communities with essential resources and compassionate support
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div v-for="(program, index) in communityPrograms" :key="index"
                 class="group bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-500
                        hover:shadow-2xl hover:-translate-y-2">
              <div class="relative h-64 overflow-hidden">
                <img :src="program.image" :alt="program.title"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
              </div>
              <div class="p-6">
                <div class="flex items-center mb-4">
                  <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center mr-4
                              transform group-hover:scale-110 transition-transform duration-300">
                    <i :class="program.icon" class="text-lg text-white"></i>
                  </div>
                  <h3 class="text-xl font-bold font-serif text-gray-900">{{ program.title }}</h3>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ program.description }}</p>
                <button class="text-teal-500 font-semibold hover:text-teal-600 transition-colors duration-300">
                  Learn More
                </button>
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
      slides: [
        {
          image: 'https://lotusoutreachaustralia.org.au/wp-content/uploads/2015/07/Row-of-girls-watching-grad-ceremony-768x417.png',
          alt: 'Cambodia program 1',
          title: 'Education is Her Power',
          description: 'Empowering girls through education and care programs',
          buttonText: 'Discover Our Programs'
        },
        {
          image: 'https://lotusoutreachaustralia.org.au/wp-content/uploads/2025/02/three-girls-banner-.jpg',
          alt: 'Cambodia program 2',
          title: 'Education',
          description: 'Building pathways to education for young women',
          buttonText: 'Learn About Our Programs'
        },
        {
          image: 'https://lotusoutreach.org/wp-content/uploads/2023/02/2LO-3-1.jpg',
          alt: 'Cambodia program 3',
          title: 'Empowerment',
          description: 'Leadership training and mentorship for young women',
          buttonText: 'Explore More'
        },
        {
          image: 'https://lotusoutreach.org/wp-content/uploads/2020/02/IMG_9377-1024x768.jpg',
          alt: 'Cambodia program 4',
          title: 'Future Leaders',
          description: 'Inspiring the next generation of female leaders',
          buttonText: 'Join Our Mission'
        }
      ],
      educationPrograms: [
        {
          title: 'Lotus Pedals',
          image: 'https://lotusoutreach.org/wp-content/uploads/2023/02/IMG_7191.jpg',
          icon: 'fas fa-bicycle',
          description: 'Providing durable bicycles to girls in rural Cambodia, enabling them to travel the long distance to school.'
        },
        {
          title: 'GATE',
          image: 'https://lotusoutreach.org/wp-content/uploads/2020/02/Alumni-Gathering-Group-Photo-2.jpg',
          icon: 'fas fa-book-open',
          description: 'Providing education scholarships and rice support for at-risk girls and their families living in dire poverty.'
        },
        {
          title: 'CATALYST',
          image: 'https://scontent.fpnh19-1.fna.fbcdn.net/v/t39.30808-6/486021460_651365147830151_8884197849751306824_n.jpg?stp=dst-jpg_s960x960_tt6&_nc_cat=106&ccb=1-7&_nc_sid=75d36f&_nc_ohc=UlLeOYiLjkkQ7kNvwF2U974&_nc_oc=Adl7IRlBBzu7B1Mg7ItT0QlGY-QiHOx83cLFI9yGE3fyQfcwHcvice71U6t0sM8Ff2w&_nc_zt=23&_nc_ht=scontent.fpnh19-1.fna&_nc_gid=UJ3MOSogSfCDfJlQVmiuHg&oh=00_AfTAzuTDriCDXUCXd6JdEd3JtNeY-YdMnz0kArhTmvthZg&oe=686FDD96',
          icon: 'fas fa-user-graduate',
          description: 'Providing university scholarships, mentoring, and leadership training for at-risk female youth in Cambodia.'
        },
        {
          title: 'PNC/V',
          image: 'https://www.passerellesnumeriques.org/wp-content/uploads/2024/06/Country-banner1.png',
          icon: 'fas fa-laptop-code',
          description: 'Providing high-quality IT education in a holistic residential environment for at-risk female youth in Cambodia and Vietnam.'
        }
      ],
      communityPrograms: [
        {
          title: 'Getting Well',
          image: 'https://lotusoutreach.org/wp-content/uploads/2023/02/IMG_2945-1024x768.jpg',
          icon: 'fas fa-water',
          description: 'Constructing water wells to serve entire villages in drought-prone regions of rural Cambodia.'
        },
        {
          title: 'Water In Schools (WINS)',
          image: 'https://lotusoutreach.org/wp-content/uploads/2018/12/people_at_public_water_pump.jpg',
          icon: 'fas fa-tint',
          description: 'Installing water filtration systems in schools to provide clean drinking water and improve wellbeing for children in rural Cambodia.'
        },
        {
          title: 'Rice 4 Education (R4E)',
          image: 'https://lotusoutreach.org/wp-content/uploads/2019/02/16596368001_a6e8e5f163_o-1024x685.jpg',
          icon: 'fas fa-utensils',
          description: 'Providing rice support to villagers to help them support their daughters’ education in rural Cambodia.'
        },
        {
          title: 'CTC',
          image: 'https://lotusoutreach.org/wp-content/uploads/2018/12/loi-new.png',
          icon: 'fas fa-hands-helping',
          description: 'Providing trauma therapy and assistance to survivors of trafficking and sexual and domestic violence in a women’s shelter in rural Cambodia.'
        }
      ]
    }
  },
  mounted() {
    this.startSlideShow();
  },
  beforeUnmount() {
    this.stopSlideShow();
  },
  methods: {
    startSlideShow() {
      this.slideInterval = setInterval(() => {
        this.nextSlide();
      }, 6000);
    },
    stopSlideShow() {
      if (this.slideInterval) {
        clearInterval(this.slideInterval);
      }
    },
    nextSlide() {
      this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    prevSlide() {
      this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    },
    goToSlide(index) {
      this.currentSlide = index;
      this.stopSlideShow();
      this.startSlideShow();
    }
  }
}
</script>

<style scoped>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-slide-up {
  animation: slideUp 0.8s ease-out forwards;
}

html {
  scroll-behavior: smooth;
}
</style>