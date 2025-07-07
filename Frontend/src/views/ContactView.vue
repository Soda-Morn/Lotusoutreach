<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Hero Section with Image -->
    <section
      class="relative h-[80vh] bg-cover bg-center flex items-center overflow-hidden bg-gradient-to-br from-indigo-900/90 via-purple-900/90 to-pink-900/90">
      <div class="absolute inset-0 bg-black/80 mix-blend-multiply"></div>
      <img src="../img/cam3.png" alt="Cambodian girls in a classroom"
        class="absolute inset-0 w-full h-full object-cover opacity-70" />
      <div class="container mx-auto px-6 relative z-10 text-center">
        <div>
          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
            Connect with <span class="text-pink-400">Us</span>
          </h1>
          <p class="text-lg sm:text-xl text-white mb-8 leading-relaxed">
            Reach out to join our mission of empowering Cambodian girls and
            transforming rural communities.
          </p>
        </div>
      </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-gray-50">
      <!-- Use full width container with controlled padding -->
      <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Centered Heading -->
        <div class="text-center mb-16 max-w-3xl mx-auto">
          <h2 class="text-4xl font-bold text-gray-900 mb-4">Get in Touch</h2>
          <div class="w-20 h-1 bg-blue-200 mx-auto mb-6"></div>
          <p class="text-lg text-gray-600">
            We'd love to hear from you! Whether you have questions, want to
            volunteer, or wish to support our work in Cambodia, fill out the
            form below.
          </p>
        </div>

        <!-- Wider container for form and card -->
        <div class="max-w-[1400px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 px-8">
          <!-- Form Section - Increased width -->
          <div class="bg-white p-12 rounded-xl shadow-md border border-gray-100">
            <form @submit.prevent="handleSubmit" class="space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                  <input id="name" v-model="form.name" type="text" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Your Name" aria-required="true" />
                </div>
                <div>
                  <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                  <input id="email" v-model="form.email" type="email" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Your Email" aria-required="true" />
                </div>
              </div>
              <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                <textarea id="message" v-model="form.message" required rows="5"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                  placeholder="Your Message"></textarea>
              </div>
              <div class="pt-2">
                <button type="submit" :disabled="isSubmitting"
                  class="w-full px-6 py-4 bg-pink-600 text-white font-medium rounded-lg hover:bg-pink-700 transition-colors disabled:opacity-70 disabled:cursor-not-allowed"
                  aria-label="Submit contact form">
                  {{ isSubmitting ? "Sending..." : "Send Message" }}
                </button>
              </div>
              <p v-if="formStatus" :class="[
                'text-center py-3 rounded-lg',
                formStatus.success ? 'bg-blue-50 text-blue-700' : 'bg-pink-50 text-pink-700'
              ]">
                {{ formStatus.message }}
              </p>
            </form>
          </div>

          <!-- Info Card Section - Increased width -->
          <div class="bg-blue-500 text-white p-12 rounded-xl shadow-md">
            <div class="h-full flex flex-col justify-center">
              <div class="mb-8 text-center">
                <svg class="w-12 h-12 mx-auto text-white mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <h3 class="text-2xl font-bold mb-2">Contact Information</h3>
                <p class="text-blue-100">Our team is ready to assist you with any questions.</p>
              </div>

              <div class="space-y-6">
                <div class="flex items-start space-x-4">
                  <div class="mt-1">
                    <svg class="w-6 h-6 text-pink-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold">Email Us :</h4>
                    <p class="text-blue-100">info@lotusoutreach.org</p>
                  </div>
                </div>

                <div class="flex items-start space-x-4">
                  <div class="mt-1">
                    <svg class="w-6 h-6 text-pink-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold">Call Us :</h4>
                    <p class="text-blue-100">+855 888 831 9990</p>
                  </div>
                </div>

                <div class="flex items-start space-x-4">
                  <div class="mt-1">
                    <svg class="w-6 h-6 text-pink-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold">Visit Us :</h4>
                    <p class="text-blue-100"></p>
                  </div> 26a Street 492, Phnom Penh, Cambodia
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-gradient-to-r from-blue-50 to-pink-50">
      <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Our Location
          </h2>
          <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Visit us in Phnom Penh, Cambodia, where our team coordinates efforts
            to empower communities across rural provinces.
          </p>
        </div>
        <div class="max-w-[1400px] mx-auto px-8"> <!-- Matching your form/card container exactly -->
          <div class="relative rounded-2xl overflow-hidden">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.123456!2d104.9141!3d11.5449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a8e9e6e9b7b1b%3A0x4e8f6a5b6b6b6b6b!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2sus!4v1697051234567!5m2!1sen!2sus"
              class="w-full h-[450px] border-0" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade" title="Phnom Penh, Cambodia Location"></iframe>
            <div class="absolute top-0 left-0 p-6 bg-white/90 rounded-br-2xl">
              <h3 class="text-xl font-bold text-blue-600">
                Lotus Outreach Cambodia
              </h3>
              <p class="text-gray-700">26a Street 492, Phnom Penh, Cambodia</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="relative h-[60vh] bg-cover bg-center flex items-center overflow-hidden">
      <!-- Background image with overlay -->
      <img src="../img/contact.png" alt="Cambodian girls in a classroom"
        class="absolute inset-0 w-full h-full object-cover" />
      <div class="absolute inset-0 bg-gradient-to-br from-indigo-400/40"></div>
      <div class="absolute inset-0 bg-black/70 mix-blend-multiply"></div>

      <!-- Content -->
      <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="max-w-3xl mx-auto">
          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
            Join Our <span class="text-pink-400">Mission</span>
          </h1>
          <p class="text-lg sm:text-xl text-gray-200 mb-8 leading-relaxed">
            Your support can transform lives in Cambodia. Reach out to join our mission of empowering Cambodian girls
            and transforming rural communities.
          </p>
          <router-link to="/donate"
            class="inline-block px-8 py-4 bg-pink-700 text-white font-semibold rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg"
            aria-label="Support our mission in Cambodia">
            Support Cambodia
          </router-link>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from "vue";

// Form state
const form = ref({
  name: "",
  email: "",
  message: "",
});
const isSubmitting = ref(false);
const formStatus = ref(null);

// Form submission handler
const handleSubmit = async () => {
  isSubmitting.value = true;
  formStatus.value = null;

  try {
    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 1000));

    // Here you would typically send form data to an API
    // For example: await fetch('/api/contact', { method: 'POST', body: JSON.stringify(form.value) });

    formStatus.value = {
      success: true,
      message: "Thank you for your message! We’ll get back to you soon.",
    };

    // Reset form
    form.value = { name: "", email: "", message: "" };
  } catch (error) {
    formStatus.value = {
      success: false,
      message: "An error occurred. Please try again later.",
    };
  } finally {
    isSubmitting.value = false;
  }
};
</script>

<style scoped>
.container {
  max-width: 1200px;
  /* Adjust this value to match your navbar's max-width if different */
  width: 100%;
}

input:focus,
textarea:focus {
  outline: none;
}
</style>