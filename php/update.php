<?php

// Include DatabaseHelper.php file and variables
require_once('DatabaseHelper.php');
require_once('variable.php');

// Instantiate DatabaseHelper class
$database = new DatabaseHelper();


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Home</title>
    </head>
    <body>
        <!--Navigation bar--> 
        <header>
            <nav class="navbar navbar-expand-md fixed-top navbar-light" style="background-color: #97a1b4e3;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        
                        PHP Project
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" aria-current="page" href="index.php">Create</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="delete.php">Delete</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="search.php">Read</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="update.php">Update</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


<br><br>



<h2>Update Mitarbeiter: </h2>
<form method="post" action="updateMitarbeiter.php">


    <div>
        <label for="new_Personalnummer">Personalnummer:</label>
        <input id="new_Personalnummer" name="Personalnummer" type="number">
    </div>
    <br>

    <div>
        <label for="new_Name">Name:</label>
        <input id="new_Name" name="Name" type="text">
    </div>
    <br>
	
	<div>
        <label for="new_geburtsdatum">geburtsdatum:</label>
        <input id="new_geburtsdatum" name="geburtsdatum" type="date">
    </div>
    <br>
	
	<div>
        <label for="new_id_nummer">id_nummer</label>
        <input id="new_id_nummer" name="id_nummer" type="number">
    </div>
    <br>



    <!-- Submit button -->
    <div>
        <button type="submit">
            Update Mitarbeiter
        </button>
    </div>
</form>


</body>
</html>