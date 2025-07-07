<template>
  <div class="bg-white">
    <!-- Hero Banner Component -->
    <div class="relative min-h-screen bg-gray-100 overflow-hidden">
      <!-- Background Image -->
      <div class="absolute inset-0 bg-black/30">
        <img src="https://lotusoutreachaustralia.org.au/wp-content/uploads/2020/03/Bondi-BH-Class-Donation-Poster.jpg"
          alt="Lotus Outreach activities" class="w-full h-full object-cover">
      </div>

      <!-- Content Overlay -->
      <div class="relative z-10 flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
            <span class="inline-block transform transition-all duration-500 hover:scale-105">
              Empowering Communities
            </span>
            <br>
            <span class="inline-block transition-all duration-300 hover:text-yellow-300">
              Through Sustainable Action
            </span>
          </h1>
          <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto">
            Join us in creating lasting change through education, sports, and community development initiatives
            worldwide.
          </p>
          <div class="flex flex-wrap justify-center gap-4">
            <button
              class="px-6 py-3 bg-white text-gray-900 font-medium rounded-full hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
              Our Programs
            </button>
            <button
              class="px-6 py-3 border-2 border-white text-white font-medium rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:-translate-y-1">
              Donate Now
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- News Feed Component -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <!-- Header with Search -->
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Latest Updates</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-6">Stay informed about our initiatives and impact stories
        </p>

        <!-- Search Bar -->
        <div class="max-w-md mx-auto relative">
          <div class="relative">
            <input v-model="searchQuery" type="text" placeholder="Search news..."
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200"
              @input="handleSearch">
            <svg class="absolute right-3 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </div>

          <!-- Category Filter -->
          <div class="flex flex-wrap justify-center gap-2 mt-4">
            <button v-for="category in categories" :key="category.value" @click="toggleCategory(category.value)"
              class="px-3 py-1 text-sm rounded-full transition-colors" :class="getCategoryButtonClass(category.value)">
              {{ category.label }}
            </button>
          </div>
        </div>
      </div>

      <!-- No Results Message -->
      <div v-if="filteredNewsItems.length === 0" class="text-center py-12">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h3 class="mt-2 text-lg font-medium text-gray-900">No news found</h3>
        <p class="mt-1 text-gray-500">Try adjusting your search or filter to find what you're looking for.</p>
        <button @click="resetFilters"
          class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
          Reset filters
        </button>
      </div>

      <!-- News Feed Grid -->
      <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- News Item Component with Image -->
        <article v-for="(item, index) in filteredNewsItems.slice(0, visibleItems)" :key="index"
          class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 h-full flex flex-col">
          <!-- Image Section -->
          <div class="h-48 overflow-hidden">
            <img :src="item.image" :alt="item.title"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
          </div>

          <div class="p-6 md:p-8 flex-grow">
            <!-- Category Badge -->
            <div class="flex items-center mb-4">
              <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full"
                :class="getCategoryBadgeClass(item.category)">
                {{ getCategoryLabel(item.category) }}
              </span>
              <span class="ml-3 text-sm text-gray-500">{{ formatDate(item.date) }}</span>
            </div>

            <!-- Title -->
            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
              {{ item.title }}
            </h3>

            <!-- Content Preview -->
            <p class="text-gray-600 mb-4 line-clamp-3">{{ item.content }}</p>

            <!-- Author -->
            <div class="mt-auto">
              <span class="text-sm font-medium text-gray-500">By {{ item.author }}</span>
            </div>
          </div>

          <!-- Read More Button -->
          <div class="px-6 pb-6 md:px-8">
            <button
              class="w-full px-4 py-2 bg-blue-50 text-blue-600 rounded-md hover:bg-blue-100 transition-colors flex items-center justify-center"
              @click="expandItem(index)">
              Read more
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </button>
          </div>
        </article>
      </div>

      <!-- Load More Button -->
      <div v-if="filteredNewsItems.length > visibleItems" class="mt-12 text-center">
        <button @click="loadMore"
          class="px-6 py-3 bg-white border border-gray-300 rounded-md text-gray-700 font-medium hover:bg-gray-50 transition-colors">
          Load More Updates
        </button>
      </div>
    </div>

    <!-- Expanded Content Modal -->
    <div v-if="expandedIndex !== null"
      class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
      @click.self="expandedIndex = null">
      <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <!-- Image in Modal -->
        <div class="h-64 overflow-hidden">
          <img :src="filteredNewsItems[expandedIndex].image" :alt="filteredNewsItems[expandedIndex].title"
            class="w-full h-full object-cover">
        </div>

        <div class="p-6">
          <div class="flex justify-between items-start mb-4">
            <div>
              <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full mb-2"
                :class="getCategoryBadgeClass(filteredNewsItems[expandedIndex].category)">
                {{ getCategoryLabel(filteredNewsItems[expandedIndex].category) }}
              </span>
              <h2 class="text-2xl font-bold text-gray-900">{{ filteredNewsItems[expandedIndex].title }}</h2>
              <p class="text-sm text-gray-500 mt-1">
                {{ formatDate(filteredNewsItems[expandedIndex].date) }} • By {{ filteredNewsItems[expandedIndex].author
                }}
              </p>
            </div>
            <button @click="expandedIndex = null" class="text-gray-400 hover:text-gray-500">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
          <div class="prose max-w-none text-gray-700">
            <p class="whitespace-pre-line">{{ filteredNewsItems[expandedIndex].content }}</p>
          </div>
          <div class="mt-6">
            <button @click="expandedIndex = null"
              class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';


