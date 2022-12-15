<?php

// Include DatabaseHelper.php file and variables
require_once('DatabaseHelper.php');
require_once('variable.php');

// Instantiate DatabaseHelper class
$database = new DatabaseHelper();

// Get parameter 'person_id', 'Gruendungsjahr' and 'name' from GET Request
// Btw. you can see the parameters in the URL if they are set


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


<h2>Add Vermieter: </h2>
<form method="post" action="addVermieter.php">


    <div>
        <label for="new_PLZ">PLZ:</label>
        <input id="new_PLZ" name="PLZ" type="number">
    </div>
    <br>


    <div>
        <label for="new_Gruendungsjahr">Gruendungsjahr:</label>
        <input id="new_Gruendungsjahr" name="Gruendungsjahr" type="number">
    </div>
    <br>


    <div>
        <label for="new_Strasse">Strasse:</label>
        <input id="new_Strasse" name="Strasse" type="text">
    </div>
    <br>


    <div>
        <label for="new_AG_nummer">AG_nummer:</label>
        <input id="new_AG_nummer" name="AG_nummer" type="number">
    </div>
    <br>

 
    <div>
        <button class="btn btn-primary"  type="submit">
            Add Vermieter
        </button>
    </div>
</form>


<h2>Add Filiale: </h2>
<form method="post" action="addFiliale.php">
 


    <div>
        <label for="new_Adresse">Adresse:</label>
        <input id="new_Adresse" name="Adresse" type="text">
    </div>
    <br>
	
	<div>
        <label for="new_Anzahl_Mitarbeiter">Anzahl_Mitarbeiter:</label>
        <input id="new_Anzahl_Mitarbeiter" name="Anzahl_Mitarbeiter" type="number">
    </div>
    <br>
	
	<div>
        <label for="new_AG_nummer">AG_nummer:</label>
        <input id="new_AG_nummer" name="AG_nummer" type="number">
    </div>
    <br>

    <div>
        <button class="btn btn-primary"  type="submit">
            Add Filiale
        </button>
    </div>
</form>



<h2>Add Filiale Parkplatz: </h2>
<form method="post" action="addFiliale_Parkplatz.php">


    <div>
        <label for="new_id_nummer">id_nummer:</label>
        <input id="new_id_nummer" name="id_nummer" type="number">
    </div>
    <br>

	<div>
        <label for="new_Zertifizierungsnummer">Zertifizierungsnummer:</label>
        <input id="new_Zertifizierungsnummer" name="Zertifizierungsnummer" type="number">
    </div>
    <br>
	
	<div>
        <label for="new_Fassungsvermoegen">Fassungsvermoegen:</label>
        <input id="new_Fassungsvermoegen" name="Fassungsvermoegen" type="number">
    </div>
    <br>
	
	<div>
        <label for="new_Anzahl_Ebenen">Anzahl_Ebenen:</label>
        <input id="new_Anzahl_Ebenen" name="Anzahl_Ebenen" type="number">
    </div>
    <br>
  
    <div>
        <button class="btn btn-primary"  type="submit">
            Add Filiale Parkplatz
        </button>
    </div>
</form>



<h2>Add Auto: </h2>
<form method="post" action="addAuto.php">


    <div>
        <label for="new_Motorseriennummer">Motorseriennummer:</label>
        <input id="new_Motorseriennummer" name="Motorseriennummer" type="number">
    </div>
    <br>


    <div>
        <label for="new_Zertifizierungsnummer">Zertifizierungsnummer:</label>
        <input id="new_Zertifizierungsnummer" name="Zertifizierungsnummer" type="number">
    </div>
    <br>
	
	<div>
        <label for="new_Klasse">Klasse:</label>
        <input id="new_Klasse" name="Klasse" type="text">
    </div>
    <br>
	
	<div>
        <label for="new_Vermietungspreis">Vermietungspreis</label>
        <input id="new_Vermietungspreis" name="Vermietungspreis" type="number">
    </div>
    <br>
	
	<div>
        <label for="new_id_nummer">id_nummer</label>
        <input id="new_id_nummer" name="id_nummer" type="number">
    </div>
    <br>


    <div>
        <button class="btn btn-primary"  type="submit">
            Add Auto
        </button>
    </div>
</form>


<h2>Add Mitarbeiter: </h2>
<form method="post" action="addMitarbeiter.php">

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


    <div>
        <button class="btn btn-primary"  type="submit">
            Add Mitarbeiter
        </button>
    </div>
</form>


</body>
</html>