<template>
  <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white font-sans">
    <!-- Main Page -->
    <div v-if="currentView === 'home'">
      <!-- Full Screen Slideshow -->
      <section class="relative h-screen w-full overflow-hidden">
        <!-- Slides Container -->
        <div class="relative h-full w-full">
          <div
            v-for="(slide, index) in slides"
            :key="index"
            v-show="currentSlide === index"
            class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
            :class="{ 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }"
          >
            <img :src="slide.image" :alt="slide.alt" class="w-full h-full object-cover" />
            <div
              class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-center justify-center"
            >
              <div class="text-center px-6 text-white max-w-5xl animate-slide-up">
                <!-- Lotus Outreach Branding -->
                <div class="mb-8">
                  <h1 class="text-5xl md:text-7xl font-poppins font-extrabold mb-4 text-pink-400">
                    Lotus Outreach
                  </h1>
                  <div class="w-32 h-1 bg-gradient-to-r from-pink-400 to-pink-600 mx-auto mb-6 rounded-full"></div>
                </div>
                
                <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-poppins font-extrabold mb-6 tracking-wide uppercase">
                  <span class="text-gray-200">{{ slide.titlePart1 }}</span>
                  <span class="text-blue-400">{{ slide.titlePart2 }}</span>
                </h2>
                <p class="text-lg sm:text-xl md:text-2xl font-light leading-relaxed text-gray-100 mb-10">
                  {{ slide.description }}
                </p>
                
                <!-- Call to Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                  <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    Explore Programs
                  </button>
                  <button class="bg-gradient-to-r from-pink-500 to-pink-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    Support Us
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Indicators -->
        <div class="absolute bottom-10 left-0 right-0 flex justify-center space-x-4 z-10">
          <button
            v-for="(slide, index) in slides"
            :key="index"
            @click="goToSlide(index)"
            class="w-3 h-3 rounded-full transition-all duration-300"
            :class="currentSlide === index ? 'bg-pink-500 w-8' : 'bg-white/50 hover:bg-white/80'"
            :aria-label="`Go to slide ${index + 1}`"
          ></button>
        </div>
      </section>

      <!-- Impact Stats Section -->
      <section class="py-20 bg-gradient-to-br from-blue-50 to-pink-50">
        <div class="container mx-auto px-6 max-w-7xl">
          <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-poppins font-bold text-gray-900 mb-4">Our Impact</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-pink-500 mx-auto mb-6 rounded-full"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Making a measurable difference in the lives of Cambodian women and communities</p>
          </div>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div v-for="(stat, index) in impactStats" :key="index" class="text-center group">
              <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                  <i :class="stat.icon" class="text-2xl text-white"></i>
                </div>
                <div class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">{{ stat.number }}</div>
                <div class="text-gray-600 font-medium">{{ stat.label }}</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Programs Section -->
      <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-7xl">
          <!-- Education and Training -->
          <div class="mb-24">
            <div class="text-center mb-16">
              <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-500 shadow-xl mb-6 transform transition-transform duration-500 hover:scale-110">
                <i class="fas fa-graduation-cap text-2xl text-white"></i>
              </div>
              <h2 class="text-4xl md:text-5xl font-poppins font-extrabold text-blue-600 mb-4 tracking-wide">
                Education in Cambodia
              </h2>
              <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-blue-600 mx-auto mb-6 rounded-full"></div>
              <p class="text-gray-600 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                Empowering Cambodian women through transformative education and professional development initiatives
              </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
              <div
                v-for="(program, index) in educationPrograms"
                :key="index"
                class="group bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 border border-blue-100"
              >
                <div class="h-56 overflow-hidden relative">
                  <img :src="program.image" :alt="program.title" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                  <div class="absolute top-4 left-4">
                    <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center">
                      <i :class="program.icon" class="text-lg text-white"></i>
                    </div>
                  </div>
                </div>
                <div class="p-6">
                  <h3 class="text-xl font-bold font-poppins text-gray-900 mb-3">{{ program.title }}</h3>
                  <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ program.description }}</p>
                  <button 
                    @click="showProgramDetail(program, 'education')"
                    class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 transition-colors duration-300"
                  >
                    Learn More
                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Community Care -->
          <div class="mt-24">
            <div class="text-center mb-16">
              <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-pink-500 shadow-xl mb-6 transform transition-transform duration-500 hover:scale-110">
                <i class="fas fa-hands-helping text-2xl text-white"></i>
              </div>
              <h2 class="text-4xl md:text-5xl font-poppins font-extrabold text-pink-600 mb-4 tracking-wide">
                Community Care
              </h2>
              <div class="w-32 h-1 bg-gradient-to-r from-pink-500 to-pink-600 mx-auto mb-6 rounded-full"></div>
              <p class="text-gray-600 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                Strengthening Cambodian communities with essential resources and compassionate support
              </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
              <div
                v-for="(program, index) in communityPrograms"
                :key="index"
                class="group bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 border border-pink-100"
              >
                <div class="relative h-64 overflow-hidden">
                  <img :src="program.image" :alt="program.title" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                  <div class="absolute top-4 left-4">
                    <div class="w-10 h-10 rounded-full bg-pink-500 flex items-center justify-center">
                      <i :class="program.icon" class="text-lg text-white"></i>
                    </div>
                  </div>
                  <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                </div>
                <div class="p-6">
                  <h3 class="text-xl font-bold font-poppins text-gray-900 mb-3">{{ program.title }}</h3>
                  <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ program.description }}</p>
                  <button 
                    @click="showProgramDetail(program, 'community')"
                    class="inline-flex items-center text-pink-600 font-semibold hover:text-pink-700 transition-colors duration-300"
                  >
                    Learn More
                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials Section -->
      <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-6 max-w-7xl">
          <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-poppins font-bold text-gray-900 mb-4">Success Stories</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-pink-500 mx-auto mb-6 rounded-full"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Hear from the women whose lives have been transformed</p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div v-for="(testimonial, index) in testimonials" :key="index" class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
              <div class="flex items-center mb-6">
                <img :src="testimonial.avatar" :alt="testimonial.name" class="w-16 h-16 rounded-full object-cover mr-4" />
                <div>
                  <h4 class="font-bold text-gray-900">{{ testimonial.name }}</h4>
                  <p class="text-blue-600 text-sm font-medium">{{ testimonial.program }}</p>
                </div>
              </div>
              <p class="text-gray-700 leading-relaxed italic">"{{ testimonial.quote }}"</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Call to Action Section -->
      <section class="py-20 bg-gradient-to-r from-blue-600 to-pink-600 text-white">
        <div class="container mx-auto px-6 max-w-7xl text-center">
          <h2 class="text-4xl md:text-5xl font-poppins font-bold mb-6">Join Our Mission</h2>
          <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
            Together, we can create lasting change and empower more women and communities across Cambodia.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:shadow-2xl hover:scale-105 transition-all duration-300">
              Make a Donation
            </button>
            <button class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-pink-600 transition-all duration-300">
              Become a Volunteer
            </button>
          </div>
        </div>
      </section>
    </div>

    <!-- Program Detail Page -->
    <div v-if="currentView === 'detail'" class="min-h-screen">
      <!-- Header with Back Button -->
      <div class="bg-gradient-to-r from-blue-600 to-pink-600 text-white py-8">
        <div class="container mx-auto px-6 max-w-7xl">
          <button 
            @click="goBack"
            class="flex items-center text-white hover:text-gray-200 transition-colors duration-300 mb-6"
          >
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Programs
          </button>
          <div class="flex items-center">
            <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center mr-6">
              <i :class="selectedProgram.icon" class="text-3xl text-white"></i>
            </div>
            <div>
              <h1 class="text-4xl md:text-6xl font-poppins font-bold mb-2">{{ selectedProgram.title }}</h1>
              <p class="text-xl text-white/80">{{ selectedProgram.description }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Program Detail Content -->
      <div class="py-20 bg-white">
        <div class="container mx-auto px-6 max-w-7xl">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
              <!-- About Section -->
              <div>
                <h2 class="text-3xl font-poppins font-bold text-gray-900 mb-6">About This Program</h2>
                <p class="text-lg text-gray-700 leading-relaxed">{{ selectedProgram.fullDescription }}</p>
              </div>

              <!-- Key Features -->
              <div>
                <h3 class="text-2xl font-poppins font-bold text-gray-900 mb-6">Key Features</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div v-for="(feature, index) in selectedProgram.features" :key="index" class="flex items-start p-4 bg-gradient-to-r from-blue-50 to-pink-50 rounded-xl">
                    <i class="fas fa-check-circle text-blue-600 mr-3 mt-1 flex-shrink-0"></i>
                    <span class="text-gray-700">{{ feature }}</span>
                  </div>
                </div>
              </div>

              <!-- Image Gallery -->
              <div v-if="selectedProgram.gallery">
                <h3 class="text-2xl font-poppins font-bold text-gray-900 mb-6">Gallery</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                  <div v-for="(img, index) in selectedProgram.gallery" :key="index" class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img :src="img" :alt="`${selectedProgram.title} ${index + 1}`" class="w-full h-32 object-cover hover:scale-105 transition-transform duration-300" />
                  </div>
                </div>
              </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
              <!-- Impact Stats -->
              <div v-if="selectedProgram.stats" class="bg-gradient-to-br from-blue-50 to-pink-50 rounded-2xl p-8">
                <h3 class="text-2xl font-poppins font-bold text-gray-900 mb-6">Our Impact</h3>
                <div class="space-y-6">
                  <div v-for="(stat, index) in selectedProgram.stats" :key="index" class="text-center">
                    <div class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-pink-600 bg-clip-text text-transparent mb-1">{{ stat.number }}</div>
                    <div class="text-gray-600 font-medium">{{ stat.label }}</div>
                  </div>
                </div>
              </div>

              <!-- Call to Action -->
              <div class="bg-gradient-to-r from-blue-600 to-pink-600 rounded-2xl p-8 text-white">
                <h3 class="text-2xl font-poppins font-bold mb-4">Support This Program</h3>
                <p class="mb-6 opacity-90">Your contribution can make a direct impact on this program.</p>
                <div class="space-y-3">
                  <button class="w-full bg-white text-blue-600 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300">
                    Donate Now
                  </button>
                  <button class="w-full border-2 border-white text-white py-3 rounded-xl font-semibold hover:bg-white hover:text-pink-600 transition-all duration-300">
                    Learn More
                  </button>
                </div>
              </div>

              <!-- Contact Info -->
              <div class="bg-gray-50 rounded-2xl p-8">
                <h3 class="text-xl font-poppins font-bold text-gray-900 mb-4">Get in Touch</h3>
                <div class="space-y-3 text-gray-600">
                  <div class="flex items-center">
                    <i class="fas fa-envelope mr-3 text-blue-600"></i>
                    <span>info@lotusoutreach.org</span>
                  </div>
                  <div class="flex items-center">
                    <i class="fas fa-phone mr-3 text-pink-600"></i>
                    <span>+855 23 123 456</span>
                  </div>
                  <div class="flex items-center">
                    <i class="fas fa-map-marker-alt mr-3 text-blue-600"></i>
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
          name: 'Sophea Chen',
          program: 'CATALYST Graduate',
          avatar: '/placeholder.svg?height=64&width=64',
          quote: 'The CATALYST program gave me the confidence and skills to become a leader in my community. Now I help other young women pursue their dreams.'
        },
        {
          name: 'Maly Kem',
          program: 'Lotus Pedals Recipient',
          avatar: '/placeholder.svg?height=64&width=64',
          quote: 'Having a bicycle changed everything for me. I could attend school regularly and now I am studying to become a teacher.'
        },
        {
          name: 'Channary Lim',
          program: 'GATE Scholar',
          avatar: '/placeholder.svg?height=64&width=64',
          quote: 'The scholarship and rice support meant my family could afford to keep me in school. Education opened doors I never imagined possible.'
        }
      ],
      educationPrograms: [
        {
          title: 'Lotus Pedals',
          image: 'https://lotusoutreach.org/wp-content/uploads/2023/02/IMG_7191.jpg',
          icon: 'fas fa-bicycle',
          description: 'Providing durable bicycles to girls in rural Cambodia, enabling them to travel the long distance to school.',
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
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap');

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

.font-poppins {
  font-family: 'Poppins', sans-serif;
}

/* Custom scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: linear-gradient(to bottom, #3b82f6, #ec4899);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(to bottom, #2563eb, #db2777);
}
</style>