const expandedIndex = ref(null);
const visibleItems = ref(6);
const searchQuery = ref('');
const activeCategories = ref([]);

const categories = [
  { value: 'sports', label: 'Sports' },
  { value: 'education', label: 'Education' },
  { value: 'event', label: 'Event' },
  { value: 'announcement', label: 'Announcement' }
];

const newsItems = [
  {
    title: "Jharkhand Soccer (Football) Tournaments!",
    content: "We are so excited to share with our community about the 2024 Jharkhand Soccer (Football) Tournaments for girls', annual events hosted and organized by our partner in the state of Jharkhand, Naya Sawera Vikas Kendra (NSVK). The annual tournaments are a part of Lotus Outreach's work in Jharkhand, implementing community projects that nurture and empower women and girls from tribal indigenous areas in the region. We'd especially like to thank our donors who give up coffee monthly through 1000 Coffee and directly support these regional soccer tournaments! The tournaments are an incredible opportunity to not only empower girls through sports and support athletic talent, but also to bring communities together for a joyous occasion that centers girls' joy and confidence. They are truly catalysts of social change.",
    date: "2024-09-14",
    author: "lotusoutreach",
    category: "sports",
    image: "https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1605&q=80"
  },
  {
    title: "LO Loves Buddha Smiles!",
    content: "We celebrate more than 12 years of Buddha Smiles and the Guru Krupa Foundation! Buddha Smiles is a project conceived of and operated by our brilliant partner, the Garden of Peace School, founded by Dr. Manivannan. It was when the founder of the Guru Krupa Foundation, Mukund Padmanabhan, connected with the Buddha Smiles project in 2012 that he became an unwavering supporter of Buddha Smiles and Lotus Outreach. Since that time, the Guru Krupa Foundation has provided generous and dedicated support for Lotus Outreach projects, including Buddha Smiles, Blossom Bus, and Lotus Pedals in India (new!). We'd like to take this opportunity to once again thank you, Guru Krupa Foundation.",
    date: "2024-08-10",
    author: "Genevieve Waltcher",
    category: "education",
    image: "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
  },
  {
    title: "Spotlight: Jharkhand Project, India",
    content: "Jharkhand ('The land of forest') is a state in eastern India, carved out in 2000 from what was the southern half of Bihar. It is the 15th largest state by area, and the 14th largest by population. The state is known for its rich deposits of minerals, forest land, various ethnic groups, waterfalls, hills, and holy places. Jharkhand is also known for its vast forest resources which sustain a tapestry of diverse communities, each with a unique cultural heritage. Among these are the 32 scheduled tribes (ST), recognized by the Indian Government as the most socio-economically disadvantaged groups in the country. 8 of the poorest tribal groups, further categorized by the Indian Government as Particularly Vulnerable Tribal Groups (PVTGs) also live here, in Jharkhand.",
    date: "2024-05-24",
    author: "lotusoutreach",
    category: "announcement",
    image: "https://images.unsplash.com/photo-1464037866556-6812c9d1c72e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
  },
  {
    title: "LO UK Hosts Online Auction!",
    content: "We are thrilled to announce that our LO United Kingdom affiliate is hosting an online auction live from April 17th through May 1, 2024. The auction items available include luxury getaways, celebrated artwork, concert tickets, an internship, couture fashion, and much more. Join us in our efforts to make a tangible difference in the lives of those in need by bidding freely and generously to support the girls, women, and families supported by LO education, training, and care projects. *Note: successful bidders are responsible for all shipping and collection charges (where relevant).",
    date: "2024-04-17",
    author: "lotusoutreach",
    category: "event",
    image: "https://images.unsplash.com/photo-1531058020387-3be344556be6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
  },
  {
    title: "Happy 2024! Giving Back Project with CATALYST Scholars",
    content: "Happy 2024! We're delighted to share with you about our recent fifth Giving Back Project, hosted by Lotus Outreach Cambodia. In an effort to express their gratitude for the scholarship support our CATALYST university scholars receive, every year they raise funds themselves to help schools and students in remote areas, such as Mondolkiri, Siem Reap, Pallin, and Takeo. For example, the students we support provide study materials, teach sanitation, color pictures, build water tanks, and lead students in play based learning activities and games to give back to others and realize their own abundant abilities to help create goodness in others lives and the world.",
    date: "2024-02-08",
    author: "lotusoutreach",
    category: "education",
    image: "https://images.unsplash.com/photo-1524179091875-bf99a9a6af57?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
  },
  {
    title: "Guru Krupa Foundation and Lotus Outreach",
    content: "We are deeply grateful for our long-term foundation partners, such as the Guru Krupa Foundation who has assisted LO in our work ensuring access to education to girls, young women, and children for more than 10 years. We are touched to share with you about this partnership and Guru Krupa's profound generosity and dedication to both our Blossom Bus and Buddha Smiles programs in India.",
    date: "2023-11-19",
    author: "lotusoutreach",
    category: "announcement",
    image: "https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80"
  },
];

