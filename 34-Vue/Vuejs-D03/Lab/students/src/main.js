import { createApp } from "vue";
// to deal with pinia :
// 1- in main.js create instance from pinia using createpinea
import LandingComponent from "./components/Views/LandingComponent.vue";

import router from "./routers";
import { createPinia } from "pinia";

const app = createApp(LandingComponent);
app.use(router);
const pinia = createPinia();
app.use(pinia);
app.mount("#app");
