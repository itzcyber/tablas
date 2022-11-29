import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import axios from 'axios'
import dayjs from 'dayjs'


window.dayjs = dayjs
window.axios = axios

createApp(App).mount('#app')

