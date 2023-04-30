<template>
  <HeaderComponent :branch="{ name: 'Alex', intake: 43, track: 'OS' }">
    <h6>test default</h6>
    <template v-slot:top>
      <p class="text-center lead">Creativa Centers</p>
    </template>
    <template v-slot:bottom>
      <p class="text-start"><a href="#">more</a></p>
    </template>
  </HeaderComponent>
  <div class="row">
    <SidebarComponent />
    <MainComponent />
  </div>
  <FooterComponent />
</template>

<script>
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
