import './bootstrap';

import {createApp} from 'vue';

import CreateForm from "./components/create-student.vue";
import AddForm from "./components/add-student.vue";
import EditForm from "./components/edit-student.vue";
import AllStudents from "./components/list-students.vue";

const app = createApp({

});

app.component("create-form",CreateForm);
app.component("add-entry", AddForm);
app.component("edit-student", EditForm);
app.component("all-students", AllStudents);

app.mount("#app");