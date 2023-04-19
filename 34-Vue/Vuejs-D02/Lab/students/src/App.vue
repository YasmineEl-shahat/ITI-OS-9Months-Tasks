<template>
  <HeaderComponent />
  <div class="row">
    <SidebarComponent />
    <MainComponent />
  </div>
  <FooterComponent />
</template>

<script>
import "bootstrap/dist/css/bootstrap.css";
import Popper from "popper.js";
window.Popper = Popper;

import "bootstrap/dist/js/bootstrap.js";
import HeaderComponent from "./components/HeaderComponent.vue";
import SidebarComponent from "./components/SidebarComponent.vue";
import MainComponent from "./components/MainComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";
export default {
  name: "App",
  components: {
    HeaderComponent,
    SidebarComponent,
    MainComponent,
    FooterComponent,
  },
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
}
</style>
