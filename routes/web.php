<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view("dashboard","dashboard")->name("dashboard");

// Route::view("edit-student","edit-student")->name("edit-student");

//Route::view("students/{id}/edit","edit-student")->name("edit-student");



Route::view("all-students","all-students")->name("all-students");

Route::get('add-entry', function () {
    return view('add-entry');
});

Route::get('create-student', function () {
    return view('create-student');
});
//create a record
Route::post("students",[StudentController::class,"store"]);
//list all records from database
Route::get("students",[StudentController::class,"index"]);
//getting by id
Route::get("students/{id}",[StudentController::class,"show"]);

//edit a record
//Route::get("students/{id}/edit",[StudentController::class,"edit"]);

//edits the record and update
Route::put("students/{id}/edit",[StudentController::class,"update"]);
//deletes a record
Route::delete("students/{id}/delete",[StudentController::class,"destroy"]);



// Route::get("create-student", function(){
//     return "Create Students Page";
// });

//get will return the function from the server where priority is given to server response
//view is used to display the template thereby giving priority to frontend
//if you declare a Route::view and Route::get, get will take precedence

// Route::get("students", function(){
//     return "Welcome To Students Page";
// });

// Route::get("dashboard", function(){
//     return "Dasboards Students Page";
// });