import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue';
import Distance from '../components/Distance.vue';
import Dashboard from '../components/dashboard.vue';

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
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router