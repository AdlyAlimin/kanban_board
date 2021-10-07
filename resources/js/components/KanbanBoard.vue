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
          <div class="card-toolbar">
            <button class="btn btn-sm btn-primary">Add Task</button>
          </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body">
          <!--begin::Row-->
          <div class="row row-cols-1 g-10 draggable-zone">
            <div
              v-for="task in status.tasks"
              :key="task.id"
              class="col draggable"
            >
              <!--begin::Card-->
              <div class="card bg-light-primary">
                <div class="card-header">
                  <div class="card-title">
                    <h3 class="card-label">{{ task.title }}</h3>
                  </div>
                  <div class="card-toolbar">
                    <a
                      href="#"
                      class="
                        btn btn-icon btn-hover-light-primary
                        draggable-handle
                      "
                    >
                      <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                      <span class="svg-icon svg-icon-2x">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                        >
                          <path
                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="black"
                          ></path>
                          <path
                            opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="black"
                          ></path>
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  {{ task.description }}
                </div>
              </div>
              <!--end::Card-->
            </div>

            <div v-show="!status.tasks.length" class="col draggable">
              <!--begin::Card-->
              <div class="card bg-light-primary">
                <div class="card-header">
                  <div class="card-title align-items-center">
                    <h3 class="card-label">No Task</h3>
                  </div>
                </div>
              </div>
              <!--end::Card-->
            </div>
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
export default {
  props: {
    initialData: Array,
  },
  data() {
    return {
      statuses: [],
    };
  },
  mounted() {
    // 'clone' the statuses so we don't alter the prop when making changes
    this.statuses = JSON.parse(JSON.stringify(this.initialData));
  },
};
</script>