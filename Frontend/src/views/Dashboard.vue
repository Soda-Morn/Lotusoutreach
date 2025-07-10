<template>
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col transition-all duration-300">
      <div class="p-6 border-b border-gray-700">
        <h2
          class="text-2xl font-extrabold bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 bg-clip-text text-transparent animate-pulse-slow">
          Mimity Admin
        </h2>
      </div>
      <nav class="flex-1 mt-6 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-800">
        <ul>
          <li v-for="item in menuItems" :key="item.label">
            <button @click="selectedPage = item.page"
              :class="{ 'bg-gray-700 text-white font-semibold': selectedPage === item.page }"
              class="group flex items-center py-2.5 px-6 text-gray-200 hover:bg-gray-700/50 rounded-xl transition-all duration-300 ease-out transform hover:scale-[1.02] w-full text-left">
              <span class="mr-4 text-xl">{{ item.icon }}</span>
              <span class="flex-1 font-medium">{{ item.label }}</span>
              <span v-if="item.new"
                class="bg-blue-600/80 text-xs px-2.5 py-1 rounded-full group-hover:bg-blue-500 transition duration-300">New</span>
            </button>
          </li>
        </ul>
      </nav>
      <div class="p-4 border-t border-gray-700">
        <button @click="selectedPage = 'Settings'"
          :class="{ 'bg-gray-700 text-white font-semibold': selectedPage === 'Settings' }"
          class="flex items-center py-2.5 px-6 text-gray-200 hover:bg-gray-700/50 rounded-xl transition-all duration-300 ease-out transform hover:scale-[1.02] w-full text-left">
          <span class="mr-4 text-xl">⚙️</span>
          <span class="font-medium">Settings</span>
        </button>
      </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Navbar -->
      <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between shadow-lg">
        <div class="flex items-center space-x-4">
          <button class="text-gray-300 hover:text-white transition duration-200">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
          </button>
          <div class="relative">
            <input type="text" placeholder="Search..."
              class="bg-gray-700 text-white p-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 pl-10 w-64 transition-all duration-200" />
            <span class="absolute left-3 top-2.5 text-gray-400">🔍</span>
          </div>
        </div>
        <div class="flex items-center space-x-6">
          <button class="relative text-gray-300 hover:text-white transition duration-200">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
              </path>
            </svg>
            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
          </button>
          <button class="text-gray-300 hover:text-white transition duration-200">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
              </path>
            </svg>
          </button>
          <div class="relative group">
            <div


              class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-700 rounded-full flex items-center justify-center text-white font-semibold shadow-md hover:shadow-lg transition duration-200">
              JD
            </div>
            <div
              class="absolute right-0 mt-2 w-48 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-2 hidden group-hover:block">
              <p class="text-sm">John Doe</p>
              <a href="#" class="text-blue-400 hover:text-blue-300 block mt-1">Logout</a>
            </div>
            <span class="absolute bottom-0 right-0 h-3 w-3 bg-green-500 rounded-full border-2 border-gray-900"></span>
          </div>
        </div>
      </div>

      <!-- CONTENT AREA -->
      <div class="flex-1 bg-gray-100 p-6 overflow-y-auto">
        <!-- Dashboard -->
        <div v-if="selectedPage === 'Dashboard'" class="space-y-10">
          <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Factory Dashboard</h1>
            <select
              class="bg-white p-2 rounded-lg border border-gray-300 text-sm shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option>Select period</option>
              <option>Last 7 Days</option>
              <option>Last 30 Days</option>
              <option>This Month</option>
            </select>
          </div>
          <p class="text-sm text-gray-500">
            * Dashboard for factory performance metrics and analytics
          </p>

          <!-- Stats -->
          <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-5 rounded-xl shadow-lg hover:shadow-xl border-l-4 border-green-500">
              <p class="text-gray-600 text-sm font-medium">Production Units</p>
              <div class="flex items-baseline justify-between mt-2">
                <p class="text-2xl font-bold text-gray-900">2,340</p>
                <span class="text-green-500 text-sm font-semibold">↑ 12%</span>
              </div>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-lg hover:shadow-xl border-l-4 border-red-500">
              <p class="text-gray-600 text-sm font-medium">Total Costs</p>
              <div class="flex items-baseline justify-between mt-2">
                <p class="text-2xl font-bold text-red-600">$71K</p>
                <span class="text-red-500 text-sm font-semibold">▼ 6%</span>
              </div>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-lg hover:shadow-xl border-l-4 border-blue-500">
              <p class="text-gray-600 text-sm font-medium">Factory Value</p>
              <p class="text-2xl font-bold text-gray-900 mt-2">$14.5M</p>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-lg hover:shadow-xl border-l-4 border-green-500">
              <p class="text-gray-600 text-sm font-medium">New Workers</p>
              <div class="flex items-baseline justify-between mt-2">
                <p class="text-2xl font-bold text-green-600">34</p>
                <span class="text-green-500 text-sm font-semibold">+ 4 hires</span>
              </div>
            </div>
          </div>

          <!-- Charts -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Bar Chart -->
            <div class="bg-white p-4 rounded-xl shadow h-[250px]">
              <Bar :data="productionData" :options="productionOptions" :height="200" :width="400" />
            </div>

            <!-- Pie Chart -->
            <div class="bg-white p-4 rounded-xl shadow h-[250px]">
              <Pie :data="revenueData" :options="revenueOptions" />
            </div>
          </div>
        </div>


        <!-- WhyGril Page -->
        <div v-else-if="selectedPage === 'WhyGril'" class="space-y-6">
          <h1 class="text-3xl font-bold text-gray-800 mb-4"></h1>
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800"></h2>
            <button @click="showForm = true"
              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
              ➕ Create
            </button>
            <div v-if="showForm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
              <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-xl">
                <h3 class="text-xl font-semibold mb-4">Create New Entry</h3>

                <form @submit.prevent="createEntry">
                  <div class="flex justify-end gap-2">
                    <button type="button" @click="showForm = false"
                      class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                    <button type="submit"
                      class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Create</button>
                  </div>
                </form>
              </div>
            </div>


          </div>
          <div class="overflow-x-auto">
          <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden text-sm">
  <thead class="bg-gray-300 text-gray-900 text-xs uppercase font-semibold">
    <tr>
      <th class="px-2 py-4 text-left">Page</th>
      <th class="px-2 py-1 text-left">Title</th>
      <th class="px-2 py-1 text-left">Content</th>
      <th class="px-2 py-1 text-left">Image</th>
      <th class="px-2 py-1 text-left">Content ID</th>
      <th class="px-2 py-1 text-left">Actions</th>
    </tr>
  </thead>
  <tbody class="divide-y divide-gray-200 text-gray-700">
    <tr v-for="item in whygrilData" :key="item.id" class="hover:bg-gray-50">
      <td class="px-2 py-1">{{ item.page }}</td>
      <td class="px-2 py-1 truncate">{{ item.title }}</td>
      <td class="px-2 py-1 truncate max-w-[180px]">{{ item.content }}</td>
      <td class="px-2 py-1">
        <img :src="item.image" class="h-8 w-8 object-cover rounded-full border border-gray-300" />
      </td>
      <td class="px-2 py-1">{{ item.page_content_id }}</td>
      <td class="px-2 py-1 flex gap-2">
        <button
          @click="openForm(item)"
          class="text-blue-600 hover:text-blue-800 transition"
          title="Edit"
        >
          ✏️
        </button>
        <button
          @click="deleteItem(item.id)"
          class="text-red-600 hover:text-red-800 transition"
          title="Delete"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 001-1V5a1 1 0 00-1-1h-3.5l-1-1h-3l-1 1H7a1 1 0 00-1 1v1a1 1 0 001 1h10z"
            />
          </svg>
        </button>
      </td>
    </tr>
  </tbody>
