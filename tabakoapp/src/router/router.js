import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue';
import Distance from '../components/Distance.vue';

const routes = [
  {
    path: '/',
    component: Login,
  },
  {
    path: '/distance',
    component: Distance,
  },
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router