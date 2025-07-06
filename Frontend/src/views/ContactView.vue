<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Hero Section with Image -->
    <section
      class="relative h-[80vh] bg-cover bg-center flex items-center overflow-hidden"
    >
      <div class="absolute inset-0 bg-black/80"></div>
      <img
        src="https://lotusoutreach.org/wp-content/uploads/2018/12/Girls-Access-to-Education-1.jpg"
        alt="Cambodian girls in a classroom"
        class="absolute inset-0 w-full h-full object-cover"
      />
      <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="max-w-3xl mx-auto">
          <h1
            class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight"
          >
            Connect with <span class="text-pink-400">Us</span>
          </h1>
          <p class="text-lg sm:text-xl text-gray-200 mb-8 leading-relaxed">
            Reach out to join our mission of empowering Cambodian girls and
            transforming rural communities.
          </p>
        </div>
      </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
          <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
              Get in Touch
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
              We’d love to hear from you! Whether you have questions, want to
              volunteer, or wish to support our work in Cambodia, fill out the
              form below.
            </p>
          </div>

          <form
            @submit.prevent="handleSubmit"
            class="bg-white p-8 rounded-2xl border border-gray-100"
          >
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
              <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2"
                  >Name</label
                >
                <input
                  id="name"
                  v-model="form.name"
                  type="text"
                  required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                  placeholder="Your Name"
                  aria-required="true"
                />
              </div>
              <div>
                <label
                  for="email"
                  class="block text-gray-700 font-semibold mb-2"
                  >Email</label
                >
                <input
                  id="email"
                  v-model="form.email"
                  type="email"
                  required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                  placeholder="Your Email"
                  aria-required="true"
                />
              </div>
            </div>
            <div class="mb-6">
              <label
                for="message"
                class="block text-gray-700 font-semibold mb-2"
                >Message</label
              >
              <textarea
                id="message"
                v-model="form.message"
                required
                rows="5"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all resize-none"
                placeholder="Your Message"
                aria-required="true"
              ></textarea>
            </div>
            <div class="text-center">
              <button
                type="submit"
                :disabled="isSubmitting"
                class="px-8 py-4 bg-pink-600 text-white font-semibold rounded-full hover:bg-pink-700 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                aria-label="Submit contact form"
              >
                {{ isSubmitting ? "Sending..." : "Send Message" }}
              </button>
            </div>
            <p
              v-if="formStatus"
              :class="[
                'mt-4 text-center',
                formStatus.success ? 'text-green-600' : 'text-red-600',
              ]"
            >
              {{ formStatus.message }}
            </p>
          </form>
        </div>
      </div>
    </section>

    <!-- Map Section -->
    <section class="py-20 bg-gradient-to-r from-blue-50 to-pink-50">
      <div class="container mx-auto px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Our Location
          </h2>
          <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Visit us in Phnom Penh, Cambodia, where our team coordinates efforts
            to empower communities across rural provinces.
          </p>
        </div>
        <div class="max-w-full mx-auto">
          <div class="relative rounded-2xl overflow-hidden">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.123456!2d104.9141!3d11.5449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a8e9e6e9b7b1b%3A0x4e8f6a5b6b6b6b6b!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2sus!4v1697051234567!5m2!1sen!2sus"
              class="w-full h-[450px] border-0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="Phnom Penh, Cambodia Location"
            ></iframe>
            <div class="absolute top-0 left-0 p-6 bg-white/90 rounded-br-2xl">
              <h3 class="text-xl font-bold text-blue-600">
                Lotus Outreach Cambodia
              </h3>
              <p class="text-gray-700">123 Street 123, Phnom Penh, Cambodia</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section
      class="py-20 bg-gray-900 text-white relative bg-cover bg-center"
      style="
        background-image: url('/path-to-your-image/12aee3bc-ee10-4e9f-9332-222a3b5320ef.png');
      "
    >
      <div class="absolute inset-0 bg-black/40 z-0"></div>
      <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="max-w-3xl mx-auto">
          <h2 class="text-3xl sm:text-4xl font-bold mb-6">Join Our Mission</h2>
          <p class="text-lg mb-8">
            Your support can transform lives in Cambodia. Connect with us to
            learn how you can make a difference.
          </p>
          <router-link
            to="/donate"
            class="inline-block px-8 py-4 bg-pink-600 text-white font-semibold rounded-full hover:bg-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg"
            aria-label="Support our mission in Cambodia"
          >
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
  max-width: 1200px; /* Adjust this value to match your navbar's max-width if different */
  width: 100%;
}
input:focus,
textarea:focus {
  outline: none;
}
</style>