// create routers array object
// 1- import from vue-router : createrouter, createwebhistory : vue-router

import { createRouter, createWebHistory } from "vue-router";

import App from "../App.vue";
import AboutComponent from "../components/Views/AboutComponent.vue";
import ContactComponent from "../components/Views/ContactComponent.vue";
import DynamicComponent from "../components/Views/DynamicComponent.vue";
import StudentDetailsComponent from "../components/Views/StudentDetailsComponent.vue";
import UnderConstructionComponent from "../components/Views/UnderConstructionComponent.vue";
//  2-create object for routes :
const routes = [
  {
    path: "/",
    component: App,
  },
  {
    path: "/contact",
    component: ContactComponent,
  },
  {
    path: "/about",
    component: AboutComponent,
  },
  {
    path: "/dynamic",
    component: DynamicComponent,
  },
  {
    path: "/studentdetails/:id",
    component: StudentDetailsComponent,
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
