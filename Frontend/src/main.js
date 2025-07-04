import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { Users, HandHeart, CheckCircle } from 'lucide-vue-next'

const app = createApp(App)

app.use(router)
// Register icons globally (component names same as icon names)
app.component('Users', Users)
app.component('HandHeart', HandHeart)
app.component('CheckCircle', CheckCircle)

app.mount('#app')
