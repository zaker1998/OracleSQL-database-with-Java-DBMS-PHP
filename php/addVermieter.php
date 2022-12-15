<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$AG_nummer = '';
if(isset($_POST['AG_nummer'])){
    $AG_nummer = $_POST['AG_nummer'];
}

$Gruendungsjahr = '';
if(isset($_POST['Gruendungsjahr'])){
    $Gruendungsjahr = $_POST['Gruendungsjahr'];
}

$PLZ = '';
if(isset($_POST['PLZ'])){
    $PLZ = $_POST['PLZ'];
}

$Strasse = '';
if(isset($_POST['Strasse'])){
    $Strasse = $_POST['Strasse'];
}


// Insert method
$success = $database->insertIntoVermieter($AG_nummer, $Gruendungsjahr, $PLZ, $Strasse);

// Check result
if ($success){

    echo "Vermieter '{$AG_nummer} {$Gruendungsjahr} {$PLZ} {$Strasse}' successfully added!";
}
else{
    echo "Error can't insert Vermieter '{$AG_nummer} {$Gruendungsjahr} {$PLZ} {$Strasse}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>