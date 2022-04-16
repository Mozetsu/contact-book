require("./bootstrap");

import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes/index";
import App from "./App.vue";

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

createApp(App).use(router).mount("#app");
