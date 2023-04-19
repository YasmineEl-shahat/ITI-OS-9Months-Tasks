<template>
  <div class="col-8 mt-3">
    <button
      type="button"
      class="btn btn-primary mb-3"
      data-bs-toggle="modal"
      data-bs-target="#addStudentModal"
    >
      Add Student
    </button>
    <h1>Student List</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>City</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="student in students" :key="student.id">
          <td>{{ student.id }}</td>
          <td>{{ student.name }}</td>
          <td>{{ student.city }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div
    class="modal fade"
    id="addStudentModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="addStudentModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
          <button
            class="btn btn-danger close"
            type="button"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Enter name"
              />
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input
                type="text"
                class="form-control"
                id="city"
                placeholder="Enter city"
              />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
            ref="closeModal"
          >
            Close
          </button>
          <button type="button" class="btn btn-primary" @click="addStudent">
            Save changes
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { students } from "../assets/data/students.js";

export default {
  name: "MainComponent",
  data() {
    return {
      students,
    };
  },
  methods: {
    addStudent() {
      const name = document.getElementById("name").value;
      const city = document.getElementById("city").value;
      if (name && city) {
        const id = this.students.length + 1;
        this.students.push({ id, name, city });
        const closebtn = this.$refs.closeModal;
        document.getElementById("name").value = "";
        document.getElementById("city").value = "";
        closebtn.click();
      }
    },
  },
};
</script>