</table>
<div v-if="showForm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-xl">
    <h3 class="text-xl font-semibold mb-4">{{ isEditing ? 'Edit Entry' : 'Create New Entry' }}</h3>


    <form @submit.prevent="createOrUpdateEntry">
      <input v-model="newItem.page" placeholder="Page" class="w-full border p-2 mb-3 rounded" required />
      <input v-model="newItem.title" placeholder="Title" class="w-full border p-2 mb-3 rounded" required />
      <textarea v-model="newItem.content" placeholder="Content" class="w-full border p-2 mb-3 rounded" required></textarea>
      <input v-model="newItem.page_content_id " placeholder="page_contenta-id" class="w-full border p-2 mb-3 rounded" required />
    <input type="file" @change="handleImageUpload" accept="image/*" class="w-full border px-3 py-2 rounded" required />
<img v-if="newItem.image" :src="newItem.image" alt="Preview" class="h-20 mt-2 rounded" />


      <div class="flex justify-end gap-2">
        <button type="button" @click="showForm = false" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
          {{ isEditing ? 'Update' : 'Create' }}
        </button>
      </div>
    </form>
  </div>
</div>


          </div>
        </div>

        <!-- Default fallback -->
        <div v-else>
          <h1 class="text-3xl font-bold text-gray-800">
            Welcome to {{ selectedPage }}
          </h1>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
//import { ref, onMounted, watch } from 'vue'
import { Bar, Pie } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  ArcElement,
  CategoryScale,
  LinearScale
} from 'chart.js'


ChartJS.register(Title, Tooltip, Legend, BarElement, ArcElement, CategoryScale, LinearScale)
// import { ref, watch } from 'vue'

const selectedPage = ref(localStorage.getItem('selectedPage') || 'Dashboard')

watch(selectedPage, (newPage) => {
  localStorage.setItem('selectedPage', newPage)
})


