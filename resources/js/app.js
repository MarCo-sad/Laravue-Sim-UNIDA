require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

Vue.component('header-component', require('./Halaman/includes/HeaderComponent').default);
Vue.component('sidebar-component', require('./Halaman/includes/SidebarComponent').default);
Vue.component('footer-component', require('./Halaman/includes/FooterComponent').default);

import DashboardAdmin from'./Halaman/pages/dashboard/dashboard.vue'
const TabelKerjasamaAdmin = require('./Halaman/pages/kerjasama/index.vue').default
const CreateKerjasamaAdmin = require('./Halaman/pages/kerjasama/create.vue').default
const EditKerjasamaAdmin = require('./Halaman/pages/kerjasama/edit.vue').default
const TabelKegiatanAdmin = require('./Halaman/pages/kegiatan/index.vue').default
const CreateKegiatanAdmin = require('./Halaman/pages/kegiatan/create.vue').default
const EditKegiatanAdmin = require('./Halaman/pages/kegiatan/edit.vue').default
const FormatPengajuanAdmin = require('./Halaman/pages/format-pengajuan/index.vue').default
const NotFoundAdmin = require('./Halaman/pages/eror/404.vue').default
const routes = [
    {
        name: DashboardAdmin,
        path: '/admin/home',
        component: DashboardAdmin
    },
    {   name: TabelKerjasamaAdmin,
        path: '/admin/tabel/kerjasama',
        component: TabelKerjasamaAdmin
    },
    {   name: CreateKerjasamaAdmin,
        path: '/admin/create/kerjasama',
        component: CreateKerjasamaAdmin
    },
    {   name: EditKerjasamaAdmin,
        path: '/admin/edit/kerjasama',
        component: EditKerjasamaAdmin
    },
    {
        name: TabelKegiatanAdmin,
        path: '/admin/tabel/kegiatan',
        component: TabelKegiatanAdmin
    },
    {
        name: CreateKegiatanAdmin,
        path: '/admin/create/kegiatan',
        component: CreateKegiatanAdmin
    },
    {
        name: EditKegiatanAdmin,
        path: '/admin/edit/kegiatan',
        component: EditKegiatanAdmin
    },
    {
        name: FormatPengajuanAdmin,
        path: '/admin/format/pengajuan',
        component: FormatPengajuanAdmin
    },
    {
        path: '*',
        component: NotFoundAdmin
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    el: '#app',
    router,
    
});
