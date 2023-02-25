// pages
import HomePage from "./pages/HomePage.vue";
import ShopPage from "./pages/ShopPage.vue";
import CartPage from "./pages/CartPage.vue";

// Routing
import { createRouter, createWebHistory } from "vue-router";
const routes = [
    { path: "/", component: HomePage },
    { path: "/shop", component: ShopPage },
    { path: "/cart", component: CartPage }
];

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active"
});

export default router;
