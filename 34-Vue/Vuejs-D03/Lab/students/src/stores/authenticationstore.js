// define store for counter :

import { defineStore } from "pinia";

// 2- define store ("id for your store", {
// data: state
// method :actions
// computed : getters
// })

export const useAuthenticationStore = defineStore("authenticationstore", {
  state: () => ({ isAuhenticated: false, user: {} }),
  actions: {
    async login() {
      this.isAuhenticated = true;
      const response = await fetch("https://reqres.in/api/user/2");
      const data = await response.json();
      this.user = data.data;
    },
    logout() {
      this.isAuhenticated = false;
    },
  },
});
