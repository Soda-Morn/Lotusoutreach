<template>
  <div class="min-h-screen bg-white">
    <!-- Hero Section with Slideshow -->
    <section class="relative bg-gradient-to-br from-blue-100 via-purple-100 to-indigo-700">
      <!-- Limited-Height Slideshow Container -->
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
              <!-- Overlay -->
              <div class="absolute inset-0 bg-black/50"></div>
            </div>
          </div>

          <!-- Navigation Arrows and Dots (unchanged) -->
          <!-- ... -->
        </div>
      </div>

      <!-- Centered Hero Card -->
      <div class="absolute inset-0 flex items-center justify-center px-4 z-20">
        <div class="p-10 max-w-2xl text-center">
          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-100 mb-6">
            See Our Programs
          </h1>
          <p class="text-xl text-gray-100 mb-8 leading-relaxed">
            Learn about our solutions in education, training, and care that empower vulnerable communities worldwide.
          </p>
          <a
            href="#programs"
            class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 text-lg rounded-lg inline-block transition-colors duration-200"
          >
            LEARN MORE
          </a>
        </div>
      </div>
    </section>

    <section class="relative py-24 px-4 sm:px-6 lg:px-8">
      <div class="relative max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <h4
            class="text-2xl sm:text-5xl lg:text-6xl font-bold text-blue-600 max-w-4xl mx-auto mb-6"
          >
            Our Mission
          </h4>
          <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-blue-600 mx-auto rounded-full mb-8"></div>
          <p class="text-2xl sm:text-3xl font-semibold text-gray-800 leading-relaxed mb-6">
            Our mission is to
            <span
              class="bg-gradient-to-r from-pink-600 to-pink-600 bg-clip-text text-transparent font-bold"
              >empower vulnerable women and children</span
            >
            living in poverty.
          </p>
          <p class="text-lg sm:text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
            With affiliates in seven countries and strong local NGO partners in India,
            Cambodia, Vietnam, Guatemala, Brazil, and the USA, we are a global community
            that believes
            <span class="font-semibold text-gray-800"
              >empowerment is the heart of sustainable change.</span
            >
          </p>
        </div>

        <!-- Info Grid Section with Images -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
          <!-- Card 1 -->
          <div
            class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-pink-100 overflow-hidden"
          >
            <img
              src="https://lotusoutreachaustralia.org.au/wp-content/uploads/2015/07/Banner-photo-getting-supplies.jpg"
              alt="Empowering women"
              class="w-full h-48 object-cover rounded-t-2xl"
            />
            <div class="p-8 text-center">
              <h3 class="text-2xl font-bold text-gray-800 mb-2">Get to Know Us</h3>
              <p class="text-gray-600 mb-4">
                We empower women and children living in poverty through a range of
                innovative solutions.
              </p>
             
              <a href="#programs" class="text-pink-600 hover:underline font-semibold"
                >Learn More</a
              >
            </div>
          </div>

          <!-- Card 2 -->
          <div
            class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-purple-100 overflow-hidden"
          >
            <img
              src="https://lotusoutreach.org/wp-content/uploads/2018/12/loi-new.png"
              alt="Financial transparency"
              class="w-full h-48 object-cover rounded-t-2xl"
            />
            <div class="p-8 text-center">
              <h3 class="text-2xl font-bold text-gray-800 mb-2">Look Inside Our Books</h3>
              <p class="text-gray-600 mb-4">
                We adhere to the best practices available for accountability and
                transparency.
              </p>
             
               <a href="#financials" class="text-pink-600 hover:underline font-semibold"
                >Learn More</a
              >
            </div>
          </div>

          <!-- Card 3 -->
          <div
            class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-pink-100 overflow-hidden"
          >
            <img
              src="../img/team.png"
              alt="Sustainable model"
              class="w-full h-48 object-cover rounded-t-2xl"
            />
            <div class="p-8 text-center">
              <h3 class="text-2xl font-bold text-gray-800 mb-2">Our Model Works</h3>
              <p class="text-gray-600 mb-4">
                Our well-proven model of sustainable long-term change is replicable and
                scalable.
              </p>
              <a href="#model" class="text-pink-600 hover:underline font-semibold"
                >Learn More</a
              >
            </div>
          </div>
        </div>

        <!-- Team & Story Section with Images -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto mt-16">
          <!-- Card 4 -->
          <div
            class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-purple-100 overflow-hidden"
          >
            <img
              src="https://scontent.fpnh19-1.fna.fbcdn.net/v/t39.30808-6/472677672_591733820459951_8858556688982562071_n.jpg?stp=dst-jpg_s960x960_tt6&_nc_cat=106&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=gddSsEyhWOUQ7kNvwF0Uax3&_nc_oc=AdnNKH8RevYVS4Qdj2pCry_rrOtqOnAbIFLRyjtE_w62EIc3HbJndoLi8mFWfHhsnvw&_nc_zt=23&_nc_ht=scontent.fpnh19-1.fna&_nc_gid=9k0l_zKs9EoO57v6q0bJOA&oh=00_AfPKdyj3bdNvl953R6rHQyYaqXno4h8xvT_dP_H_L0YwyA&oe=686D2A5C"
              alt="Our team"
              class="w-full h-48 object-cover rounded-t-2xl"
            />
            <div class="p-8 text-center">
              <h3 class="text-2xl font-bold text-gray-800 mb-2">Our Team</h3>
              <p class="text-gray-600 mb-4">
                Learn about our team: our staff, founder, partners, and board.
              </p>
              <a href="#team" class="text-pink-600 hover:underline font-semibold"
                >Learn More</a
              >
            </div>
             
          </div>

          <!-- Card 5 -->
          <div
            class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-pink-100 overflow-hidden"
          >
            <img
              src="https://lotusoutreach.org/wp-content/uploads/2018/12/Girls-Access-to-Education-1.jpg"
              alt="Our story"
              class="w-full h-48 object-cover rounded-t-2xl"
            />
            <div class="p-8 text-center">
              <h3 class="text-2xl font-bold text-gray-800 mb-2">Our Story</h3>
              <p class="text-gray-600 mb-4">Learn how our work began and where we are now.</p>
              <a href="#story" class="text-pink-600 hover:underline font-semibold"
                >Learn More</a
              >
            </div>
            
          </div>
           
        </div>
      </div>
    </section>

  <section >
      <div class="relative max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16 ">
          <h2
            class="relative top-[-10px] text-4xl sm:text-5xl lg:text-6xl font-bold text-blue-600 max-w-4xl mx-auto mb-6"
          >
            Our Values
          </h2>
          <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-blue-600 mx-auto rounded-full mb-8"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">
          <!-- Trust Card -->
          <div class="bg-white rounded-lg shadow-md p-6 text-center border border-gray-200 hover:shadow-lg transition-all duration-300">
            <div class="flex justify-center mb-4">
              <CheckCircle class="w-12 h-12 text-pink-500" />
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Trust</h3>
            <p class="text-gray-600 text-sm leading-relaxed">
              We believe in building trust with our communities and partners.
            </p>
          </div>

          <!-- Respect Card -->
          <div class="bg-white rounded-lg shadow-md p-6 text-center border border-gray-200 hover:shadow-lg transition-all duration-300">
            <div class="flex justify-center mb-4">
              <Users class="w-12 h-12 text-pink-500" />
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Respect</h3>
            <p class="text-gray-600 text-sm leading-relaxed">
              We treat everyone with dignity and respect in all our programs.
            </p>
          </div>

          <!-- Solidarity Card -->
          <div class="bg-white rounded-lg shadow-md p-6 text-center border border-gray-200 hover:shadow-lg transition-all duration-300">
            <div class="flex justify-center mb-4">
              <HandHeart class="w-12 h-12 text-pink-500" />
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Solidarity</h3>
            <p class="text-gray-600 text-sm leading-relaxed">
              We stand with vulnerable communities to create lasting impact.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section >
      <div class="relative max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-16">
          <div class="flex justify-center mb-8">
          </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
          <!-- Left -->
          <div>
            <h3 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6">
              A world where every woman and child has the opportunity to thrive
            </h3>
            <p class="text-lg sm:text-xl text-gray-700 leading-relaxed mb-6">
              We envision communities where poverty no longer limits potential, where education opens doors, and where
              sustainable development creates lasting change for generations to come.
            </p>
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center">
                <Lightbulb class="w-6 h-6 text-pink-600" />
              </div>
              <span class="text-gray-800 font-semibold">Innovation in community development</span>
            </div>
          </div>

          <!-- Right (Goals Card with Image) -->
          <div class="bg-white/90 backdrop-blur-md rounded-3xl p-8 shadow-2xl border-2 border-gradient-to-br from-orange-300 to-amber-400">
            <!-- Image Placeholder -->
   <iframe
  class="w-full h-56 object-cover rounded-2xl mb-6"
  src="https://www.youtube.com/embed/QPYp6FNFJ0M?autoplay=1&mute=1&loop=1&playlist=QPYp6FNFJ0M"
  title="Lotus Outreach Video"
  frameborder="0"
  allow="autoplay; encrypted-media"
  allowfullscreen
