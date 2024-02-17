import Vue from 'vue';
import VueRouter, { createRouter } from 'vue-router';
import Start from './views/Start.vue';

const router = createRouter({
    history:createWebHistory(),
    routes:[
        {path:'/',name:'home',component:Start}
    ]
})

export default router;