import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue';
import Distance from '../components/Distance.vue';

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
    path: '/zukan',
    component: Zukan,
  },
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router