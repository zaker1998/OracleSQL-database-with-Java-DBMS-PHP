<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$Motorseriennummer = '';
if(isset($_POST['Motorseriennummer'])){
    $Motorseriennummer = $_POST['Motorseriennummer'];
}

$Zertifizierungsnummer = '';
if(isset($_POST['Zertifizierungsnummer'])){
    $Zertifizierungsnummer = $_POST['Zertifizierungsnummer'];
}

$Klasse = '';
if(isset($_POST['Klasse'])){
    $Klasse = $_POST['Klasse'];
}

$Vermietungspreis = '';
if(isset($_POST['Vermietungspreis'])){
    $Vermietungspreis = $_POST['Vermietungspreis'];
}

$id_nummer = '';
if(isset($_POST['id_nummer'])){
    $id_nummer = $_POST['id_nummer'];
}


// Insert method
$success = $database->insertIntoAuto($Motorseriennummer, $Zertifizierungsnummer, $Klasse, $Vermietungspreis, $id_nummer);

// Check result
if ($success){

    echo "Auto '{$Motorseriennummer} {$Zertifizierungsnummer} {$Klasse} {$Vermietungspreis} {$id_nummer}' successfully added!";
}
else{
    echo "Error can't insert Auto '{$Motorseriennummer} {$Zertifizierungsnummer} {$Klasse} {$Vermietungspreis} {$id_nummer}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>