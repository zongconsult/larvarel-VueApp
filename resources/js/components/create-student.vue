<template>
    <div>
        <div class="card mt-5">
            <h4>Add A Student to Database</h4>

            <div class="card-body">
                <ul
                    class="alert alert-warning"
                    v-if="Object.keys(this.errorList).length > 0"
                >
                    <li
                        class="mb-0 ms-3"
                        v-for="(error, index) in this.errorList"
                        :key="index"
                    >
                        {{ error[0] }}
                    </li>
                </ul>
            </div>
            <label class="form-label mx-2">
                Name
                <input
                    type="text"
                    class="form-control mx-2"
                    v-model="model.student.name"
                />
            </label>
            <br />

            <label class="form-label mx-2">
                Course
                <input
                    type="text"
                    class="form-control mx-2"
                    v-model="model.student.course"
                /> </label
            ><br />

            <label class="form-label mx-2">
                Email
                <input
                    type="text"
                    class="form-control mx-2"
                    v-model="model.student.email"
                /> </label
            ><br />

            <label class="form-label mx-2" for="mobile">
                Mobile
                <input
                    type="text"
                    class="form-control mx-2"
                    name="mobile"
                    v-model="model.student.phone"
                /> </label
            ><br />
            <button
                type="button"
                @click.prevent="saveStudent"
                class="btn btn-info mx-2"
            >
                Submit
            </button>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
   // name: "create-student",

    data() {
        return {
            errorList: "",
            model: {
                student: {
                    name: "",
                    course: "",
                    email: "",
                    phone: ""
                },
            },
        };
    },

    methods: {
        saveStudent() {
            var mythis = this;

            axios
                .post('http://localhost:8000/students', this.model.student)
                .then( res => {
                    alert(res.data.message);
                    this.model.student = {
                        name: "",
                        course: "",
                        email: "",
                        phone: ""
                    };
                    console.log(this.model.student);
                    console.log(res);
                })
                .catch(function (error) {
                    if (error.response) {
                        if (error.response.status == 422) {
                            mythis.errorList = error.response.data.errors;
                        }
                        // console.log(error.response.data);
                        // console.log(error.response.status);
                        // console.log(error.response.headers);
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log("Error", error.message);
                    }
                });
        },
    },
};
</script>
