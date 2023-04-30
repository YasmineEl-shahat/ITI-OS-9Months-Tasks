<template>
  <div class="container">
    <button
      v-if="authenticationStore.isAuhenticated == false"
      @click="authenticationStore.login"
    >
      login
    </button>
    <h4>Counter {{ counterStore.counter }}</h4>
    <button
      v-if="authenticationStore.isAuhenticated == true"
      @click="authenticationStore.logout"
    >
      logout
    </button>
    <p v-if="authenticationStore.isAuhenticated == true">
      welcome :{{ authenticationStore.user.name }}
    </p>
  </div>
</template>
<script>
// 1-
import { useCounterStore } from "@/stores/counterstore";
import { useAuthenticationStore } from "@/stores/authenticationstore";
// 2= create instant from imported store
// 3- with options api : define data member inside component data:
// new instance from imported store
export default {
  data: () => ({
    counterStore: useCounterStore(),
    authenticationStore: useAuthenticationStore(),
  }),
};
</script>
