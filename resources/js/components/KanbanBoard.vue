<template>
    <!-- <div class="relative p-2 flex overflow-x-auto h-full"> -->

    <div class="row">
        <!-- Columns (Statuses) -->

        <!--begin::Col-->
        <div v-for="status in statuses" :key="status.slug" class="col">
            <!--begin::Card-->
            <div class="card card-bordered mb-10">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label">{{ status.title }}</h3>
                    </div>
                    <div v-if="$can('create task')" class="card-toolbar">
                        <button
                            class="btn btn-sm btn-primary"
                            @click="openAddTaskForm(status.id)"
                        >
                            Add Task
                        </button>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Row-->
                    <div class="row row-cols-1 g-10-zone">
                        <!-- New Task -->
                        <AddTaskForm
                            v-if="newTaskForStatus === status.id"
                            :status-id="status.id"
                            v-on:task-added="handleTaskAdded"
                            v-on:task-canceled="closeAddTaskForm"
                        />
                        <!-- New Task -->

                        <!-- Tasks -->

                        <draggable
                            class="flex-1 overflow-hidden "
                            v-model="status.tasks"
                            v-bind="taskDragOptions"
                            @end="handleTaskMoved"
                        >
                            <transition-group
                                class="flex-1 flex flex-col h-full overflow-x-hidden overflow-y-auto rounded mb-5"
                                tag="div"
                            >
                                <div
                                    v-for="task in status.tasks"
                                    :key="task.id"
                                    class="col draggable"
                                >
                                    <!--begin::Card-->
                                    <div class="card bg-light-primary">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-label">
                                                    {{ task.title }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{ task.description }}
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!-- Tasks -->
                            </transition-group>
                        </draggable>

                        <!-- No Tasks -->
                        <div
                            v-show="
                                !status.tasks.length &&
                                    newTaskForStatus !== status.id
                            "
                            class="col"
                        >
                            <!--begin::Card-->
                            <div class="card bg-light-primary">
                                <div class="card-header">
                                    <div class="card-title align-items-center">
                                        <h3 class="card-label">No Task</h3>
                                    </div>
                                </div>
                                <!-- <div class="card-body">
                                   
                                </div> -->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!-- No Tasks -->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->

        <!-- ./Columns -->
    </div>
</template>

<script>
import AddTaskForm from "./AddTaskForm";
import draggable from "vuedraggable";

export default {
    components: { draggable,AddTaskForm },
    props: {
        initialData: Array
    },
    data() {
        return {
            statuses: [],
            newTaskForStatus: 0 // track the ID of the status we want to add to
        };
    },
    mounted() {
        // 'clone' the statuses so we don't alter the prop when making changes
        this.statuses = JSON.parse(JSON.stringify(this.initialData));
    },
    computed: {
        taskDragOptions() {
            return {
                animation: 200,
                group: "task-list",
                dragClass: "status-drag"
            };
        }
    },
    methods: {
        // set the statusId and trigger the form to show
        openAddTaskForm(statusId) {
            this.newTaskForStatus = statusId;
        },
        // reset the statusId and close form
        closeAddTaskForm() {
            this.newTaskForStatus = 0;
        },
        // add a task to the correct column in our list
        handleTaskAdded(newTask) {
            // Find the index of the status where we should add the task
            const statusIndex = this.statuses.findIndex(
                status => status.id === newTask.status_id
            );

            // Add newly created task to our column
            this.statuses[statusIndex].tasks.push(newTask);

            // Reset and close the AddTaskForm
            this.closeAddTaskForm();
        },
        handleTaskMoved() {
            // Send the entire list of statuses to the server
            axios.put("/task/sync", { columns: this.statuses }).catch(err => {
                console.log(err.response);
            });
        }
    }
};
</script>
<style scoped>
.status-drag {
    transition: transform 0.5s;
    transition-property: all;
}
</style>