></iframe>



            <!-- Title -->
            <div class="flex items-center space-x-4 mb-6">
              <Rocket class="w-8 h-8 text-pink-600" />
              <h4 class="text-xl sm:text-2xl font-bold text-gray-900">Our Goals</h4>
            </div>

            <!-- Goals List -->
            <ul class="space-y-4">
              <li class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-pink-500 rounded-full mt-2 flex-shrink-0"></div>
                <span class="text-gray-700">Expand our reach to 10 countries by 2030</span>
              </li>
              <li class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-pink-500 rounded-full mt-2 flex-shrink-0"></div>
                <span class="text-gray-700">Empower 100,000 women and children</span>
              </li>
              <li class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-pink-500 rounded-full mt-2 flex-shrink-0"></div>
                <span class="text-gray-700">Create sustainable income opportunities</span>
              </li>
              <li class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-pink-500 rounded-full mt-2 flex-shrink-0"></div>
                <span class="text-gray-700">Build stronger community partnerships</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="relative py-24 px-4 sm:px-6 lg:px-8">
      <div class="relative max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <h2
            class="text-4xl sm:text-5xl lg:text-6xl font-bold text-blue-600 max-w-4xl mx-auto mb-6"
          >
            Our Impact
          </h2>
          <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-blue-600 mx-auto rounded-full mb-8"></div>
          <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Together, we're creating measurable change in communities around the world. Here's the impact we've made so far.
          </p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
          <div
            v-for="(stat, index) in stats"
            :key="index"
            class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 text-center"
          >
            <div
              :class="`w-14 h-14 bg-${stat.color}-500 rounded-lg flex items-center justify-center mx-auto mb-4`"
            >
              <component :is="stat.icon" class="w-6 h-6 text-white" />
            </div>
            <div class="text-2xl font-bold text-gray-800 mb-2">{{ stat.number }}</div>
            <div class="text-gray-600 font-medium">{{ stat.label }}</div>
          </div>
        </div>

        <!-- Recent Achievements -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-100">
          <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Recent Achievements</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
              <div class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                <div>
                  <h4 class="font-semibold text-gray-800">Scholarship Expansion</h4>
                  <p class="text-gray-600 text-sm">Reached 1,500 girls in Cambodia with GATE program</p>
                </div>
              </div>
              <div class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-emerald-500 rounded-full mt-2 flex-shrink-0"></div>
                <div>
                  <h4 class="font-semibold text-gray-800">Water Project Launch</h4>
                  <p class="text-gray-600 text-sm">Installed 10 wells serving 5,000 people</p>
                </div>
              </div>
            </div>
            <div class="space-y-4">
              <div class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                <div>
                  <h4 class="font-semibold text-gray-800">Training Program</h4>
                  <p class="text-gray-600 text-sm">Trained 300 women in IT skills in Vietnam</p>
                </div>
              </div>
              <div class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-emerald-500 rounded-full mt-2 flex-shrink-0"></div>
                <div>
                  <h4 class="font-semibold text-gray-800">Health Initiative</h4>
                  <p class="text-gray-600 text-sm">Provided care to 2,000 families in rural areas</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { ChevronLeft, ChevronRight } from 'lucide-vue-next'
import { Eye } from 'lucide-vue-next'
import { TrendingUp, Users, GraduationCap, Home } from 'lucide-vue-next'
import { CheckCircle } from 'lucide-vue-next'
import { Lightbulb } from 'lucide-vue-next'
import { Rocket } from 'lucide-vue-next'
import { HandHeart } from 'lucide-vue-next'

const images = [
  "https://www.unicef.org/cambodia/sites/unicef.org.cambodia/files/styles/media_large_image/public/nicksells.com%20HR_13790.webp?itok=espeRlL5https://business-cambodia.com/cms/assets/2f22a1db-85ee-42e9-8a8c-a0a134e1a82c",
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

// Auto slide
let interval
onMounted(() => {
  interval = setInterval(nextSlide, 5000)
})

onBeforeUnmount(() => {
  clearInterval(interval)
})

const stats = [
  { number: '25,000+', label: 'Lives Impacted', icon: 'Users', color: 'green' },
  { number: '15,000+', label: 'Children Educated', icon: 'BookOpen', color: 'blue' },
  { number: '5,000+', label: 'Families Supported', icon: 'Home', color: 'purple' },
  { number: '85%', label: 'Success Rate', icon: 'TrendingUp', color: 'orange' },
]
</script>