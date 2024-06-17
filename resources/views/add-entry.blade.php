<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    @vite(['resources/css/bootstrap.css','resources/js/app.js'])

    </head>


    <body class="font-sans antialiased dark:bg-black dark:text-white/50" id="app">
 
    <div class="container" >

<!-- 
    <div class="card">
    <h4>Add A Student to Database</h4>
    <div class="form">

    <label>Student Name:
        <input type="text" class="form-control">
    </label> <br>

    <label>Course:
        <input type="text" class="form-control">
    </label><br>


    <label>Email:
        <input type="text" class="form-control">
    </label><br>


    <label>Mobile:
        <input type="text" class="form-control">
    </label><br>

    <label>
        <button type="button" class="form-control btn btn-warning">Submit</button>
    </label>


    </div>


    </div> -->


    <add-entry></add-entry>


    </div>


    </body>
</html>
