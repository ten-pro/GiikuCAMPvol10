import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue';
import Distance from '../components/Distance.vue';
import barcode from '../components/Bacode.vue'
import Dashboard from '../components/dashboard.vue';
import Zukan from '../components/Zukan.vue';

const routes = [
  {
    path: '/',
    component: Login,
  },
  {
    path: '/distance',
    component: Distance,
  },
  {
    path: '/dashboard',
    component: Dashboard,
  },
  {
    path: '/barcode',
    component: barcode,
  },
  
    path: '/zukan',
    component: Zukan,
  },
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router