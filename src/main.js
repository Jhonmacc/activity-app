import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './main.css'
import '@fortawesome/fontawesome-free/css/all.min.css'

createApp(App).use(router).mount('#app')
