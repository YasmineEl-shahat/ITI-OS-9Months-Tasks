import { createApp } from "vue";
import { createPinia } from "pinia";

import router from "./routers";

import NavBarComponent from "./components/NavBarComponent.vue";

const pinia = createPinia();

const app = createApp(NavBarComponent);
app.use(router);
app.use(pinia);
app.mount("#app");