const filteredNewsItems = computed(() => {
  const query = searchQuery.value.toLowerCase().trim();
  const hasSearchQuery = query !== '';
  const hasActiveCategories = activeCategories.value.length > 0;

  return newsItems.filter(item => {
    // Check category filter first (if any categories are selected)
    const matchesCategory = !hasActiveCategories ||
      activeCategories.value.includes(item.category);

    // Check search query (if any)
    let matchesSearch = false;
    if (hasSearchQuery) {
      // Check if query exactly matches a category name
      const matchedCategory = categories.find(cat =>
        cat.label.toLowerCase() === query
      );

      if (matchedCategory) {
        // If searching for a category, only match items of that exact category
        matchesSearch = item.category === matchedCategory.value;
      } else {
        // For non-category searches, search in title, content, and author
        matchesSearch =
          item.title.toLowerCase().includes(query) ||
          item.content.toLowerCase().includes(query) ||
          item.author.toLowerCase().includes(query);
      }
    } else {
      matchesSearch = true;
    }

    return matchesCategory && matchesSearch;
  }).sort((a, b) => new Date(b.date) - new Date(a.date)); // Sort by date
});

// The rest of your methods remain exactly the same
const getCategoryButtonClass = (category) => {
  return {
    'bg-blue-100 text-blue-800': category === 'sports' && activeCategories.value.includes('sports'),
    'bg-green-100 text-green-800': category === 'education' && activeCategories.value.includes('education'),
    'bg-purple-100 text-purple-800': category === 'event' && activeCategories.value.includes('event'),
    'bg-orange-100 text-orange-800': category === 'announcement' && activeCategories.value.includes('announcement'),
    'bg-gray-100 text-gray-800': !activeCategories.value.includes(category)
  };
};

const getCategoryBadgeClass = (category) => {
  return {
    'bg-blue-100 text-blue-800': category === 'sports',
    'bg-green-100 text-green-800': category === 'education',
    'bg-purple-100 text-purple-800': category === 'event',
    'bg-orange-100 text-orange-800': category === 'announcement'
  };
};

const expandItem = (index) => {
  expandedIndex.value = index;
  document.body.style = 'hidden';
};

const loadMore = () => {
  visibleItems.value += 3;
};

const handleSearch = () => {
  visibleItems.value = 6;
};

const toggleCategory = (category) => {
  const index = activeCategories.value.indexOf(category);
  if (index === -1) {
    activeCategories.value.push(category);
  } else {
    activeCategories.value.splice(index, 1);
  }
  visibleItems.value = 6;
};

const resetFilters = () => {
  searchQuery.value = '';
  activeCategories.value = [];
  visibleItems.value = 6;
};

const formatDate = (dateString) => {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(dateString).toLocaleDateString('en-US', options);
};

const getCategoryLabel = (category) => {
  const labels = {
    sports: 'Sports',
    education: 'Education',
    event: 'Event',
    announcement: 'Announcement'
  };
  return labels[category] || 'News';
};
</script>
<style>
/* Custom styles */
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.prose {
  line-height: 1.75;
}

.prose p {
  margin-bottom: 1.25em;
}

/* Image styles */
.h-48 {
  height: 12rem;
}

.h-64 {
  height: 16rem;
}

.object-cover {
  object-fit: cover;
}

/* Transition effects */
.transition-all {
  transition-property: all;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}
</style>
