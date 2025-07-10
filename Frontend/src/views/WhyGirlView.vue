<template>
  <div class="min-h-screen bg-white">
    <!-- Hero Section with Slideshow -->
    <section class="relative h-screen overflow-hidden">
      <div class="absolute inset-0">
        <div
          class="flex h-full transition-transform duration-700 ease-in-out"
          :style="{ transform: `translateX(-${currentSlide * 100}%)` }"
        >
          <div
            v-for="(image, index) in content.hero.images"
            :key="index"
            class="w-full h-full flex-shrink-0 relative"
          >
            <img
              :src="image.src"
              :alt="image.alt"
              class="w-full h-full object-cover"
            />
            <div
              class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"
            ></div>
          </div>
        </div>
      </div>

      <!-- Hero Content -->
      <div class="relative z-10 h-full flex items-center">
        <div class="container mx-auto px-6 lg:px-8">
          <div class="max-w-3xl">
            <h1
              class="text-5xl lg:text-7xl font-bold text-white mb-6 leading-tight"
            >
              {{ pageContent?.title || content.hero.title }}
              <span class="text-pink-400">{{
                pageContent?.subtitle || content.hero.subtitle
              }}</span>
              {{ content.hero.titleSuffix }}
            </h1>
            <p class="text-xl lg:text-2xl text-gray-200 mb-8 leading-relaxed">
              {{ pageContent?.description || content.hero.description }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
              <button
                v-for="button in content.hero.buttons"
                :key="button.text"
                @click="navigateTo(button.path)"
                :class="button.class"
              >
                {{ button.text }}
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide Indicators -->
      <div
        class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20"
      >
        <button
          v-for="(image, index) in content.hero.images"
          :key="index"
          @click="currentSlide = index"
          class="w-2 h-2 rounded-full transition-all duration-300"
          :class="
            currentSlide === index
              ? 'bg-white scale-125'
              : 'bg-white/50 hover:bg-white/75'
          "
        ></button>
      </div>
    </section>

    <!-- Impact Statistics -->
    <section
      ref="statisticsRef"
      class="py-20 bg-gradient-to-r from-blue-50 to-pink-50"
    >
      <div class="container mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">
            {{ content.impact.title }}
          </h2>
          <p class="text-lg text-gray-600">{{ content.impact.description }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
          <div
            v-for="stat in content.impact.stats"
            :key="stat.key"
            class="group"
          >
            <div
              :class="[
                'text-5xl font-bold mb-2 group-hover:scale-110 transition-transform duration-300',
                counters[stat.key].color,
              ]"
            >
              {{
                formatNumber(
                  counters[stat.key].current,
                  counters[stat.key].target,
                  counters[stat.key].suffix
                )
              }}
            </div>
            <p class="text-gray-700 font-medium">{{ stat.text }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Mission Cards -->
    <section class="py-20">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-gray-900 mb-4">
            {{ content.mission.title }}
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            {{ content.mission.description }}
          </p>
        </div>
        <div class="max-w-7xl mx-auto">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div
              v-for="card in content.mission.cards"
              :key="card.title"
              class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500"
            >
              <div class="aspect-[4/3] overflow-hidden">
                <img
                  :src="card.image"
                  :alt="card.alt"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                />
              </div>
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"
              ></div>
              <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                <h3
                  :class="[
                    'font-bold mb-3',
                    card.titleClass || 'text-2xl',
                  ]"
                >
                  {{ card.title }}
                </h3>
                <p v-if="card.subtitle" class="text-lg font-semibold mb-3">
                  {{ card.subtitle }}
                </p>
                <p class="text-gray-200 leading-relaxed">
                  {{ card.description }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Focus Areas -->
    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-gray-900 mb-4">
            {{ content.focus.title }}
          </h2>
          <p class="text-xl text-gray-600">{{ content.focus.description }}</p>
        </div>
        <div class="max-w-7xl mx-auto">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div
              v-for="card in content.focus.cards"
              :key="card.id"
              class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group cursor-pointer"
              @click="openModal(card)"
            >
              <div class="aspect-[4/3] overflow-hidden">
                <img
                  :src="card.image"
                  :alt="card.title"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                />
              </div>
              <div class="p-6">
                <h3
                  class="text-xl font-bold text-blue-600 mb-3 group-hover:text-blue-700 transition-colors"
                >
                  {{ card.title }}
                </h3>
                <p class="text-gray-600 mb-4 line-clamp-3">
                  {{ card.summary }}
                </p>
                <div
                  class="flex items-center text-pink-600 font-semibold group-hover:text-pink-700 transition-colors"
                >
                  <span>Learn More</span>
                  <svg
                    class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 5l7 7-7 7"
                    ></path>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Approach -->
    <section class="py-20">
      <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
          <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
              {{ content.approach.title }}
            </h2>
            <p class="text-xl text-gray-600">{{ content.approach.description }}</p>
          </div>
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1">
              <img
                :src="content.approach.image.src"
                :alt="content.approach.image.alt"
                class="w-full h-96 object-cover rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300"
              />
            </div>
            <div class="order-1 lg:order-2">
              <div class="grid grid-cols-2 gap-3 mb-8">
                <button
                  v-for="approach in content.approach.tabs"
                  :key="approach.key"
                  @click="activeApproach = approach.key"
                  :class="[
                    'px-4 py-3 rounded-lg font-semibold transition-all duration-300 text-sm',
                    activeApproach === approach.key
                      ? 'bg-pink-600 text-white shadow-lg transform scale-105'
                      : 'bg-gray-100 text-gray-700 hover:bg-gray-200',
                  ]"
                >
                  {{ approach.title }}
                </button>
              </div>
              <div
                class="bg-white p-8 rounded-xl shadow-lg border border-gray-100"
              >
                <div
                  v-for="approach in content.approach.tabs"
                  :key="approach.key"
                  v-show="activeApproach === approach.key"
                  class="space-y-4"
                >
                  <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    {{ approach.title }}
                  </h3>
                  <div class="prose prose-gray max-w-none">
                    <p
                      v-for="paragraph in approach.content"
                      :key="paragraph"
                      class="text-gray-700 leading-relaxed"
                    >
                      {{ paragraph }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Water Initiative -->
    <section class="py-20 bg-gradient-to-br from-blue-50 via-white to-blue-50">
      <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
              <div
                class="inline-block w-16 h-1 bg-blue-500 rounded-full mb-4"
              ></div>
              <h3 class="text-4xl font-bold{Th text-blue-700 leading-tight">
                {{ content.water.title }}
              </h3>
              <p class="text-xl text-gray-700 leading-relaxed">
                {{ content.water.description }}
                <span class="font-semibold text-blue-600">{{
                  content.water.highlight
                }}</span>
              </p>
              <div
                class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-blue-500"
              >
                <div class="text-center">
                  <div class="text-4xl font-bold text-blue-600 mb-2">
                    {{ content.water.stat.value }}
                  </div>
                  <p class="text-gray-800 font-medium">
                    {{ content.water.stat.text }}
                  </p>
                </div>
              </div>
            </div>
            <div>
              <img
                :src="content.water.image.src"
                :alt="content.water.image.alt"
                class="w-full h-96 object-cover rounded-2xl shadow-xl hover:shadow-2xl transition-shadow duration-300"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="relative py-20 overflow-hidden">
      <div class="absolute inset-0">
        <img
          :src="content.cta.image.src"
          :alt="content.cta.image.alt"
          class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-black/60"></div>
      </div>
      <div class="relative z-10 container mx-auto px-6 text-center">
        <div class="max-w-4xl mx-auto">
          <div class="mb-8">
            <svg
              class="h-16 w-16 mx-auto mb-6 text-white"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M13 10V3L4 14h7v7l9-11h-7z"
              ></path>
            </svg>
          </div>
          <blockquote
            class="text-2xl lg:text-3xl font-medium text-white leading-relaxed mb-8"
          >
            {{ content.cta.quote }}
          </blockquote>
          <button
            class="px-10 py-4 bg-white text-pink-600 font-bold rounded-full hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105 shadow-lg"
          >
            {{ content.cta.button }}
          </button>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div
      v-if="selectedCard"
      class="fixed inset-0 bg-black/75 flex items-center justify-center z-50 p-4"
      @click="closeModal"
    >
      <div
        class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto"
        @click.stop
      >
        <div class="relative">
          <img
            :src="selectedCard.image"
            :alt="selectedCard.title"
            class="w-full h-65 object-cover rounded-t-2xl"
          />
          <button
            @click="closeModal"
            class="absolute top-4 right-4 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center text-gray-600 hover:text-gray-900 transition-colors"
          >
            <svg
              class="w-6 h-6"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              ></path>
            </svg>
          </button>
        </div>
        <div class="p-8">
          <h2 class="text-3xl font-bold text-pink-600 mb-6">
            {{ selectedCard.title }}
          </h2>
          <div class="prose prose-gray max-w-none">
            <p class="text-gray-700 leading-relaxed whitespace-pre-line">
              {{ selectedCard.content }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import { getPageContentById } from "@/api/pagecontent";

const route = useRoute();
const router = useRouter();
const pageContent = ref(null);
const currentSlide = ref(0);
const slideInterval = ref(null);
const selectedCard = ref(null);
const activeApproach = ref("culturally-sensitive");
const statisticsRef = ref(null);
const hasAnimated = ref(false);

// Centralized content object
const content = {
  hero: {
    title: "Empowering",
    subtitle: "Cambodia's",
    titleSuffix: "Girls",
    description:
      "In rural Cambodia, education transforms lives. When you empower a Cambodian girl, you transform an entire community.",
    images: [
      {
        src: "https://business-cambodia.com/cms/assets/2f22a1db-85ee-42e9-8a8c-a0a134e1a82c",
        alt: "Cambodian Community Group",
      },
      {
        src: "https://lotusoutreach.org/wp-content/uploads/2018/12/Girls-Access-to-Education-1.jpg",
        alt: "Cambodian Girls in Education",
      },
      {
        src: "https://media.licdn.com/dms/image/v2/C561BAQHovERV7NaR7g/company-background_10000/company-background_10000/0/1615466141859/lotusoutreachinternational_cover?e=2147483647&v=beta&t=E2rwHcaKf0iDwP57SpCCBdOm12F61_c_-Pd5g8VQ8kg",
        alt: "Cambodian Children and Families",
      },
    ],
    buttons: [
      {
        text: "Support Cambodia",
        path: "/donate",
        class:
          "px-8 py-4 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg",
      },
      {
        text: "Learn About Our Work",
        path: "/cambodia",
        class:
          "px-8 py-4 border-2 border-white text-white hover:bg-white hover:text-gray-900 font-semibold rounded-full transition-all duration-300",
      },
    ],
  },
  impact: {
    title: "Our Impact in Cambodia",
    description: "Transforming lives across rural Cambodian communities",
    stats: [
      {
        key: "children",
        text: "Cambodian children supported through education",
      },
      {
        key: "villagers",
        text: "Rural families with access to clean water",
      },
      {
        key: "years",
        text: "Years serving Cambodia's communities",
      },
    ],
  },
  mission: {
    title: "Transforming Cambodia",
    description:
      "We work in the most remote provinces of Cambodia, providing education, healthcare, and community development programs.",
    cards: [
      {
        title: "Education Opens Doors in Rural Cambodia",
        image: "https://www.globalgiving.org/pfil/5863/pict_large.jpg",
        alt: "Cambodian girls in education",
        description:
          "In Cambodia's remote villages, we provide scholarships, school supplies, and support systems that keep girls in school and break cycles of poverty.",
      },
      {
        title: "Building Stronger Communities",
        titleClass: "text-3xl text-blue-400",
        subtitle: "Across Cambodia's rural provinces",
        image: "https://www.globalgiving.org/learn/wp-content/uploads/2022/10/Globalteer.jpg",
        alt: "Cambodian community",
        description:
          "Our comprehensive programs address the unique challenges facing Cambodian families in Siem Reap, Battambang, and other rural areas.",
      },
    ],
  },
  focus: {
    title: "Our Programs in Cambodia",
    description: "Culturally-sensitive programs designed for Cambodian communities",
    cards: [
      {
        id: 1,
        title: "Education in Cambodia",
        image: "https://lotusoutreachaustralia.org.au/wp-content/uploads/2015/07/banner-photo-outside-house.jpg",
        summary:
          "Supporting Cambodian girls through scholarships, school supplies, and educational programs in rural provinces.",
        content:
          "Our education programs in Cambodia focus on keeping girls in school through comprehensive support including scholarships, uniforms, school supplies, and nutritional assistance. We work directly with families in rural provinces like Siem Reap and Battambang to ensure girls can complete their education despite economic challenges. Our culturally-sensitive approach respects Khmer traditions while promoting gender equality and educational advancement.",
      },
      {
        id: 2,
        title: "Healthcare Access",
        image: "https://www.globalgiving.org/pfil/69718/pict_large.jpg",
        summary:
          "Providing essential healthcare services and clean water access to remote Cambodian villages.",
        content:
          "In Cambodia's remote areas, we provide mobile health clinics, maternal health services, and health education programs. Our teams work with local health workers to deliver culturally appropriate care that respects traditional Khmer healing practices while introducing modern medical knowledge. We also focus on preventive care and health education to build stronger, healthier communities.",
      },
      {
        id: 3,
        title: "Anti-Trafficking Protection",
        image: "https://www.globalgiving.org/pfil/5863/ph_5863_18888.jpg",
        summary:
          "Protecting vulnerable Cambodian women and children from trafficking and exploitation.",
        content:
          "Cambodia faces unique challenges with human trafficking, particularly affecting young women and children. Our anti-trafficking programs include community education, economic empowerment initiatives, and collaboration with local authorities. We work to identify at-risk individuals and provide alternative opportunities through education and skills training, helping families avoid situations that make them vulnerable to trafficking.",
      },
      {
        id: 4,
        title: "Rural Development",
        image:
          "https://scontent.fpnh19-1.fna.fbcdn.net/v/t51.75761-15/505445926_18524186137029150_7471771288516002595_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=127cfc&_nc_ohc=zY-_H-isCVgQ7kNvwGOdVwd&_nc_oc=Adlgei7otIaKhrUw50m0jPSer7yDq19YiTpM1ZfGlx_PGqO5z8GceNsJZswZ38Q3oow&_nc_zt=23&_nc_ht=scontent.fpnh19-1.fna&_nc_gid=_Vzp13xqU32Kaav9TnVFXw&oh=00_AfQ0qFMwEJO5G4bx5Y5L_1oK2pU9lbRamEDygVvPdpHwHw&oe=6870F4D9",
        summary:
          "Building sustainable infrastructure and economic opportunities in Cambodia's rural communities.",
        content:
          "Our community development programs in Cambodia focus on building essential infrastructure like water wells, improving agricultural practices, and creating economic opportunities. We work with village leaders and community members to identify priorities and implement sustainable solutions that respect local customs and environmental considerations. Our approach emphasizes community ownership and long-term sustainability.",
      },
    ],
  },
  approach: {
    title: "Our Cambodia-Focused Approach",
    description: "Understanding Khmer culture and community needs",
    image: {
      src: "https://images.globalgiving.org/pfil/3885/pict_original.jpg?w=460&h=306&auto=compress,enhance&fit=crop&crop=faces,center&format=auto&dpr=2",
      alt: "Cambodian women and children",
    },
    tabs: [
      {
        key: "culturally-sensitive",
        title: "Culturally Sensitive",
        content: [
          "Our programs in Cambodia are designed with deep respect for Khmer culture, Buddhist traditions, and local customs. We work closely with village elders, monks, and community leaders to ensure our initiatives align with cultural values while promoting positive change.",
          "Understanding the importance of family honor and community harmony in Cambodian society, we approach sensitive topics like girls' education and women's empowerment with cultural sensitivity and patience, building trust over time.",
        ],
      },
      {
        key: "locally-led",
        title: "Locally Led",
        content: [
          "Our Cambodia operations are led by Cambodian staff who understand the language, culture, and specific challenges facing rural communities. This local leadership ensures our programs are relevant, effective, and sustainable.",
          "We prioritize hiring and training Cambodian team members, creating local employment while building capacity within communities. Our approach empowers Cambodians to lead their own development initiatives.",
        ],
      },
      {
        key: "community-based",
        title: "Community Based",
        content: [
          "Every program begins with extensive community consultation. We work with village committees, women's groups, and local leaders to identify priorities and design solutions that reflect community needs and values.",
          "Our community-based approach ensures that programs are owned and sustained by the communities themselves, creating lasting change that continues long after our direct involvement ends.",
        ],
      },
      {
        key: "holistic",
        title: "Holistic Approach",
        content: [
          "We recognize that challenges in rural Cambodia are interconnected. Poverty, lack of education, health issues, and limited economic opportunities all affect each other. Our programs address multiple issues simultaneously for maximum impact.",
          "By combining education support with health services, clean water access, and economic opportunities, we create comprehensive solutions that address root causes of poverty and inequality in Cambodian communities.",
        ],
      },
    ],
  },
  water: {
    title: "Clean Water for Cambodia's Villages",
    description:
      "In rural Cambodia, access to clean water transforms entire communities.",
    highlight: "Over 70% of rural Cambodian families",
    stat: {
      value: "150+",
      text: "Water wells built in Cambodian villages since 2010",
    },
    image: {
      src: "https://lotusoutreach.org/wp-content/uploads/2018/12/people_at_public_water_pump.jpg",
      alt: "Cambodian villagers at water pump",
    },
  },
  cta: {
    quote:
      "Education for Cambodia's girls is the foundation for the country's sustainable development and economic growth.",
    button: "Support Cambodia Today",
    image: {
      src: "https://images.globalgiving.org/pfil/10626/pict_original.jpg?w=460&h=306&auto=compress,enhance&fit=crop&crop=faces,center&format=auto&dpr=2",
      alt: "Cambodia background",
    },
  },
};

// Animated counters
const counters = ref({
  children: { current: 0, target: 5000, suffix: "+", color: "text-blue-600" },
  villagers: { current: 0, target: 25000, suffix: "+", color: "text-pink-600" },
  years: { current: 0, target: 25, suffix: "+", color: "text-purple-600" },
});

// Methods
const navigateTo = (path) => {
  router.push(path);
};

const startAutoSlide = () => {
  slideInterval.value = setInterval(() => {
    currentSlide.value = (currentSlide.value + 1) % content.hero.images.length;
  }, 6000);
};

const openModal = (card) => {
  selectedCard.value = card;
  document.body.style.overflow = "hidden";
};

const closeModal = () => {
  selectedCard.value = null;
  document.body.style.overflow = "";
};

const formatNumber = (num, target, suffix) => {
  if (target >= 1000) {
    return (num / 1000).toFixed(0) + "K" + suffix.replace("+", "+");
  }
  return num + suffix;
};

const animateCounter = (key, duration = 2000) => {
  const counter = counters.value[key];
  const startTime = Date.now();
  const startValue = counter.current;

  const animate = () => {
    const elapsed = Date.now() - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const easeOutQuart = 1 - Math.pow(1 - progress, 4);
    counter.current = Math.floor(
      startValue + (counter.target - startValue) * easeOutQuart
    );

    if (progress < 1) {
      requestAnimationFrame(animate);
    } else {
      counter.current = counter.target;
    }
  };

  requestAnimationFrame(animate);
};

const startCounterAnimations = () => {
  if (hasAnimated.value) return;
  hasAnimated.value = true;
  animateCounter("children", 2500);
  setTimeout(() => animateCounter("villagers", 2000), 200);
  setTimeout(() => animateCounter("years", 1500), 400);
};

const checkScrollPosition = () => {
  if (!statisticsRef.value || hasAnimated.value) return;
  const rect = statisticsRef.value.getBoundingClientRect();
  const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
  if (isVisible) startCounterAnimations();
};

// Lifecycle
onMounted(async () => {
  try {
    const data = await getPageContentById(8);
    console.log(
      "Raw API response at",
      new Date().toLocaleString("en-US", { timeZone: "Asia/Bangkok" }),
      ":",
      data
    );
    pageContent.value = {
      title: data.title || content.hero.title,
      subtitle: data.subtitle || content.hero.subtitle,
      description: data.description || content.hero.description,
    };
  } catch (err) {
    console.error(
      "API fetch error at",
      new Date().toLocaleString("en-US", { timeZone: "Asia/Bangkok" }),
      ":",
      err.response ? err.response.data : err.message
    );
  }
  startAutoSlide();
  window.addEventListener("scroll", checkScrollPosition);
  checkScrollPosition();
});

onUnmounted(() => {
  if (slideInterval.value) clearInterval(slideInterval.value);
  window.removeEventListener("scroll", checkScrollPosition);
  document.body.style.overflow = "";
});
</script>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.prose p {
  margin-bottom: 1rem;
}
</style>