<template>
  <div :class="['rounded-lg shadow-md p-4 text-center', cardClass]">
    <img v-if="image" :src="image" :alt="title" class="w-full h-48 object-cover rounded-t-lg">
    <h3 class="text-xl font-semibold mt-2">{{ title }}</h3>
    <p class="mt-2 text-white" v-if="!showMore">{{ content.substring(0, 100) + '...' }}</p> <!-- Show truncated content by default -->
    <p class="mt-2 text-white" v-if="showMore">{{ content }}</p> <!-- Show full content when expanded -->
  <button
  v-if="buttonText"
  @click="toggleShowMore"
  :class="[
    'mt-4 px-4 py-2 rounded-lg bg-white text-black hover:bg-blue-100 border border-blue-700 transition',
    buttonClass
  ]"
>
  {{ showMore ? 'Show less' : 'Learn more' }}
</button>
  </div>
</template>

<script>
export default {
  name: 'Card',
  props: {
    title: String,
    content: String,
    image: String,
    buttonText: String,
    onClick: Function,
    cardClass: {
      type: String,
      default: 'bg-white text-gray-700'
    },
    buttonClass: {
      type: String,
      default: 'bg-blue-500 text-white'
    }
  },
  data() {
    return {
      showMore: false
    }
  },
  methods: {
    toggleShowMore() {
      this.showMore = !this.showMore
    }
  }
}
</script>