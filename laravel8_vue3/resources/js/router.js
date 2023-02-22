// pages
import HomePage from "./pages/HomePage.vue";

// Routing
import { createRouter, createWebHistory } from "vue-router";
const routes = [{ path: "/", component: HomePage }];

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
    linkActiveClass: "active"
});

export default router;
