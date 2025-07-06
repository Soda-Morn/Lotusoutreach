<template>
  <div class="min-h-screen bg-white">
    <!-- Hero Section with Slideshow -->
    <section class="relative bg-gradient-to-br from-blue-100 via-purple-100 to-indigo-700">
      <div class="relative w-full h-[600px] overflow-hidden">
        <div class="absolute inset-0 z-0">
          <div
            v-for="(image, index) in images"
            :key="index"
            :class="[
              'absolute inset-0 transition-opacity duration-700 ease-in-out',
              current === index ? 'opacity-100' : 'opacity-0'
            ]"
          >
            <div class="relative w-full h-full">
              <img
                :src="image"
                :alt="`Slide ${index + 1}`"
                class="w-full h-full object-cover"
              />
              <div class="absolute inset-0 bg-black/50"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Centered Hero Card -->
      <div class="absolute inset-0 flex items-center justify-center px-4 z-20">
        <div class="p-10 max-w-2xl text-center">
          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-100 mb-6">See Our Programs</h1>
          <p class="text-xl text-gray-100 mb-8 leading-relaxed">
            Learn about our solutions in education, training, and care that empower vulnerable communities worldwide.
          </p>
          <a href="#programs" class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 text-lg rounded-lg inline-block transition-colors duration-200">
            LEARN MORE
          </a>
        </div>
      </div>
    </section>

    <!-- Section: Lotus Outreach Intro -->
    <section class="relative py-24 px-4 sm:px-6 lg:px-8 bg-white">
      <div class="relative max-w-6xl mx-auto flex flex-col md:flex-row items-center md:items-start">
        <!-- Image & Badge -->
        <div class="relative mr-0 md:mr-8 mb-12 md:mb-0">
          <div class="w-[400px] h-[400px] rounded-full border-[12px] border-blue-500 overflow-hidden mx-auto">
  <img src="https://lotusoutreach.org/wp-content/uploads/2019/08/header.jpg" alt="Large Profile" class="w-full h-full object-cover">
</div>

          <div class="absolute -top-4 -left-4 bg-blue-600 text-white p-4 rounded-lg shadow-lg text-center">
            <p class="text-2xl font-bold">23</p>
            <p class="text-sm">Years of</p>
            <p class="text-sm">Experience</p>
          </div>
          <div class="absolute -bottom-12 -left-4 bg-blue-700 text-white p-4 rounded-lg shadow-lg w-64 text-sm">
            <p class="font-semibold mb-1">Together with our partners,</p>
            <p>we continue to provide education scholarships, skills training, counseling, and safe environments for vulnerable communities across Cambodia.</p>
          </div>
        </div>

        <!-- Text -->
        <div class="flex-1 text-center md:text-left">
          <h1 class="text-4xl font-bold text-gray-800 mb-4">History</h1>
          <h2 class="text-2xl font-semibold text-gray-600 mb-6">| Donate For Girls Around The World!</h2>
          <p class="text-gray-700 mb-4">
            Lotus Outreach’s work in Cambodia began with a powerful moment when founder Khyentse Norbu met a young, partially blind girl at a safe house. Touched by her strength, he pledged to support her education—an experience that reshaped our mission.
          </p>
          <p class="text-gray-700">
            Originally founded in 1993 in India to support refugees, LO expanded globally, establishing its U.S. headquarters in 2002.
          </p>
          <p class="text-gray-700 mt-4">
            <strong class="text-blue-600">Best Addition:</strong> Today, Lotus Outreach Cambodia empowers women and girls through education, skills training, and community programs—breaking the cycle of poverty and creating lasting change.
          </p>
        </div>
      </div>
    </section>

    <!-- Section: Our Mission, Vision, Values -->
    <section class="py-20" id="mission-vision-values">
      <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
        <!-- Left: Mission, Vision, Values -->
        <div>
          <h2 class="text-4xl font-bold text-blue-700 mb-8">Our Mission, Vision & Values</h2>

          <!-- Mission -->
          <div class="mb-6">
            <div class="flex items-center mb-2">
              <Target class="text-blue-600 w-7 h-7 mr-2" />
              <h3 class="text-xl font-semibold text-blue-800">Our Mission</h3>
            </div>
            <p class="text-gray-700 leading-relaxed">
              To empower vulnerable women and children in Cambodia through education, training, and care—
              helping them break the cycle of poverty and live with dignity, opportunity, and hope.
            </p>
          </div>

          <!-- Vision -->
          <div class="mb-6">
            <div class="flex items-center mb-2">
              <Eye class="text-blue-600 w-7 h-7 mr-2" />
              <h3 class="text-xl font-semibold text-blue-800">Our Vision</h3>
            </div>
            <p class="text-gray-700 leading-relaxed">
              A world where every girl and child, no matter their background, has access to quality education,
              protection, and the tools to shape their own future.
            </p>
          </div>

          <!-- Values -->
          <div>
            <div class="flex items-center mb-2">
              <Gem class="text-blue-600 w-7 h-7 mr-2" />
              <h3 class="text-xl font-semibold text-blue-800">Our Values</h3>
            </div>
            <p class="text-gray-700 leading-relaxed">
              We believe in dignity, equity, and opportunity for all. With compassion, integrity, and resilience,
              we uplift the vulnerable and build brighter futures—one life at a time.
            </p>
          </div>
        </div>

        <!-- Right: Image -->
        <div>
          <img
            src="https://lotusoutreach.org/wp-content/uploads/2020/02/IMG_9585-2.jpg"
            alt="Happy girls with bicycles"
            class="rounded-2xl shadow-2xl w-full object-cover"
          />
        </div>
      </div>
    </section>

    <!-- Section: Our Impact -->
    <section  id="partners">
  <div class="container mx-auto px-4 py-12">
  <h2 class="text-4xl  text-blue-700 md:text-6xl font-extrabold text-center mb-16 glow-effect" data-aos="fade-up">
      Our Inspired Team
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8"> <!-- Adjusted to lg:grid-cols-4 for balance -->
      <div
        v-for="(member, index) in teamMembers"
        :key="member.name"
        class="text-center transition-all duration-500  hover:-translate-y-2"
        data-aos="zoom-in"
        :data-aos-delay="100 * (index + 1)"
      >
        <div class="relative w-48 h-48 mx-auto overflow-hidden rounded-full border-4 border-blue-500">
          <img
            :src="member.image"
            :alt="member.name"
            class="w-full h-full object-cover rounded-full transition-transform duration-300 hover:scale-110"
          />
          <div class="absolute inset-0 rounded-full bg-indigo-500 opacity-0 hover:opacity-20 transition-opacity duration-300"></div>
        </div>
        <p class="mt-8 text-2xl font-bold text-blue-500">{{ member.name }}</p>
        <p class=" text-black-500 text-lg">{{ member.position }}</p>
      </div>
    </div>
  </div>
