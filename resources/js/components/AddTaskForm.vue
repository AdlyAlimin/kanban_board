<template>
  <form @submit.prevent="handleAddNewTask">
    <div v-for="task in status.tasks" :key="task.id" class="col draggable">
      <!--begin::Card-->
      <div class="card bg-light-primary">
        <div class="card-header">
          <div class="card-title">
            <h3 class="card-label">
                <input type="text">
            </h3>
          </div>
        </div>
        <div class="card-body">
          {{ task.description }}
        </div>
      </div>
      <!--end::Card-->
    </div>
  </form>
</template>

<script>
export default {
  props: {
    statusId: Number,
  },
  data() {
    return {
      newTask: {
        title: "",
        description: "",
        status_id: null,
      },
      errorMessage: "",
    };
  },
  mounted() {
    this.newTask.status_id = this.statusId;
  },
  methods: {
    handleAddNewTask() {
      // Basic validation so we don't send an empty task to the server
      if (!this.newTask.title) {
        this.errorMessage = "The title field is required";
        return;
      }

      // Send new task to server
      axios
        .post("/tasks", this.newTask)
        .then((res) => {
          // Tell the parent component we've added a new task and include it
          this.$emit("task-added", res.data);
        })
        .catch((err) => {
          // Handle the error returned from our request
          this.handleErrors(err);
        });
    },
    handleErrors(err) {
      if (err.response && err.response.status === 422) {
        // We have a validation error
        const errorBag = err.response.data.errors;
        if (errorBag.title) {
          this.errorMessage = errorBag.title[0];
        } else if (errorBag.description) {
          this.errorMessage = errorBag.description[0];
        } else {
          this.errorMessage = err.response.message;
        }
      } else {
        // We have bigger problems
        console.log(err.response);
      }
    },
  },
};
</script>