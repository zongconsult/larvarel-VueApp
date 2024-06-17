<template>
    <div>
        <div class="card mt-5 mx-2">
            <h4>List of All Students</h4>
            <button class="btn btn-lg btn-info mb-3" type="button">Add Student</button>

            <table class="table table-hover table-border table-striped">
                <thead class="table-head">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th class="float-center">Actions</th>
                </thead>


                <tbody v-if="this.Students.length > 0">

                    <!-- <tr v-for="(student, index) in this.students" :key= "index"></tr> -->
                    <!-- <tr v-for="student in this.Students" :key="student.id"> -->
                        <tr v-for="(student , index) in this.Students" :key="index">
                        <td>{{ student.id }}</td>
                        <td>{{ student.name }}</td>
                        <td>{{ student.course }}</td>
                        <td>{{ student.email }}</td>
                        <td>{{ student.phone }}</td>
                        <!-- <td>{{ student }}</td> -->
                        <!-- <td>{{ console.log(student) }}</td> -->
                        <td class="">
                            <div class="float-end mx-2">
                              <a type="button" href="students/4/edit" class="btn btn-lg btn-success mx-2">
                                Edit
                              </a>
                            <button type="button" class="btn btn-lg btn-warning mx-2">
                                View
                            </button>
                            <button type="button" class="btn btn-lg btn-danger mx-2">
                                Delete
                            </button>  
                            </div>
                            
                        </td>
                    </tr>
                </tbody>
                <tbody v-else="">

                    <tr>
                        <td colspan="7">Loading your data </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
//import { ref, onMounted } from "vue";

export default {

    name:'students',

    data() {
        
        return {
            Students:[]
            
        } 
    
    },

    mounted() {
        this.getStudents();
       // console.log("Mounted Successfully");
        //console.log( this.Students);
        
    },

    methods: {

        getStudents() {
            axios.get('http://localhost:8000/students').
                then( res => {

                    //this.Students = res.data; //wasn't working because the students was contained in data in the respose
                    this.Students = res.data.students; //now getting students from data in response
                 //  this.$forceUpdate();
                 //  console.log(this.Students);
                // console.log(res);

                });
        }

    }

}
</script>