</section>
    <!-- Section: Partners Slider -->
    <section class="bg-white py-16" id="partners">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
      <!-- Section Title -->
      <h2 class="text-3xl sm:text-4xl font-bold text-blue-700 mb-10 flex items-center">
        
        Our Value Partners
      </h2>

      <div class="relative">
        <!-- Logo Slider -->
        <div
          ref="slider"
          class="flex overflow-x-auto space-x-6 scroll-smooth scrollbar-hide pb-4"
          @mouseenter="pauseAutoScroll"
          @mouseleave="resumeAutoScroll"
        >
          <div
            v-for="(partner, index) in partnerLogos"
            :key="index"
            class="min-w-[160px] h-32 flex flex-col items-center justify-center bg-gray-50 rounded-xl shadow hover:shadow-md transition duration-300 cursor-pointer"
          >
            <a
              :href="partner.url"
              target="_blank"
              rel="noopener noreferrer"
              class="flex items-center justify-center w-full h-full"
              :title="partner.info"
            >
              <img
                :src="partner.img"
                :alt="`Logo of ${partner.info}`"
                class="max-h-20 object-contain px-4"
              />
            </a>
            <p class="mt-2 text-center text-sm text-gray-600">{{ partner.info }}</p>
          </div>
        </div>

        <!-- Navigation Arrows -->
        <button
          class="absolute left-2 top-1/2 -translate-y-1/2 bg-white shadow-md w-10 h-10 rounded-full flex items-center justify-center hover:bg-gray-100 transition z-10"
          @click="scrollLeft"
          aria-label="Scroll logos left"
        >
          <ChevronLeft class="w-5 h-5 text-gray-700" />
        </button>

        <button
          class="absolute right-2 top-1/2 -translate-y-1/2 bg-white shadow-md w-10 h-10 rounded-full flex items-center justify-center hover:bg-gray-100 transition z-10"
          @click="scrollRight"
          aria-label="Scroll logos right"
        >
          <ChevronRight class="w-5 h-5 text-gray-700" />
        </button>
      </div>
    </div>
  </section>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import {
  Target, Eye, Gem,
  ChevronLeft, ChevronRight,
  TrendingUp, Users, BookOpen, Home
} from 'lucide-vue-next'

const images = [
  "https://lotusoutreach.org/wp-content/uploads/2019/08/header.jpg",
  "https://lotusoutreach.org/wp-content/uploads/2020/02/IMG_9585-2.jpg",
  "https://helpcode.ch/wp-content/uploads/2017/07/CCS-4-750x498.jpg",
]

