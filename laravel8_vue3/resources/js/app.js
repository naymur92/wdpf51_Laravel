require("./bootstrap");

import { createApp } from "vue";
import FrontTemplate from "./FrontTemplate.vue";

import router from "./router";
const app = createApp({});

app.component("front-template", FrontTemplate);
app.use(router);
app.mount("#app");
