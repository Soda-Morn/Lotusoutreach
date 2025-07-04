<!-- components/Modal.vue -->
<template>
    <transition name="modal">
        <div v-if="isOpen" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay with transition -->
                <transition name="fade">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-900 bg-opacity-75" @click="close"></div>
                    </div>
                </transition>

                <!-- Modal content with transition -->
                <transition name="slide-up">
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                        <!-- Header -->
                        <div class=" px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mt-4">
                            <button @click="close" class="text-white hover:text-blue-200 focus:outline-none">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <h3 class="text-lg leading-6 font-medium text-white flex-1 text-center">
                                {{ title }}
                            </h3>
                        </div>

                        <!-- Body -->
                        <div class="bg-white px-6 py-4 max-h-[70vh] overflow-y-auto">
                            <slot></slot>
                        </div>

                        <!-- Footer -->
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                                @click="close">
                                Close
                            </button>
                        </div>
                    </div>
                </transition>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        isOpen: Boolean,
        title: String
    },
    methods: {
        close() {
            this.$emit('close');
        }
    }
}
</script>

<style>
/* Transition effects */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease-in-out;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.slide-up-enter-active,
.slide-up-leave-active {
    transition: all 0.4s ease-in-out;
}

.slide-up-enter,
.slide-up-leave-to {
    opacity: 0;
    transform: translateY(20px);
}

/* Ensure modal stays above other content */
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease-in-out;
}

.modal-enter,
.modal-leave-to {
    opacity: 0;
}
</style>