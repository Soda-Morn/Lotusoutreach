<template>
  <div class="min-h-screen bg-gradient-to-br from-pink-50 to-white flex flex-col overflow-hidden">
   <!-- Header Section -->
<header class="relative w-full flex-shrink-0 overflow-hidden">

  <img src="@/img/cam1.png" alt="Cambodia program 1"
       class="w-full h-[28rem] object-cover md:h-[36rem] lg:h-[36rem] xl:h-[36rem] 2xl:h-[40rem] ">

 
  <div class="absolute inset-0 bg-black/30 backdrop-brightness-75 flex items-center justify-center">
    <div class="text-center text-white px-4 animate-fade-in">
      <h1 class="text-4xl font-extrabold md:text-8xl lg:text-9xl xl:text-[5rem] drop-shadow-lg">
        DONATE
      </h1>
      <div class="mt-6">
        <h3 class="text-4xl font-semibold md:text-5xl">Your Generosity Changes Lives</h3>
        <p class="text-pink-100 text-lg mt-3 md:text-xl">
          Every contribution directly supports our mission to create positive change.
        </p>
      </div>
 
    </div>
  </div>
</header>



    <!-- Impact Section -->
    <section class="container mx-auto px-4 py-10 max-w-7xl">
      <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Our Impact Together</h2>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div v-for="stat in stats" :key="stat.label" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 text-center">
          <p class="text-3xl font-bold text-pink-600">{{ stat.value }}</p>
          <p class="text-gray-600 mt-2">{{ stat.label }}</p>
        </div>
      </div>
    </section>

 

    <!-- Donation Form Section -->
    <section class="container mx-auto px-4 py-10 max-w-7xl">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        

        <!-- Donation Form -->
        <div class="lg:col-span-3">
          <form @submit.prevent="handleSubmit" class="bg-white rounded-xl shadow-2xl border border-pink-100 p-6">
            <div class="bg-gradient-to-r from-pink-600 to-pink-500 px-6 py-4 rounded-t-xl">
              <h2 class="text-xl font-semibold text-white flex items-center">
                <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Donation Details
              </h2>
            </div>
            <div class="p-6 space-y-6">
              <div>
                <label for="amount" class="block text-gray-700 text-sm font-medium mb-2 flex items-center">
                  <svg class="h-5 w-5 mr-2 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Donation Amount (USD)*
                </label>
                <div class="flex flex-wrap gap-3 mb-4">
                  <button type="button" @click="setAmount('50')" class="px-4 py-2 bg-pink-100 text-pink-700 rounded-lg hover:bg-pink-200 transition-all duration-200"> $50 </button>
                  <button type="button" @click="setAmount('100')" class="px-4 py-2 bg-pink-100 text-pink-700 rounded-lg hover:bg-pink-200 transition-all duration-200"> $100 </button>
                  <button type="button" @click="setAmount('250')" class="px-4 py-2 bg-pink-100 text-pink-700 rounded-lg hover:bg-pink-200 transition-all duration-200"> $250 </button>
                </div>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 mb-4 ml-4">$</span>
                  </div>
                  <input
                    v-model.number="form.amount"
                    class="w-full pl-10 p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                    :class="{ 'border-red-500': errors.amount }"
                    type="number"
                    id="amount"
                    min="1"
                    required
                    placeholder="0.00"
                    aria-describedby="amount-error"
                  />
                  <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-pink-600 h-2 rounded-full transition-all duration-300" :style="{ width: progress + '%' }"></div>
                  </div>
                  <p v-if="errors.amount" id="amount-error" class="text-red-500 text-xs mt-1">{{ errors.amount }}</p>
                </div>
              </div>
              <div>
                <label for="anonymous" class="block text-gray-700 text-sm font-medium mb-2 flex items-center">
                  <svg class="h-5 w-5 mr-2 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                  </svg>
                  Make this donation anonymous?
                </label>
                <select
                  v-model="form.anonymous"
                  class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                  id="anonymous"
                  aria-label="Select anonymity preference"
                >
                  <option value="no">No, display my name</option>
                  <option value="yes">Yes, make it anonymous</option>
                </select>
              </div>
              <div>
                <label class="block text-gray-700 text-sm font-medium mb-2 flex items-center">
                  <svg class="h-5 w-5 mr-2 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                  </svg>
                  Donation Type
                </label>
                <div class="flex flex-wrap items-center gap-4">
                  <label class="inline-flex items-center">
                    <input v-model="form.donationType" type="radio" value="one-time" class="h-5 w-5 text-pink-600 focus:ring-pink-500" />
                    <span class="ml-2 text-gray-700">One-Time Donation</span>
                  </label>
                  <label class="inline-flex items-center">
                    <input v-model="form.donationType" type="radio" value="recurring" class="h-5 w-5 text-pink-600 focus:ring-pink-500" />
                    <span class="ml-2 text-gray-700">Recurring Donation</span>
                  </label>
                  <select
                    v-if="form.donationType === 'recurring'"
                    v-model="form.frequency"
                    class="p-2 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                    aria-label="Select donation frequency"
                  >
                    <option value="monthly">Monthly</option>
                    <option value="weekly">Weekly</option>
                    <option value="annually">Annually</option>
                    <option value="every-6-months">Every 6 Months</option>
                  </select>
                </div>
              </div>
              <div class="p-4 bg-pink-50 rounded-lg border border-pink-100">
                <h3 class="text-lg font-semibold text-pink-800 mb-4 flex items-center">
                  <svg class="h-5 w-5 mr-2 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  Your Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label for="first-name" class="block text-gray-700 text-sm font-medium mb-2">First Name*</label>
                    <input
                      v-model.trim="form.firstName"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                      :class="{ 'border-red-500': errors.firstName }"
                      type="text"
                      id="first-name"
                      required
                      aria-describedby="first-name-error"
                    />
                    <p v-if="errors.firstName" id="first-name-error" class="text-red-500 text-xs mt-1">{{ errors.firstName }}</p>
                  </div>
                  <div>
                    <label for="last-name" class="block text-gray-700 text-sm font-medium mb-2">Last Name*</label>
                    <input
                      v-model.trim="form.lastName"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                      :class="{ 'border-red-500': errors.lastName }"
                      type="text"
                      id="last-name"
                      required
                      aria-describedby="last-name-error"
                    />
                    <p v-if="errors.lastName" id="last-name-error" class="text-red-500 text-xs mt-1">{{ errors.lastName }}</p>
                  </div>
                  <div>
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email*</label>
                    <input
                      v-model="form.email"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                      :class="{ 'border-red-500': errors.email }"
                      type="email"
                      id="email"
                      required
                      aria-describedby="email-error"
                    />
                    <p v-if="errors.email" id="email-error" class="text-red-500 text-xs mt-1">{{ errors.email }}</p>
                  </div>
                  <div>
                    <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Phone</label>
                    <input
                      v-model="form.phone"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                      type="tel"
                      id="phone"
                    />
                  </div>
                  <div class="md:col-span-2">
                    <label for="address" class="block text-gray-700 text-sm font-medium mb-2">Address</label>
                    <input
                      v-model="form.address"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                      type="text"
                      id="address"
                    />
                  </div>
                  <div>
                    <label for="city" class="block text-gray-700 text-sm font-medium mb-2">City</label>
                    <input
                      v-model="form.city"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                      type="text"
                      id="city"
                    />
                  </div>
                  <div>
                    <label for="state" class="block text-gray-700 text-sm font-medium mb-2">State (Province)</label>
                    <input
                      v-model="form.state"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                      type="text"
                      id="state"
                    />
                  </div>
                  <div>
                    <label for="zip" class="block text-gray-700 text-sm font-medium mb-2">Zip Code</label>
                    <input
                      v-model="form.zip"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                      type="text"
                      id="zip"
                    />
                  </div>
                  <div>
                    <label for="country" class="block text-gray-700 text-sm font-medium mb-2">Country*</label>
                    <select
                      v-model="form.country"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                      :class="{ 'border-red-500': errors.country }"
                      id="country"
                      required
                      aria-describedby="country-error"
                    >
                      <option value="">Select Country</option>
                      <option v-for="country in countries" :key="country" :value="country">{{ country }}</option>
                    </select>
                    <p v-if="errors.country" id="country-error" class="text-red-500 text-xs mt-1">{{ errors.country }}</p>
                  </div>
                </div>
              </div>
              <div>
                <label for="comment" class="block text-gray-700 text-sm font-medium mb-2 flex items-center">
                  <svg class="h-5 w-5 mr-2 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                  </svg>
                  Comment (Optional)
                </label>
                <textarea
                  v-model="form.comment"
                  class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                  id="comment"
                  rows="4"
                  placeholder="Any special instructions or notes..."
                ></textarea>
              </div>
              <button
                type="submit"
                :disabled="Object.keys(errors).length > 0"
                class="w-full bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-700 hover:to-pink-800 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all duration-300 flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed"
              >
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                Continue to Payment
              </button>
            </div>
          </form>
        </div>
      </div>


      
    </section>



 

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-pink-100 to-white py-6 text-center text-gray-700">
      <p class="flex items-center justify-center">
        <svg class="h-5 w-5 mr-2 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4.889a1.591 1.591 0 00-2.464 0L5.732 13c-.77 1.333-.808 3-1.732 3z" />
        </svg>
        Thank you for your generous support! © {{ new Date().getFullYear() }}
      </p>
    </footer>
  </div>

 
  
