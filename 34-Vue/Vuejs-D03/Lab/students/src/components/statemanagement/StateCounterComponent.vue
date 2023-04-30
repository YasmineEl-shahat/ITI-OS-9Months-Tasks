<template>
  <CounterOperationsComponent />
  <h3>State</h3>
  <div>
    <!-- display component : counter operatoin -->
    <h4>Counter {{ counterStore.counter }}</h4>
  </div>
</template>
<script>
// 1-
import { useCounterStore } from "@/stores/counterstore";
import CounterOperationsComponent from "./CounterOperationsComponent.vue";
// 2= create instant from imported store
// 3- with options api : define data member inside component data:
// new instance from imported store
export default {
  components: {
    CounterOperationsComponent,
  },
  data: () => ({
    counterStore: useCounterStore(),
  }),
};
</script>
