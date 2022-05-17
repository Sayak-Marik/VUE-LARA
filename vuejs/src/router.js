import { createRouter, createWebHistory } from 'vue-router';
import FormTwo from './components/FormTwo.vue';
import ViewTable from './components/ViewTable.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', redirect: '/view' },
        { path: '/view', component: ViewTable },
        { path: '/add', component: FormTwo }
    ]
});
export default router;