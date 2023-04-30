<template>
  <div class="container">
    <div class="row g-0 my-2">
      <li>
        <a href="#" @click="this.targetComponent = 'HomeComponent'">Home</a>
      </li>
      <li>
        <a href="#" @click="this.targetComponent = 'ContactComponent'"
          >Contact</a
        >
      </li>
      <li>
        <a href="#" @click="this.targetComponent = 'AboutComponent'">About</a>
      </li>
    </div>
  </div>
  <div>
    <h4>Dynamic Component</h4>
    <keep-alive>
      <component :is="targetComponent" />
    </keep-alive>
  </div>
</template>

<script>
import "bootstrap/dist/css/bootstrap.css";
import Popper from "popper.js";
window.Popper = Popper;
import HomeComponent from "./HomeComponent.vue";
import ContactComponent from "./ContactComponent.vue";
import AboutComponent from "./AboutComponent.vue";

export default {
  data: () => ({
    targetComponent: "HomeComponent",
  }),
  components: {
    HomeComponent,
    ContactComponent,
    AboutComponent,
  },
};
</script>
