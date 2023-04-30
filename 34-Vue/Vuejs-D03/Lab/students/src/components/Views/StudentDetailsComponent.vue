<template>
  <h3>student details</h3>
  <template>{{ loadStudentData($route.params.id) }}</template>
  <p>ID : {{ std_id }}</p>
  <p>Name : {{ std_name }}</p>
  <p>City : {{ std_city }}</p>
</template>
<script>
export default {
  data: () => ({
    std_id: "",
    std_name: "",
    std_city: "",
  }),
  methods: {
    async loadStudentData(_id) {
      let response = await fetch("http://localhost:3000/students/" + _id);
      let data = await response.json();
      this.std_id = data.id;
      this.std_name = data.name;
      this.std_city = data.city;
    },
  },
};
</script>
