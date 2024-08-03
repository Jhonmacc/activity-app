import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import LandingPage from '../views/AboutView.vue';
import TreeMap from '../views/TreeMap.vue';


const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/landpage-demander',
    name: 'landpage',
    component: LandingPage
  },
  {
    path: '/treemap',
    name: 'treemap',
    component: TreeMap
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router;
