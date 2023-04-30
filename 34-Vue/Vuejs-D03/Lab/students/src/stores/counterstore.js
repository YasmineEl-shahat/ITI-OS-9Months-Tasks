// define store for counter :

import { defineStore } from "pinia";
import { useAuthenticationStore } from "./authenticationstore";
// 2- define store ("id for your store", {
// data: state
// method :actions
// computed : getters
// })

export const useCounterStore = defineStore("counterstore", {
  state: () => ({ counter: 10 }),
  actions: {
    increase() {
      if (checkAuthenticated) {
        this.counter++;
      }
    },
    decrease() {
      if (checkAuthenticated) {
        this.counter--;
      }
    },
  },
});
function checkAuthenticated() {
  const authenticationstore = useAuthenticationStore();
  return authenticationstore.isAuhenticated;
}
