<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request

$Adresse = '';
if(isset($_POST['Adresse'])){
    $Adresse = $_POST['Adresse'];
}

$Anzahl_Mitarbeiter = '';
if(isset($_POST['Anzahl_Mitarbeiter'])){
    $Anzahl_Mitarbeiter = $_POST['Anzahl_Mitarbeiter'];
}

$AG_nummer = '';
if(isset($_POST['AG_nummer'])){
    $AG_nummer = $_POST['AG_nummer'];
}


// Insert method
$success = $database->insertIntoFiliale($Adresse, $Anzahl_Mitarbeiter, $AG_nummer);

// Check result
if ($success){

    echo "Filiale '{$Adresse} {$Anzahl_Mitarbeiter} {$AG_nummer}' successfully added!";
}
else{
    echo "Error can't insert Filiale '{$Adresse} {$Anzahl_Mitarbeiter} {$AG_nummer}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>