import { createRouter, createWebHistory } from 'vue-router';
import CategoryList from './views/CategoryList.vue';
import CategoryCreate from './views/CategoryCreate.vue';
import CategoryEdit from './views/CategoryEdit.vue';

const routes = [
    { path: '/', redirect: '/categories' },
    { path: '/categories', component: CategoryList },
    { path: '/categories/create', component: CategoryCreate },
    { path: '/categories/:id/edit', component: CategoryEdit },
];

export default createRouter({
    history: createWebHistory(),
    routes
});