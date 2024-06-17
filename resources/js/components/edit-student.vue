<template>

    <div>
        <div class="card mt-5">
            <h4>Edit Student Details</h4>
            <label class="form-label mx-2">
                Name
                <input type="text" class="form-control mx-2" />
            </label>
            <br />

            <label class="form-label mx-2">
                Course
                <input type="text" class="form-control mx-2" /> </label><br />

            <label class="form-label mx-2">
                Email
                <input type="text" class="form-control mx-2" /> </label><br />

            <label class="form-label mx-2" for="mobile">
                Mobile
                <input type="text" class="form-control mx-2" name="mobile" /> </label><br />
            <button type="button" class="btn btn-info mx-2">Submit</button>
        </div>

    </div>
</template>

<script>
import axios from "axios";

export default {
    // name: "create-student",
    props: ['id'],
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


    mounted() {

      // console.log(this.$route.params.id);
       console.log(this.id); // outputs the id value
        //this.getStudentData(this.$route.params.id);
        this.getStudentData(this.id);
        
    },

    methods: {
        saveStudent() {
            var mythis = this;

            axios
                .post('http://localhost:8000/students', this.model.student)
                .then(res => {
                    alert(res.data.message);
                    this.model.student = {
                        name: "",
                        course: "",
                        email: "",
                        phone: ""
                    };
                    // console.log(this.model.student);
                    // console.log(res);
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

        getStudentData(id) {
            axios.get(`http://localhost:8000/students/4/edit`)
            .then(
                res => {
                    console.log(res);

                     this.model.student = res.data.student; //use this if you have specified the same fields in the database as the object or model student
                    
                    //or just specify your fields and database fields 
                    
                    // this.model.student.name = res.data.student.name;
                    // this.model.student.course = res.data.student.course;
                    // this.model.student.email = res.data.student.email;
                    // this.model.student.phone = res.data.student.phone;
                }
            );
        }
    },
};
</script>
