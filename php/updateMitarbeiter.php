<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$Personalnummer = '';
if(isset($_POST['Personalnummer'])){
    $Personalnummer = $_POST['Personalnummer'];
}

$Name = '';
if(isset($_POST['Name'])){
    $Name = $_POST['Name'];
}

$geburtsdatum = '';
if(isset($_POST['geburtsdatum'])){
    $geburtsdatum = $_POST['geburtsdatum'];
}

$id_nummer = '';
if(isset($_POST['id_nummer'])){
    $id_nummer = $_POST['id_nummer'];
}


// Insert method
$success = $database->UpdateMitarbeiter($Personalnummer, $Name, $geburtsdatum, $id_nummer);

// Check result
if ($success){

    echo "Mitarbeiter '{$Personalnummer} {$Name} {$geburtsdatum} {$id_nummer}' successfully updated!";
}
else{
    echo "Error can't update Mitarbeiter '{$Personalnummer} {$Name} {$geburtsdatum} {$id_nummer}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>