</template>

<script setup>
import { reactive, computed, ref } from 'vue';
// Import image using Vite-compatible syntax



// Form state
const form = reactive({
  amount: '',
  anonymous: 'no',
  donationType: 'one-time',
  frequency: 'monthly',
  firstName: '',
  lastName: '',
  email: '',
  phone: '',
  address: '',
  city: '',
  state: '',
  zip: '',
  country: '',
  comment: ''
});

// Reactive data

const actionCards = ref([
  {
    icon: 'M12 6v6m0 0v6m0-6h6m-6 0H6',
    title: 'People Helped',
    description: '1,200+ individuals supported.',
    // actionText: 'Learn More'
  },
  {
    icon: 'M17 20h5m-5 0a2 2 0 01-2-2V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2zm-7 0H5a2 2 0 01-2-2V6a2 2 0 012-2h2a2 2 0 012 2v12a2 2 0 01-2 2z',
    title: 'Communities Supported',
    description: '50+ communities reached.',
    // actionText: 'Learn More'
  },
  {
    icon: 'M12 11c0-1.1.9-2 2-2s2 .9 2 2-2 4-2 4-2-2.9-2-4z',
    title: 'Funds to Programs',
    description: '100% of funds allocated.',
    // actionText: 'Learn More'
  },
  {
    icon: 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
    title: 'Emergency Support',
    description: '+013) 456 7890 for assistance.',
    // actionText: 'Learn More'
  },
]);
const stats = ref([
  { value: '1,200+', label: 'People Helped' },
  { value: '50+', label: 'Communities Supported' },
  { value: '100%', label: 'Funds to Programs' },
  { value: '$250K', label: 'Raised This Year' }
]);
const gifts = ref([
  { amount: '$10', desc: '1 month of school supplies' },
  { amount: '$25', desc: '1 student’s textbooks for a semester' },
  { amount: '$50', desc: '1 classroom’s learning materials' }
]);

