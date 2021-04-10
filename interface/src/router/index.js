import { BIconLayoutThreeColumns } from 'bootstrap-vue';
import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/website/Home.vue';
import Lowongan from '../views/website/Lowongan.vue';
import Login from '../views/website/Login.vue';
import Register from '../views/website/Register.vue';
import ProfileAktifitas from '../views/website/ProfileAktifitas.vue';
import ProfileLowongan from '../views/website/ProfileLowongan.vue';
import BuatAktifitas from '../views/website/BuatAktifitas.vue';
import BuatLowongan from '../views/website/BuatLowongan.vue';
import DetailLowongan from '../views/website/DetailLowongan.vue';


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/lowongan',
    name: 'lowongan',
    component: Lowongan
  },
  {
    path:'/login',
    name:'login',
    component: Login
  },
  {
    path:'/register',
    name:'register',
    component: Register
  },
  {
    path:'/profile/aktifitas/:id',
    name:'profileAktifitas',
    component: ProfileAktifitas
  },
  {
    path:'/profile/lowongan/:id',
    name:'profileLowongan',
    component: ProfileLowongan
  },
  {
    path:'/buatAktifitas',
    name:'buatAktifitas',
    component: BuatAktifitas,
  },
  {
    path:'/buatLowongan',
    name:'buatLowongan',
    component: BuatLowongan,
  },
  {
    path:'/detailLowongan/:id',
    name:'detailLowongan',
    component: DetailLowongan,
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router