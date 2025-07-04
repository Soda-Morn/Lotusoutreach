<!-- components/Card.vue -->
<template>
  <div :class="['rounded-lg shadow-lg overflow-hidden mt-8', cardClass]"> <!-- Added mt-8 for spacing -->
    <div class="p-6">
      <h3 class="text-xl font-semibold mb-4">{{ title }}</h3>
      <p class="mb-4 line-clamp-4">{{ truncatedContent }}</p>
      <button @click="openModal"
        :class="['px-4 py-2 rounded-lg font-medium hover:scale-105 transition-transform', buttonClass]">
        {{ buttonText }}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-1" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd"
            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
            clip-rule="evenodd" />
        </svg>
      </button>
    </div>

    <Modal v-if="showModal" :isOpen="showModal" :title="title" @close="closeModal">
      <div class="prose max-w-none pt-4"> <!-- Added pt-4 for spacing -->
        <h2 class="text-2xl font-bold text-blue-600 mb-4">{{ title }}</h2> <!-- Added title in content -->
        <p class="text-gray-700 mb-4">{{ content }}</p>

      </div>
    </Modal>
  </div>
</template>

<script>
import Modal from './Modal.vue';

export default {
  components: {
    Modal
  },
  props: {
    title: String,
    content: String,
    buttonText: String,
    cardClass: String,
    buttonClass: String,
    keyImpacts: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      showModal: false
    }
  },
  computed: {
    truncatedContent() {
      return this.content.length > 200
        ? this.content.substring(0, 200) + '...'
        : this.content;
    }
  },
  methods: {
    openModal() {
      this.showModal = true;
      document.body.style.overflow = 'hidden';
    },
    closeModal() {
      this.showModal = false;
      document.body.style.overflow = '';
    }
  }
}
</script>

<style>
.line-clamp-4 {
  display: -webkit-box;
  -webkit-line-clamp: 4;
  line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>