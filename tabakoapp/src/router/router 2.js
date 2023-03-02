import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/Login.vue';
import Distance from '../components/Distance.vue';
import barcode from '../components/Bacode.vue'
import Dashboard from '../components/dashboard.vue';
import Honsu from '../components/Honsu.vue';
import Zukan from '../components/Zukan.vue';
import Shinki from '../components/Shinkilog.vue';
import Login2 from '../components/Login2.vue';


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

    path: '/honsu',
    component: Honsu,
  },

  {
    path: '/barcode',
    component: barcode,
  },
  {
    path: '/zukan',
    component: Zukan,

  },
  {
    path: '/shinki',
    component: Shinki,

  },
  {
    path: '/login2',
    component: Login2,

  },
]


const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router