// Validation errors
const errors = reactive({});

// Progress bar calculation
const progress = computed(() => Math.min((parseFloat(form.amount || 0) / 500) * 100, 100));

// Country list
const countries = ref([
  'China', 'Japan', 'South Korea', 'North Korea', 'Taiwan', 'Mongolia', 'Hong Kong', 'Brunei',
  'Cambodia', 'Indonesia', 'Malaysia', 'Myanmar (Burma)', 'Philippines', 'Singapore', 'Thailand',
  'Vietnam', 'Laos', 'Pakistan', 'Bangladesh', 'Bhutan', 'India', 'Maldives', 'Nepal', 'Sri Lanka',
  'Armenia', 'Turkey', 'Qatar', 'Palestine', 'France', 'United Kingdom', 'United States', 'Canada',
  'Australia', 'New Zealand', 'Russia'
]);

// Methods
const handleDonate = () => {
  alert('Donate action triggered! Redirecting to donation page...');
  // Add your donation logic here (e.g., router.push('/donate'))
};

const handleAction = (title) => {
  alert(`${title} action triggered!`);
  // Add specific action logic based on title
};

// Form validation
const validateForm = () => {
  const newErrors = {};
  if (!form.amount || form.amount <= 0) newErrors.amount = 'Please enter a valid donation amount greater than 0';
  if (!form.firstName.trim()) newErrors.firstName = 'First name is required';
  if (!form.lastName.trim()) newErrors.lastName = 'Last name is required';
  if (!form.email || !/\S+@\S+\.\S+/.test(form.email)) newErrors.email = 'A valid email is required';
  if (!form.country) newErrors.country = 'Please select a country';
  Object.assign(errors, newErrors);
  return Object.keys(newErrors).length === 0;
};

// Form submission
const handleSubmit = () => {
  if (validateForm()) {
    console.log('Form submitted:', form);
    alert('Redirecting to payment gateway...');
    // window.location.href = 'https://paypal.com/donate';
  }
};

// Quick donation amount setter
const setAmount = (value) => {
  form.amount = value;
};
</script>

<style scoped>
.animate-fade-in {
  animation: fadeIn 0.8s ease-out;
}
@keyframes fadeIn {
  0% { opacity: 0; transform: translateY(20px); }
  100% { opacity: 1; transform: translateY(0); }
}

input:focus,
select:focus,
textarea:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.3);
}

button {
  transition: all 0.3s ease;
}
button:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.bg-gradient-hover:hover {
  background-size: 200% 200%;
  animation: gradientShift 3s ease infinite;
}
@keyframes gradientShift {
  0% { background-position: 0% 0%; }
  50% { background-position: 100% 100%; }
  100% { background-position: 0% 0%; }
}
</style>