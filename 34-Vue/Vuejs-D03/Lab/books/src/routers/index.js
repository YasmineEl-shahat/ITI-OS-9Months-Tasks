// create routers array object
// 1- import from vue-router : createrouter, createwebhistory : vue-router

import { createRouter, createWebHistory } from "vue-router";

import App from "../App.vue";

import UnderConstructionComponent from "../components/Views/UnderConstructionComponent.vue";
import WatchListComponent from "../components/Views/WatchListComponent.vue";
//  2-create object for routes :
const routes = [
  {
    path: "/",
    component: App,
    exact: true,
  },
  {
    path: "/watch-list",
    component: WatchListComponent,
  },
  {
    path: "/:catchAll(.*)/",
    component: UnderConstructionComponent,
  },
];

// create router object
const router = createRouter({
  routes,
  history: createWebHistory(),
});

export default router;
