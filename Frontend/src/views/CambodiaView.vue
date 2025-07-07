```vue
<template>
  <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white font-sans">
    <!-- Main Page -->
    <div v-if="currentView === 'home'">
      <!-- Full Screen Slideshow -->
      <section class="relative h-screen w-full overflow-hidden">
        <!-- Slides Container -->
        <div class="relative h-full w-full">
          <div v-for="(slide, index) in slides" :key="index" v-show="currentSlide === index"
            class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
            :class="{ 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }">
            <img :src="slide.image" :alt="slide.alt" class="w-full h-full object-cover" />
            <div
              class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-center justify-center">
              <div class="text-center px-6 text-white max-w-4xl animate-slide-up">
                <div class="mb-6">
                  <h1 class="text-4xl md:text-6xl font-poppins font-extrabold text-pink-500 mb-3">Lotus Outreach</h1>
                  <div class="w-24 h-1 bg-pink-500 mx-auto rounded"></div>
                </div>
                <h2
                  class="text-3xl sm:text-4xl md:text-5xl font-poppins font-bold mb-4 tracking-tight uppercase">
                  <span class="text-gray-100">{{ slide.titlePart1 }}</span>
                  <span class="text-pink-500">{{ slide.titlePart2 }}</span>
                </h2>
                <p class="text-base sm:text-lg md:text-xl font-light text-gray-200 mb-8">{{ slide.description }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-2 z-10">
          <button v-for="(slide, index) in slides" :key="index" @click="goToSlide(index)"
            class="w-2 h-2 rounded-full transition-all duration-300"
            :class="currentSlide === index ? 'bg-pink-500 w-6' : 'bg-white/40 hover:bg-white/60'"
            :aria-label="`Go to slide ${index + 1}`"></button>
        </div>
      </section>

      <!-- Programs Section -->
      <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
          <div class="mb-16 text-center">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-blue-600 shadow-md mb-4">
              <i class="fas fa-graduation-cap text-xl text-white"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-poppins font-semibold text-gray-900 mb-2">Education in Cambodia</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-4 rounded"></div>
            <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
              Empowering Cambodian women through transformative education and professional development initiatives
            </p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div v-for="(program, index) in educationPrograms" :key="index"
              class="group bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 border border-gray-100">
              <div class="h-48 overflow-hidden relative">
                <img :src="program.image" :alt="program.title"
                  class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute top-3 left-3">
                  <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center">
                    <i :class="program.icon" class="text-sm text-white"></i>
                  </div>
                </div>
              </div>
              <div class="p-5">
                <h3 class="text-lg font-poppins font-medium text-gray-900 mb-2">{{ program.title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-3">{{ program.description }}</p>
                <button @click="showProgramDetail(program, 'education')"
                  class="text-blue-600 font-medium hover:text-blue-700 transition-colors duration-200 text-sm">
                  Learn More <i class="fas fa-arrow-right ml-1"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="mt-16 text-center">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-pink-600 shadow-md mb-4">
              <i class="fas fa-hands-helping text-xl text-white"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-poppins font-semibold text-gray-900 mb-2">Community Care</h2>
            <div class="w-20 h-1 bg-pink-600 mx-auto mb-4 rounded"></div>
            <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
              Strengthening Cambodian communities with essential resources and compassionate support
            </p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div v-for="(program, index) in communityPrograms" :key="index"
              class="group bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 border border-gray-100">
              <div class="h-48 overflow-hidden relative">
                <img :src="program.image" :alt="program.title"
                  class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute top-3 left-3">
                  <div class="w-8 h-8 rounded-full bg-pink-600 flex items-center justify-center">
                    <i :class="program.icon" class="text-sm text-white"></i>
                  </div>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
              </div>
              <div class="p-5">
                <h3 class="text-lg font-poppins font-medium text-gray-900 mb-2">{{ program.title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-3">{{ program.description }}</p>
                <button @click="showProgramDetail(program, 'community')"
                  class="text-pink-600 font-medium hover:text-pink-700 transition-colors duration-200 text-sm">
                  Learn More <i class="fas fa-arrow-right ml-1"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials Section -->
      <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
          <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-poppins font-semibold text-gray-900 mb-2">Success Stories</h2>
            <div class="w-20 h-1  from-blue-600 mx-auto mb-4 rounded"></div>
            <p class="text-gray-600 text-base md:text-lg max-w-xl mx-auto">Hear from the women whose lives have been transformed</p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div v-for="(testimonial, index) in testimonials" :key="index"
              class="bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-shadow duration-300">
              <div class="flex items-center mb-4">
                <img :src="testimonial.avatar" :alt="testimonial.name"
                  class="w-14 h-14 rounded-full object-cover mr-4" />
                <div>
                  <h4 class="font-medium text-gray-900">{{ testimonial.name }}</h4>
                  <p class="text-blue-600 text-xs font-medium">{{ testimonial.program }}</p>
                </div>
              </div>
              <p class="text-gray-700 text-sm leading-relaxed italic">"{{ testimonial.quote }}"</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Call to Action Section -->
      
    </div>

    <!-- Program Detail Page -->
    <div v-if="currentView === 'detail'" class="min-h-screen">
      <div
        class="relative bg-cover bg-center bg-no-repeat text-white py-20 header-bg"
        :style="{ backgroundImage: `url(${selectedProgram.image})` }">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        <div class="container mx-auto px-4 max-w-7xl relative z-10">
          <button @click="goBack"
            class="flex items-center text-white hover:text-gray-300 transition-colors duration-200 mb-6">
            <i class="fas fa-arrow-left mr-2"></i> Back to Programs
          </button>
          <div class="flex items-center">
            <div class="w-16 h-16 rounded-full bg-blue-200/20 flex items-center justify-center mr-6">
              <i :class="selectedProgram.icon" class="text-2xl text-white"></i>
            </div>
            <div>
              <h1 class="text-3xl md:text-5xl font-poppins font-semibold mb-2">{{ selectedProgram.title }}</h1>
              <p class="text-base md:text-lg text-white/90">{{ selectedProgram.description }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
              <div>
                <h2 class="text-2xl font-poppins font-semibold text-gray-900 mb-4">About This Program</h2>
                <p class="text-gray-700 text-base leading-relaxed">{{ selectedProgram.fullDescription }}</p>
              </div>
              <div>
                <h3 class="text-xl font-poppins font-semibold text-gray-900 mb-4">Key Features</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div v-for="(feature, index) in selectedProgram.features" :key="index"
                    class="flex items-start p-3 bg-gray-50 rounded-md">
                    <i class="fas fa-check-circle text-blue-600 mr-2 mt-1"></i>
                    <span class="text-gray-700 text-sm">{{ feature }}</span>
                  </div>
                </div>
              </div>
              <div v-if="selectedProgram.gallery">
                <h3 class="text-xl font-poppins font-semibold text-gray-900 mb-4">Gallery</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                  <div v-for="(img, index) in selectedProgram.gallery" :key="index"
                    class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img :src="img" :alt="`${selectedProgram.title} ${index + 1}`"
                      class="w-full h-32 object-cover hover:scale-105 transition-transform duration-300" />
                  </div>
                </div>
              </div>
            </div>
            <div class="space-y-8">
              <div v-if="selectedProgram.stats" class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-xl font-poppins font-semibold text-gray-900 mb-4">Our Impact</h3>
                <div class="space-y-4">
                  <div v-for="(stat, index) in selectedProgram.stats" :key="index" class="text-center">
                    <div class="text-xl font-bold text-blue-600 mb-1">{{ stat.number }}</div>
                    <div class="text-gray-600 text-sm">{{ stat.label }}</div>
                  </div>
                </div>
              </div>
              <div class="bg-gradient-to-r from-blue-600 to-pink-600 rounded-lg p-6 text-white">
                <h3 class="text-xl font-poppins font-semibold mb-3">Support This Program</h3>
                <p class="text-sm mb-4 opacity-90">Your contribution can make a direct impact on this program.</p>
                <div class="space-y-3">
                  <button
                    class="w-full bg-white text-blue-600 py-2 rounded-md font-medium hover:bg-gray-100 transition-colors duration-200">
                    Donate Now
                  </button>
                  <button
                    class="w-full border-2 border-white text-white py-2 rounded-md font-medium hover:bg-white hover:text-pink-600 transition-colors duration-200">
                    Learn More
                  </button>
                </div>
              </div>
              <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-poppins font-semibold text-gray-900 mb-4">Get in Touch</h3>
                <div class="space-y-3 text-gray-600 text-sm">
                  <div class="flex items-center">
                    <i class="fas fa-envelope mr-2 text-blue-600"></i>
                    <span>info@lotusoutreach.org</span>
                  </div>
                  <div class="flex items-center">
                    <i class="fas fa-phone mr-2 text-pink-600"></i>
                    <span>+855 23 123 456</span>
                  </div>
                  <div class="flex items-center">
                    <i class="fas fa-map-marker-alt mr-2 text-blue-600"></i>
                    <span>Phnom Penh, Cambodia</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CambodiaOutreachClean',
  data() {
    return {
      currentView: 'home',
      selectedProgram: null,
      currentSlide: 0,
      slideInterval: null,
      slides: [
        {
          image: 'https://lotusoutreachaustralia.org.au/wp-content/uploads/2015/07/Row-of-girls-watching-grad-ceremony-768x417.png',
          alt: 'Cambodia program 1',
          titlePart1: 'Education',
          titlePart2: 'Power',
          description: 'Empowering girls through education and care programs'
        },
        {
          image: 'https://lotusoutreachaustralia.org.au/wp-content/uploads/2025/02/three-girls-banner-.jpg',
          alt: 'Cambodia program 2',
          titlePart1: 'Learning',
          titlePart2: 'Pathways',
          description: 'Building pathways to education for young women'
        },
        {
          image: 'https://lotusoutreach.org/wp-content/uploads/2023/02/2LO-3-1.jpg',
          alt: 'Cambodia program 3',
          titlePart1: 'Leadership',
          titlePart2: 'Growth',
          description: 'Leadership training and mentorship for young women'
        },
        {
          image: 'https://lotusoutreach.org/wp-content/uploads/2020/02/IMG_9377-1024x768.jpg',
          alt: 'Cambodia program 4',
          titlePart1: 'Future',
          titlePart2: 'Leaders',
          description: 'Inspiring the next generation of female leaders'
        }
      ],
      impactStats: [
        { number: '15,000+', label: 'Lives Impacted', icon: 'fas fa-heart' },
        { number: '250+', label: 'Villages Reached', icon: 'fas fa-map-marker-alt' },
        { number: '95%', label: 'Success Rate', icon: 'fas fa-chart-line' },
        { number: '12', label: 'Years of Service', icon: 'fas fa-calendar-alt' }
      ],
      testimonials: [
        {
          name: 'Raksmey Var',
          program: 'Country Representative, Cambodia',
          avatar: 'https://lotusoutreachaustralia.org.au/wp-content/uploads/2015/07/Raksmey-for-web-site-.jpg',
          quote: 'The CATALYST program gave me the confidence and skills to become a leader in my community. Now I help other young women pursue their dreams.'
        },
        {
          name: 'Pisey Chea',
          program: 'LOCAM Project Officer',
          avatar: 'https://lotusoutreachaustralia.org.au/wp-content/uploads/2018/06/Untitled-design-2.jpg',
          quote: 'Having a bicycle changed everything for me. I could attend school regularly and now I am studying to become a teacher.'
        },
        {
          name: 'Borika',
          program: 'Accountant, Cambodia',
          avatar: 'https://lotusoutreach.org/wp-content/uploads/2022/08/borika.jpeg',
          quote: 'The scholarship and rice support meant my family could afford to keep me in school. Education opened doors I never imagined possible.'
        }
      ],
      educationPrograms: [
        {
          title: 'Lotus Pedals',
          image: 'https://lotusoutreach.org/wp-content/uploads/2023/02/IMG_7191.jpg',
          icon: 'fas fa-bicycle',
          description: 'Providing durable bicycles to girls in ruralbr Cambodia, enabling them to travel the long distance to school.',
          fullDescription: 'The Lotus Pedals program addresses one of the most significant barriers to education for girls in rural Cambodia: transportation. Many girls live several kilometers away from their schools, making the daily journey on foot both time-consuming and potentially dangerous. By providing sturdy, reliable bicycles, we enable these young women to attend school regularly, arrive safely, and have more time for their studies and family responsibilities.',
          features: [
            'High-quality, durable bicycles designed for rural terrain',
            'Safety training and helmet provision',
            'Maintenance workshops for recipients',
            'Community engagement to ensure program sustainability',
            'Follow-up support to track educational outcomes'
          ],
          stats: [
            { number: '2,500+', label: 'Bicycles Distributed' },
            { number: '85%', label: 'School Attendance Increase' },
            { number: '150+', label: 'Villages Reached' },
            { number: '95%', label: 'Program Satisfaction' }
          ],
          gallery: [
            'https://lotusoutreach.org/wp-content/uploads/2023/02/IMG_7191.jpg',
            'https://lotusoutreach.org/wp-content/uploads/2020/02/IMG_9377-1024x768.jpg'
          ]
        },
        {
          title: 'GATE',
          image: 'https://lotusoutreach.org/wp-content/uploads/2020/02/Alumni-Gathering-Group-Photo-2.jpg',
          icon: 'fas fa-book-open',
          description: 'Providing education scholarships and rice support for at-risk girls and their families living in dire poverty.',
          fullDescription: 'The GATE (Girls Access to Education) program provides comprehensive support to at-risk girls from families living in extreme poverty. Understanding that hunger and financial hardship are major barriers to education, GATE combines educational scholarships with essential rice support for families. This holistic approach ensures that girls can focus on their studies while their families have basic food security.',
          features: [
            'Full educational scholarships covering tuition and supplies',
            'Monthly rice distributions to families',
            'Academic mentoring and tutoring support',
            'Life skills training and counseling',
            'Career guidance and job placement assistance'
          ],
          stats: [
            { number: '1,200+', label: 'Girls Supported' },
            { number: '92%', label: 'Graduation Rate' },
            { number: '78%', label: 'Continue to Higher Education' },
            { number: '300+', label: 'Families Supported' }
          ]
        },
        {
          title: 'CATALYST',
          image: 'https://scontent.fpnh19-1.fna.fbcdn.net/v/t39.30808-6/486021460_651365147830151_8884197849751306824_n.jpg?stp=dst-jpg_s960x960_tt6&_nc_cat=106&ccb=1-7&_nc_sid=75d36f&_nc_ohc=UlLeOYiLjkkQ7kNvwF2U974&_nc_oc=Adl7IRlBBzu7B1Mg7ItT0QlGY-QiHOx83cLFI9yGE3fyQfcwHcvice71U6t0sM8Ff2w&_nc_zt=23&_nc_ht=scontent.fpnh19-1.fna&_nc_gid=UJ3MOSogSfCDfJlQVmiuHg&oh=00_AfTAzuTDriCDXUCXd6JdEd3JtNeY-YdMnz0kArhTmvthZg&oe=686FDD96',
          icon: 'fas fa-user-graduate',
          description: 'Providing university scholarships, mentoring, and leadership training for at-risk female youth in Cambodia.',
          fullDescription: 'CATALYST is our flagship leadership development program that transforms promising young women into confident leaders and change-makers in their communities. Through comprehensive university scholarships, intensive mentoring, and specialized leadership training, CATALYST participants develop the skills, knowledge, and networks needed to break cycles of poverty and become advocates for positive change in Cambodia.',
          features: [
            'Full university scholarships including living expenses',
            'One-on-one mentoring with successful professionals',
            'Leadership workshops and public speaking training',
            'Internship opportunities with partner organizations',
            'Alumni network and ongoing career support'
          ],
          stats: [
            { number: '450+', label: 'University Graduates' },
            { number: '88%', label: 'Employment Rate' },
            { number: '65%', label: 'Leadership Positions' },
            { number: '25+', label: 'Partner Universities' }
          ]
        },
        {
          title: 'PNC/V',
          image: 'https://www.passerellesnumeriques.org/wp-content/uploads/2024/06/Country-banner1.png',
          icon: 'fas fa-laptop-code',
          description: 'Providing high-quality IT education in a holistic residential environment for at-risk female youth in Cambodia and Vietnam.',
          fullDescription: 'The Passerelles Numériques Cambodia/Vietnam program offers intensive, industry-relevant IT education to disadvantaged young women in a supportive residential setting. This comprehensive program combines technical training with personal development, preparing graduates for successful careers in the rapidly growing technology sector while fostering personal growth and leadership skills.',
          features: [
            'Comprehensive IT curriculum covering programming, web development, and digital marketing',
            'Residential program providing safe, supportive living environment',
            'Industry partnerships for internships and job placement',
            'English language training and soft skills development',
            'Ongoing alumni support and career advancement opportunities'
          ],
          stats: [
            { number: '800+', label: 'IT Graduates' },
            { number: '94%', label: 'Job Placement Rate' },
            { number: '$450', label: 'Average Starting Salary' },
            { number: '50+', label: 'Partner Companies' }
          ]
        }
      ],
      communityPrograms: [
        {
          title: 'Getting Well',
          image: 'https://lotusoutreach.org/wp-content/uploads/2023/02/IMG_2945-1024x768.jpg',
          icon: 'fas fa-water',
          description: 'Constructing water wells to serve entire villages in drought-prone regions of rural Cambodia.',
          fullDescription: 'The Getting Well program addresses the critical water shortage crisis in rural Cambodia by constructing deep-water wells that provide clean, reliable water access to entire villages. These wells are strategically placed to serve the maximum number of families while considering factors such as water table depth, community needs, and long-term sustainability. Each well project includes community training on maintenance and water management.',
          features: [
            'Deep-water well construction using modern drilling techniques',
            'Solar-powered pumping systems for sustainable operation',
            'Community water management training',
            'Regular maintenance and quality testing programs',
            'Emergency repair services and spare parts provision'
          ],
          stats: [
            { number: '180+', label: 'Wells Constructed' },
            { number: '45,000+', label: 'People Served' },
            { number: '120+', label: 'Villages Reached' },
            { number: '98%', label: 'Wells Still Operational' }
          ]
        },
        {
          title: 'Water In Schools (WINS)',
          image: 'https://lotusoutreach.org/wp-content/uploads/2018/12/people_at_public_water_pump.jpg',
          icon: 'fas fa-tint',
          description: 'Installing water filtration systems in schools to provide clean drinking water and improve wellbeing for children in rural Cambodia.',
          fullDescription: 'The Water In Schools (WINS) program ensures that students have access to clean, safe drinking water throughout their school day. By installing advanced water filtration systems in rural schools, we eliminate waterborne diseases, improve student health and attendance, and create better learning environments. The program also includes hygiene education to maximize health benefits.',
          features: [
            'Advanced multi-stage water filtration systems',
            'Regular filter replacement and system maintenance',
            'Hygiene education programs for students and teachers',
            'Water quality testing and monitoring',
            'Community involvement in system oversight'
          ],
          stats: [
            { number: '85+', label: 'Schools Equipped' },
            { number: '12,000+', label: 'Students Served' },
            { number: '40%', label: 'Reduction in Sick Days' },
            { number: '15%', label: 'Attendance Increase' }
          ]
        },
        {
          title: 'Rice 4 Education (R4E)',
          image: 'https://lotusoutreach.org/wp-content/uploads/2019/02/16596368001_a6e8e5f163_o-1024x685.jpg',
          icon: 'fas fa-utensils',
          description: 'Providing rice support to villagers to help them support their daughters\' education in rural Cambodia.',
          fullDescription: 'Rice 4 Education recognizes that food security is fundamental to educational access. Many families in rural Cambodia face the difficult choice between sending their children to work or to school. By providing monthly rice distributions to families who commit to keeping their daughters in school, R4E removes this barrier and ensures that education remains a priority even during times of economic hardship.',
          features: [
            'Monthly rice distributions to participating families',
            'School attendance monitoring and reporting',
            'Family education on nutrition and child development',
            'Community engagement and awareness programs',
            'Graduation ceremonies and recognition events'
          ],
          stats: [
            { number: '2,800+', label: 'Families Supported' },
            { number: '3,500+', label: 'Girls Kept in School' },
            { number: '420', label: 'Tons of Rice Distributed' },
            { number: '89%', label: 'School Completion Rate' }
          ]
        },
        {
          title: 'CTC',
          image: 'https://lotusoutreach.org/wp-content/uploads/2018/12/loi-new.png',
          icon: 'fas fa-hands-helping',
          description: 'Providing trauma therapy and assistance to survivors of trafficking and sexual and domestic violence in a women\'s shelter in rural Cambodia.',
          fullDescription: 'The Counseling and Training Center (CTC) provides comprehensive support services to women and girls who have survived trafficking, sexual violence, and domestic abuse. Located in a safe, residential facility, CTC offers trauma-informed therapy, life skills training, and reintegration support to help survivors heal and rebuild their lives with dignity and independence.',
          features: [
            'Professional trauma counseling and therapy services',
            'Safe residential accommodation and 24/7 support',
            'Vocational training and job placement assistance',
            'Legal advocacy and court accompaniment',
            'Family mediation and community reintegration support'
          ],
          stats: [
            { number: '450+', label: 'Women Supported' },
            { number: '78%', label: 'Successful Reintegration' },
            { number: '24/7', label: 'Crisis Support Available' },
            { number: '12', label: 'Months Average Stay' }
          ]
        }
      ]
    }
  },
  mounted() {
    this.startSlideShow()
  },
  beforeUnmount() {
    this.stopSlideShow()
  },
  methods: {
    startSlideShow() {
      this.slideInterval = setInterval(() => {
        this.nextSlide()
      }, 6000)
    },
    stopSlideShow() {
      if (this.slideInterval) {
        clearInterval(this.slideInterval)
      }
    },
    nextSlide() {
      this.currentSlide = (this.currentSlide + 1) % this.slides.length
    },
    goToSlide(index) {
      this.currentSlide = index
      this.stopSlideShow()
      this.startSlideShow()
    },
    showProgramDetail(program, type) {
      this.selectedProgram = program
      this.currentView = 'detail'
      this.stopSlideShow()
      window.scrollTo(0, 0)
    },
    goBack() {
      this.currentView = 'home'
      this.selectedProgram = null
      this.startSlideShow()
    }
  }
}
</script>

<style scoped>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-slide-up {
  animation: slideUp 0.6s ease-out forwards;
}

html {
  scroll-behavior: smooth;
}

.font-sans {
  font-family: 'Poppins', sans-serif;
}

/* Header styling (remains consistent across backgrounds) */
.header-bg {
  background-attachment: fixed;
  background-position: center 20%;
  min-height: 80vh;
}

@media (max-width: 768px) {
  .header-bg {
    min-height: 60vh;
  }
  h1 {
    font-size: 2rem !important;
  }
  h2 {
    font-size: 1.5rem !important;
  }
  .text-base {
    font-size: 0.875rem;
  }
}

/* Five Full-Page Background Options - Uncomment one to activate */

/* Option 1: Subtle Gradient (Default) */
.min-h-screen {
  background: linear-gradient(to bottom, #f3f4f6, #ffffff);
}

/* Option 2: Soft Blue Gradient */
 /* .min-h-screen {
  background: linear-gradient(to bottom, #e6f0fa, #ffffff);
} */

/* Option 3: Warm Beige Gradient */
 /* .min-h-screen {
  background: linear-gradient(to bottom, #f5ece4, #ffffff);
} */

/* Option 4: Light Gray Pattern */
 /* .min-h-screen {
  background: linear-gradient(to bottom, #f7f7f7, #e5e7eb);
  background-image: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
  background-size: 20px 20px;
} */

/* Option 5: Minimal White with Overlay */
 /* .min-h-screen {
  background: #ffffff;
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.01) 1px, transparent 1px);
  background-size: 100% 10px;
} */

button:hover {
  transform: translateY(-1px);
}

.group:hover .transition-transform {
  transform: scale(1.05);
}
</style>
```