const menuItems = [
  { label: 'Dashboard', icon: '🏠', page: 'Dashboard', new: true },
  { label: 'WhyGril', icon: '🛒', page: 'WhyGril' },
  { label: 'AboutContent', icon: '📊', page: 'AboutContent' },
  { label: 'Program', icon: '👥', page: 'Program' },
  { label: 'News', icon: '📅', page: 'News' },
  { label: 'Cambodia', icon: '🌏', page: 'Cambodia' },
  { label: 'PageContent', icon: '📄', page: 'PageContent' },
  { label: 'ProgramDetail', icon: '📝', page: 'ProgramDetail' },
  { label: 'Partner', icon: '🤝', page: 'Partner' },
  { label: 'Donate', icon: '💰', page: 'Donate' }
]

const productionData = {
  labels: ['Jul 01', 'Jul 03', 'Jul 05', 'Jul 07', 'Jul 08'],
  datasets: [{
    label: 'Units Produced',
    data: [1200, 1500, 900, 1800, 1400],
    backgroundColor: '#3B82F6',
    borderRadius: 5
  }]
}


const productionOptions = {
  responsive: true,
  plugins: { legend: { display: false } },
  scales: { y: { beginAtZero: true } }
}

const revenueData = {
  labels: ['Chrome', 'Firefox', 'Safari'],
  datasets: [{
    label: 'Browser Usage',
    data: [55, 25, 20],
    backgroundColor: ['#3B82F6', '#F59E0B', '#10B981']
  }]
}

const revenueOptions = {
  responsive: true,
  plugins: { legend: { display: true } }
}

const whygrilData = ref([
  {
    id: 1,
    page: 'WhyGril',
    title: 'Support Girls Education',
    content: 'Education empowers girls and transforms communities.',
    image: 'https://via.placeholder.com/100',
    page_content_id: 101
  },
  {
    id: 2,
    page: 'WhyGril',
    title: 'End Child Marriage',
    content: 'Providing education helps delay early marriage.',
    image: 'https://via.placeholder.com/100',
    page_content_id: 102
  }
])

const showForm = ref(false)

const newItem = ref({
  page: '',
  title: '',
  content: '',
  image: '', // This will store base64 data
  page_content_id: ''
})

// Handle image upload
function handleImageUpload(event) {
  const file = event.target.files[0]
  if (file) {
    const reader = new FileReader()
    reader.onload = () => {
      newItem.value.image = reader.result
    }
    reader.readAsDataURL(file)
  }
}


function createEntry() {
  const id = Date.now()
  whygrilData.value.push({ id, ...newItem.value })
  newItem.value = { page: '', title: '', content: '', image: '', page_content_id: '' }
  showForm.value = false
}

import { ref, onMounted, watch } from 'vue'

const LOCAL_KEY = 'whygrilData'

// const showForm = ref(false)
const isEditing = ref(false)
const editId = ref(null)



// Load from localStorage
onMounted(() => {
  const stored = localStorage.getItem(LOCAL_KEY)
  if (stored) {
    whygrilData.value = JSON.parse(stored)
  }
})

// Save to localStorage whenever data changes
watch(whygrilData, (val) => {
  localStorage.setItem(LOCAL_KEY, JSON.stringify(val))
}, { deep: true })

function openForm(item = null) {
  if (item) {
    isEditing.value = true
    editId.value = item.id
    newItem.value = { ...item }
  } else {
    isEditing.value = false
    newItem.value = {
      page: '',
      title: '',
      content: '',
      image: '',
      page_content_id: ''
    }
  }
  showForm.value = true
}

function createOrUpdateEntry() {
  if (isEditing.value) {
    // Update
    const index = whygrilData.value.findIndex(i => i.id === editId.value)
    if (index !== -1) {
      whygrilData.value[index] = { id: editId.value, ...newItem.value }
    }
  } else {
    // Create
    const id = Date.now()
    whygrilData.value.push({ id, ...newItem.value })
  }

  showForm.value = false
  resetForm()
}

function deleteItem(id) {
  if (confirm("Are you sure to delete this item?")) {
    whygrilData.value = whygrilData.value.filter(i => i.id !== id)
  }
}

function resetForm() {
  newItem.value = {
    page: '',
    title: '',
    content: '',
    image: '',
    page_content_id: ''
  }
  isEditing.value = false
  editId.value = null
}

</script>

<style>
@keyframes pulse-slow {

  0%,
  100% {
    opacity: 1;
  }

  50% {
    opacity: 0.8;
  }
}

.animate-pulse-slow {
  animation: pulse-slow 3s infinite;
}

.scrollbar-thin {
  scrollbar-width: thin;
}

.scrollbar-thumb-gray-600 {
  scrollbar-color: #4b5563 #1f2937;
}

.scrollbar-track-gray-800 {
  background: #1f2937;
}
</style>
