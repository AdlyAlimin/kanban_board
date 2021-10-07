require('./bootstrap');

import Permissions from './mixins/Permissions';

window.Vue = require("vue").default;

// Register our components (in the next step)
Vue.component("kanban-board", require("./components/KanbanBoard.vue").default);

Vue.mixin(Permissions);

const app = new Vue({
    el: "#app",
});