const current = ref(0)
const nextSlide = () => {
  current.value = (current.value + 1) % images.length
}
const prevSlide = () => {
  current.value = (current.value - 1 + images.length) % images.length
}
const goToSlide = (index) => {
  current.value = index
}

let interval
onMounted(() => {
  interval = setInterval(nextSlide, 5000)
})
onBeforeUnmount(() => {
  clearInterval(interval)
})

const teamMembers = [
  {
    name: 'Glenn Fawcett ',
    position: 'Executive Director',
    image: 'https://lotusoutreach.org/wp-content/uploads/2020/02/IMG_9668-1024x768.jpg',
  },
  {
    name: ' Raksmey Var ',
    position: 'Country Representative, Cambodia',
    image: 'https://lotusoutreachaustralia.org.au/wp-content/uploads/2015/07/Raksmey-for-web-site-.jpg',
  },
  {
    name: 'Pisey Chea',
    position: 'LOCAM Project Officer',
    image: 'https://lotusoutreachaustralia.org.au/wp-content/uploads/2018/06/Untitled-design-2.jpg',
  },
  {
    name: 'Borika',
    position: 'Accountant, Cambodia',
    image: 'https://lotusoutreach.org/wp-content/uploads/2022/08/borika.jpeg',
  },
  
]

onMounted(() => {
  AOS.init({ duration: 1000, once: true })
})

const partnerLogos = [
 {
    img: "data:image/jpeg;base64,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",
    url: "https://www.passerellesnumeriques.org/what-we-do/cambodia/"
    
  },
  {
    img: "data:image/jpeg;base64,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",
    url: "http://cwcc.org.kh/"
    
  },
  {
    img: "https://bettercarenetwork.org/sites/default/files/styles/max_325x325/public/2022-07/cocd_cambodia_logo.jpeg?itok=M_TusQPl",
    url: "https://cocd-cambodia.org/",
    
  },
  {
    img: "https://kapekh.org/files/Logos/004_Small.png",
    url: "https://www.kapekh.org/",
    
  },
  {
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG-PHDrMqX-Qnh5xX45XjwvCk6Z_96G_Y2bw&shttps://pbs.twimg.com/profile_images/1229260529199222784/nvvsz_HU_400x400.jpg",
    url: "https://www.khemaracambodia.org/",
   
  },
  {
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkp_i6a7QoF16LhEl4pyBL1-TVeMvnXSjHpA&s",
    url: "https://www.ccc-cambodia.org/en/ngodb/ngo-information/914",
    
  },
  {
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCljWYOPH-B53hWvcR5YnxvGZ0eENHAC_hfg&s",
    url: "https://www.whitelotustrust.org/",
    
  },
  {
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtqDNr8W1xVsYI1MO7mo-uIZjb6bQKKUHNJA&s",
    url: "https://www.thegardenofpeace.org/",
    
  },

  {
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTD0I4XK5CYJ88Qxs0rid0x8xBd9yu8cesDag&s",
    url: "https://www.primerospasos.org/",
  
  },
  {
    img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHRdeUeM-UWygfL6JSu5qFNImCJ6n8B2MBAQ&s",
    url: "https://mulheresdaparada.org/",
  
  }
]

const slider = ref(null)
let autoScrollInterval = null
const scrollStep = 2 // px per interval tick
const intervalMs = 20 // interval duration in ms

function autoScroll() {
  if (!slider.value) return
  slider.value.scrollLeft += scrollStep
  if (slider.value.scrollLeft >= slider.value.scrollWidth - slider.value.clientWidth) {
    slider.value.scrollLeft = 0
  }
}

const startAutoScroll = () => {
  if (autoScrollInterval) return
  autoScrollInterval = setInterval(autoScroll, intervalMs)
}

const stopAutoScroll = () => {
  if (autoScrollInterval) {
    clearInterval(autoScrollInterval)
    autoScrollInterval = null
  }
}

const pauseAutoScroll = () => {
  stopAutoScroll()
}

const resumeAutoScroll = () => {
  startAutoScroll()
}

const scrollLeft = () => {
  if (!slider.value) return
  const newScrollPos = Math.max(slider.value.scrollLeft - 300, 0)
  slider.value.scrollTo({ left: newScrollPos, behavior: 'smooth' })
}

const scrollRight = () => {
  if (!slider.value) return
  const maxScroll = slider.value.scrollWidth - slider.value.clientWidth
  let newScrollPos = slider.value.scrollLeft + 300
  if (newScrollPos > maxScroll) {
    newScrollPos = 0
  }
  slider.value.scrollTo({ left: newScrollPos, behavior: 'smooth' })
}

onMounted(() => {
  startAutoScroll()
})

onBeforeUnmount(() => {
  stopAutoScroll()
})
</script>

<style>
/* Hide native scrollbar for partner logos slider */
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}
.scrollbar-hide {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
