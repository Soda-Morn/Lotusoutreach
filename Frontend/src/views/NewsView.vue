<template>
    <div class="">
        <div class="">
            <!-- Banner -->
            <!-- Fullscreen Banner -->
            <div class="relative  h-screen ">
                <!-- Background Image -->
                <img src="https://lotusoutreachaustralia.org.au/wp-content/uploads/2025/02/three-girls-banner-.jpg"
                    alt="Lotus Outreach News" class="absolute inset-0 w-full h-full object-cover">

                <!-- Overlay -->
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-45">
                    <div class="text-center text-white max-w-4xl px-6">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6 drop-shadow-lg">Lotus Outreach News</h1>

                        <div class="mb-8">
                            <p class="text-xl md:text-2xl leading-relaxed mb-6 max-w-3xl mx-auto drop-shadow-md">
                                Latest updates on our programs and global impact
                            </p>
                            <div class="flex flex-wrap justify-center gap-4">
                                <router-link to="/news/latest"
                                    class="px-6 py-3 bg-white text-pink-600 rounded-lg hover:bg-gray-100 font-semibold transition">
                                    Read Latest Stories
                                </router-link>
                                <router-link to="/news/archive"
                                    class="px-6 py-3 border-2 border-white text-white rounded-lg hover:bg-white hover:text-pink-600 font-semibold transition">
                                    News Archive
                                </router-link>
                            </div>
                        </div>

                        <div class="text-sm md:text-base opacity-90">
                            Stay informed about our work empowering women and girls worldwide
                        </div>
                    </div>
                </div>
            </div>


            <!-- News Grid -->
            <div class="space-y-8">
                <transition-group name="fade" tag="div" class="space-y-8 mt-20">
                    <div v-for="(article, index) in articles" :key="index"
                        class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 cursor-pointer flex flex-col md:flex-row"
                        @click="openModal(article)">
                        <!-- Article Image Placeholder -->
                        <div class="w-full md:w-48 bg-gray-200 flex-shrink-0" :style="{
                            backgroundImage: 'url(' + (article.image || 'https://via.placeholder.com/300x200?text=News+Image') + ')',
                            backgroundSize: 'cover',
                            backgroundPosition: 'center',
                        }"></div>

                        <div class="p-6 md:p-8 flex flex-col justify-between">
                            <div>
                                <!-- Article Date -->
                                <div class="flex items-center text-gray-500 mb-2 space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ article.date }}</span>
                                </div>

                                <!-- Article Title -->
                                <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ article.title }}</h2>

                                <!-- Article Excerpt -->
                                <p class="text-gray-600">{{ article.excerpt }}</p>
                            </div>

                            <button
                                class="mt-4 self-start inline-flex items-center px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition-colors"
                                @click.stop="openModal(article)">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </transition-group>

                <!-- Pagination -->
                <div class="flex justify-center mt-8 space-x-3">
                    <button
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
                        :disabled="page === 1" @click="prevPage">
                        ← Older
                    </button>
                    <span class="px-4 py-2 text-gray-700 font-semibold select-none">Page {{ page }}</span>
                    <button
                        class="px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 disabled:opacity-50 disabled:cursor-not-allowed"
                        :disabled="page === totalPages" @click="nextPage">
                        Newer →
                    </button>
                </div>
            </div>
        </div>

        <!-- Article Modal -->
        <transition name="modal-fade">
            <div v-if="selectedArticle"
                class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white rounded-lg max-w-3xl w-full mx-4 p-6 shadow-xl transform transition-transform duration-300"
                    @click.self="closeModal">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-2xl font-bold text-gray-900">{{ selectedArticle.title }}</h3>
                        <button @click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-gray-500 mb-4">{{ selectedArticle.date }}</p>
                    <div class="prose max-w-none">
                        <p class="text-gray-700 whitespace-pre-line">{{ selectedArticle.content }}</p>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button @click="closeModal"
                            class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-pink-600 text-white hover:bg-pink-700 focus:outline-none sm:text-sm">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: 'NewsView',
    data() {
        return {
            selectedArticle: null,
            page: 1,
            pageSize: 3,
            articles: [
                {
                    title: "Jharkhand Soccer (Football) Tournaments!",
                    date: "September 14, 2024",
                    excerpt: "Annual soccer tournaments empowering girls in Jharkhand through sports and community building.",
                    content: "We are so excited to share with our community about the 2024 Jharkhand Soccer (Football) Tournaments for girls', annual events hosted and organized by our partner in the state of Jharkhand, Naya Sawera Vikas Kendra (NSVK)...",
                    image: "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80",
                },
                {
                    title: "LO Loves Buddha Smiles!",
                    date: "August 10, 2024",
                    excerpt: "Celebrating 12+ years of partnership with the Guru Krupa Foundation and Buddha Smiles project.",
                    content: "We celebrate more than 12 years of Buddha Smiles and the Guru Krupa Foundation! Buddha Smiles is a project conceived of and operated by our brilliant partner...",
                    image: "https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=800&q=80",
                },
                {
                    title: "Spotlight: Jharkhand Project, India",
                    date: "May 24, 2024",
                    excerpt: "Exploring our work in Jharkhand, home to diverse tribal communities and rich natural resources.",
                    content: "Jharkhand ('The land of forest') is a state in eastern India, carved out in 2000 from what was the southern half of Bihar...",
                    image: "https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=800&q=80",
                },
                // add more articles here if needed
            ],
        };
    },
    computed: {
        paginatedArticles() {
            const start = (this.page - 1) * this.pageSize;
            return this.articles.slice(start, start + this.pageSize);
        },
        totalPages() {
            return Math.ceil(this.articles.length / this.pageSize);
        },
    },
    methods: {
        openModal(article) {
            this.selectedArticle = article;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.selectedArticle = null;
            document.body.style.overflow = '';
        },
        nextPage() {
            if (this.page < this.totalPages) this.page++;
        },
        prevPage() {
            if (this.page > 1) this.page--;
        },
    },
};
</script>

<style scoped>
.prose {
    line-height: 1.6;
}

.prose p {
    margin-bottom: 1rem;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity 0.25s ease;
}

.modal-fade-enter-from,
.modal-fade-leave-to {
    opacity: 0;
}
</style>
