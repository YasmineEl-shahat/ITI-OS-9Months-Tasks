<template>
  <div class="col-8 mt-3">
    <AddComponent v-on:addStudentRaised="addStudent" />
    <h1>Student List</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>City</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="student in students" :key="student.id">
          <td>{{ student.id }}</td>
          <td>
            <router-link :to="'studentdetails/' + student.id">{{
              student.name
            }}</router-link>
          </td>
          <td>{{ student.city }}</td>
          <td>
            <i
              class="fa-solid fa-pen-to-square actions"
              data-bs-toggle="modal"
              data-bs-target="#updatemodal"
              @click="filldata(student)"
            ></i>
            |
            <i
              class="fa-solid fa-trash actions"
              @click="deleteStudent(student.id)"
            ></i>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- modal -->
    <div
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      class="modal fade"
      id="updatemodal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="updatemodalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updatemodalLabel">Update Student</h5>
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
                  v-model="stdname"
                />
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input
                  type="text"
                  class="form-control"
                  id="city"
                  placeholder="Enter city"
                  v-model="stdcity"
                />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
              data-bs-target="#updatemodal"
            >
              Close
            </button>
            <button
              type="button"
              class="btn btn-primary"
              data-bs-dismiss="modal"
              data-bs-target="#updatemodal"
              @click="updateStudentData"
            >
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import AddComponent from "./AddComponent.vue";
export default {
  name: "MainComponent",
  components: {
    AddComponent,
  },
  data() {
    return {
      stdid: "",
      stdname: "",
      stdcity: "",
      students: [],
    };
  },
  created() {
    fetch("http://localhost:3000/students")
      .then((res) => res.json())
      .then((data) => (this.students = data));
  },
  methods: {
    filldata(student) {
      this.stdid = student.id;
      this.stdname = student.name;
      this.stdcity = student.city;
    },
    async deleteStudent(id) {
      if (confirm("Are you sure to delete")) {
        await fetch(`http://localhost:3000/students/${id}`, {
          method: "Delete",
        });
        this.students.splice(
          this.students.findIndex((std) => std.id == id),
          1
        );
      }
    },
    async addStudent(e) {
      const id = this.students.length + 1;
      const newStudent = { id, name: e.name, city: e.city };

      await fetch(`http://localhost:3000/students`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(newStudent),
      });
      this.students.push(newStudent);
    },
    async updateStudentData() {
      const updatedStudent = {
        id: this.stdid,
        name: this.stdname,
        city: this.stdcity,
      };
      await fetch(`http://localhost:3000/students/${this.stdid}`, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(updatedStudent),
      });
      this.students.find((std) => std.id == this.stdid).name =
        updatedStudent.name;
      this.students.find((std) => std.id == this.stdid).city =
        updatedStudent.city;
    },
  },
};
</script>
<style>
.actions {
  cursor: pointer;
}
</style>
