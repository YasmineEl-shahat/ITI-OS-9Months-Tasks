<template>
  <div class="container">
    <button @click="counterStore.increase">+</button>
    <h4>Counter {{ counterStore.counter }}</h4>
    <button @click="counterStore.decrease">-</button>
  </div>
</template>
<script>
// 1-
import { useCounterStore } from "@/stores/counterstore";
// 2= create instant from imported store
// 3- with options api : define data member inside component data:
// new instance from imported store
export default {
  data: () => ({
    counterStore: useCounterStore(),
  }),
};
</script>
