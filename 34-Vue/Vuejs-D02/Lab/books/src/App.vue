<template>
  <bookComponent />
</template>

<script>
import bookComponent from "./components/bookComponent.vue";

export default {
  name: "App",

  components: {
    bookComponent,
  },
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
}
</style>
