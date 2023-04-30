<template>
  <div>
    <button
      type="button"
      class="btn btn-primary mb-3"
      data-bs-toggle="modal"
      data-bs-target="#addStudentModal"
    >
      Add Student
    </button>
    <div
      data-bs-backdrop="static"
      data-bs-keyboard="false"
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
              data-bs-target="#addStudentModal"
              ref="closeModal"
            >
              Close
            </button>
            <button
              type="button"
              class="btn btn-primary"
              data-bs-dismiss="modal"
              data-bs-target="#addStudentModal"
              @click="sendDataToParent"
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
export default {
  name: "AddComponent",
  data: () => ({
    stdname: "",
    stdcity: "",
  }),
  events: { addStudentRaised() {} },
  methods: {
    sendDataToParent() {
      // 1-notify parent with evint
      const createdStudent = { name: this.stdname, city: this.stdcity };
      this.$emit("addStudentRaised", createdStudent);
      this.stdname = "";
      this.stdcity = "";
    },
  },
};
</script>
