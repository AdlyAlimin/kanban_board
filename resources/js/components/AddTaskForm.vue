<template>
    <form @submit.prevent="handleAddNewTask">
        <div class="col">
            <!--begin::Card-->
            <div class="card bg-light-primary">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            <input
                                class="form-control"
                                type="text"
                                placeholder="Task Title"
                                v-model.trim="newTask.title"
                            />
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <textarea
                        class="form-control"
                        rows="2"
                        placeholder="Add a description (optional)"
                        v-model.trim="newTask.description"
                    ></textarea>
                </div>
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button
                        @click="$emit('task-canceled')"
                        type="reset"
                        class="btn btn-light btn-active-light-primary me-2"
                    >
                        Discard
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Add
                    </button>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Card-->
        </div>
    </form>
</template>

<script>
export default {
    props: {
        statusId: Number
    },
    data() {
        return {
            newTask: {
                title: "",
                description: "",
                status_id: null
            },
            errorMessage: ""
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
                .post("/task/store", this.newTask)
                .then(res => {
                    // Tell the parent component we've added a new task and include it
                    this.$emit("task-added", res.data);
                })
                .catch(err => {
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
        }
    }
};
</script>
