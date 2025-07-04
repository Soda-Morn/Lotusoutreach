<template>
    <div class="min-h-screen bg-pink-50 flex flex-col">
        <!-- Hero Section with Full-Width Image -->
        <div class="relative h-screen flex items-center justify-center overflow-hidden">
            <img src="https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                alt="People helping each other" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-blue-600 opacity-60"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center px-4">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Spread Love & Kindness</h1>
                    <p class="text-xl text-white opacity-90">Your donation creates positive change in the world</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow container mx-auto px-4 py-8 max-w-7xl">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Enhanced Image Card Section -->
                <div class="lg:w-2/5">
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-pink-200 sticky top-8">
                        <!-- Impact Hero Card -->
                        <div class="relative h-64">
                            <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                alt="Your impact" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-pink-700 opacity-80"></div>
                            <div class="absolute inset-0 flex items-end p-8">
                                <div>
                                    <h3 class="text-2xl font-bold text-white mb-2">Your Generosity Changes Lives</h3>
                                    <p class="text-pink-100">Every contribution directly supports our mission to create
                                        positive change</p>
                                </div>
                            </div>
                        </div>

                        <!-- Impact Statistics -->
                        <div class="p-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-6 border-b pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-pink-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                Our Impact Together
                            </h4>
                            <div class="grid grid-cols-2 gap-6 mb-8">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600 mb-1">1,200+</div>
                                    <div class="text-sm text-gray-600">People Helped</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600 mb-1">50+</div>
                                    <div class="text-sm text-gray-600">Communities Supported</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600 mb-1">100%</div>
                                    <div class="text-sm text-gray-600">Funds to Programs</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600 mb-1">$250K</div>
                                    <div class="text-sm text-gray-600">Raised This Year</div>
                                </div>
                            </div>

                            <!-- Testimonial -->
                            <div class="bg-pink-50 p-6 rounded-lg border border-pink-100">
                                <div class="flex items-start">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=128&h=128&q=60"
                                        alt="Donor testimonial"
                                        class="w-14 h-14 rounded-full object-cover mr-4 border-2 border-pink-200">
                                    <div>
                                        <p class="text-gray-700 italic mb-2">"Seeing the direct impact of my donation
                                            has been incredibly rewarding. This organization makes every dollar count."
                                        </p>
                                        <p class="text-sm font-medium text-gray-700">- Sarah Johnson</p>
                                        <p class="text-xs text-gray-500">Monthly Donor Since 2020</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Giving Levels -->
                            <div class="mt-8">
                                <h4 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-pink-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    What Your Gift Provides
                                </h4>
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <div class="bg-pink-100 p-2 rounded-full mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">$50 = 5 hours of mentorship</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="bg-pink-100 p-2 rounded-full mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">$100 = Educational materials</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="bg-pink-100 p-2 rounded-full mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">$250 = Sponsors a child for a month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="lg:w-3/5">
                    <form @submit.prevent="handleSubmit"
                        class="bg-white rounded-xl shadow-xl overflow-hidden border border-pink-200">
                        <!-- Form Header -->
                        <div class="bg-gradient-to-r from-pink-600 to-pink-500 px-6 py-4">
                            <h2 class="text-xl font-semibold text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Donation Details
                            </h2>
                        </div>

                        <!-- Form Content -->
                        <div class="p-6 space-y-6">
                            <!-- Donation Amount -->
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2 flex items-center"
                                    for="amount">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-pink-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Donation Amount (USD)*
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input v-model="form.amount"
                                        class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                        type="number" id="amount" required placeholder="0.00">
                                </div>
                            </div>

                            <!-- Anonymous Donation -->
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2 flex items-center"
                                    for="anonymous">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-pink-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    Make this donation anonymous?
                                </label>
                                <select v-model="form.anonymous"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                    id="anonymous">
                                    <option value="no">No, display my name</option>
                                    <option value="yes">Yes, make it anonymous</option>
                                </select>
                            </div>

                            <!-- Donation Type -->
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-3 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-pink-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                    </svg>
                                    Donation Type
                                </label>
                                <div class="flex flex-wrap items-center gap-4">
                                    <label class="inline-flex items-center">
                                        <input v-model="form.donationType" type="radio" id="one-time" value="one-time"
                                            class="h-5 w-5 text-pink-600 focus:ring-pink-500">
                                        <span class="ml-2">One-Time Donation</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input v-model="form.donationType" type="radio" id="recurring" value="recurring"
                                            class="h-5 w-5 text-pink-600 focus:ring-pink-500">
                                        <span class="ml-2">Recurring Donation</span>
                                    </label>
                                    <select v-if="form.donationType === 'recurring'" v-model="form.frequency"
                                        class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500">
                                        <option value="monthly">Monthly</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="annually">Annually</option>
                                        <option value="every-6-months">Every 6 Months</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Personal Information Section -->
                            <div class="p-4 bg-pink-50 rounded-lg border border-pink-100">
                                <h3 class="text-lg font-semibold text-pink-800 mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-pink-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Your Information
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- First Name -->
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="first-name">
                                            First Name*
                                        </label>
                                        <input v-model="form.firstName"
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                            type="text" id="first-name" required>
                                    </div>

                                    <!-- Last Name -->
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="last-name">
                                            Last Name*
                                        </label>
                                        <input v-model="form.lastName"
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                            type="text" id="last-name" required>
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                            Email*
                                        </label>
                                        <input v-model="form.email"
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                            type="email" id="email" required>
                                    </div>

                                    <!-- Phone -->
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                            Phone
                                        </label>
                                        <input v-model="form.phone"
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                            type="tel" id="phone">
                                    </div>

                                    <!-- Address -->
                                    <div class="md:col-span-2">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                            Address
                                        </label>
                                        <input v-model="form.address"
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                            type="text" id="address">
                                    </div>

                                    <!-- City -->
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                                            City
                                        </label>
                                        <input v-model="form.city"
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                            type="text" id="city">
                                    </div>

                                    <!-- State -->
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="state">
                                            State (Province)
                                        </label>
                                        <input v-model="form.state"
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                            type="text" id="state">
                                    </div>

                                    <!-- Zip Code -->
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="zip">
                                            Zip Code
                                        </label>
                                        <input v-model="form.zip"
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                            type="text" id="zip">
                                    </div>

                                    <!-- Country -->
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="country">
                                            Country*
                                        </label>
                                        <select v-model="form.country"
                                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                            id="country" required>
                                            <option value="">Select Country</option>
                                            <option value="">China</option>
                                            <option value="">Japan</option>
                                            <option value="">South Korea</option>
                                            <option value="">North Korea</option>
                                            <option value="">Taiwan</option>
                                            <option value="">Mongolia</option>
                                            <option value="">Hong Kong</option>
                                            <option value="">Brunei</option>
                                            <option value="">Cambodia</option>
                                            <option value="">Indonesia</option>
                                            <option value="">Malaysia</option>
                                            <option value="">Myanmar (Burma)</option>
                                            <option value="">Philippines</option>
                                            <option value="">Singapore</option>
                                            <option value="">Thailand</option>
                                            <option value="">Vietnam</option>
                                            <option value="">Laos</option>
                                            <option value="">Pakistan</option>
                                            <option value="">Bangladesh</option>
                                            <option value="">Bhutan</option>
                                            <option value="">India</option>
                                            <option value="">Maldives</option>
                                            <option value="">Nepal</option>
                                            <option value="">Sri Lanka</option>
                                            <option value="">Armenia</option>
                                            <option value="">Turkey (partly in Asia)</option>
                                            <option value="">Qatar</option>
                                            <option value="">Palestine</option>
                                            <option value="">France</option>
                                            <option value="">United Kingdom</option>
                                            <option value="">United States</option>
                                            <option value="">Canada</option>
                                            <option value="">Australia</option>
                                            <option value="">New Zealand</option>
                                            <option value="">Russia (partly in Asia)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment -->
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2 flex items-center"
                                    for="comment">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-pink-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                    Comment (Optional)
                                </label>
                                <textarea v-model="form.comment"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                    id="comment" rows="3" placeholder="Any special instructions or notes..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-pink-600 to-pink-500 hover:from-pink-700 hover:to-pink-600 text-white font-bold py-3 px-4 rounded-lg shadow-lg transition duration-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                Continue to Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-pink-100 py-4 text-center text-gray-600 text-sm">
            <p class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-pink-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                Thank you for your generous support!
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                amount: '',
                anonymous: 'no',
                monthly: '',
                donationType: 'one-time',
                frequency: 'monthly',
                comment: '',
                firstName: '',
                lastName: '',
                email: '',
                phone: '',
                address: '',
                city: '',
                state: '',
                zip: '',
                country: ''
            }
        };
    },
    methods: {
        handleSubmit() {
            // Handle form submission logic here (e.g., send to API or redirect to PayPal)
            console.log('Form submitted:', this.form);
            // Example: Redirect to PayPal
            // window.location.href = 'https://paypal.com/donate';
        }
    }
};
</script>

<style scoped>
/* Smooth transitions for form elements */
input,
select,
textarea,
button {
    transition: all 0.2s ease;
}

/* Better focus states */
input:focus,
select:focus,
textarea:focus {
    box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.2);
}

/* Gradient animation for submit button */
button:hover {
    background-size: 150% 150%;
    animation: gradient 1.5s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0% 50%;
    }
}
</style>