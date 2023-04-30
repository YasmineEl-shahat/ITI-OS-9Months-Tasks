<template>
  <div>
    <h4>Home Component</h4>
  </div>
  <div class="bg-info">
    <button class="btn btn-primary px-5 py-3" @click="counter++">+</button>
    <h5>Counter : {{ counter }}</h5>
    <button class="btn btn-primary px-5 py-3" @click="counter--">-</button>
  </div>
</template>

<script>
export default {
  data: () => ({
    counter: 10,
  }),
  created() {
    alert("home created");
  },
  activated() {
    alert("home activated");
  },
  deactivated() {
    alert("home deactivated");
  },
};
</script>
