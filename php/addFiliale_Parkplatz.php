<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$id_nummer = '';
if(isset($_POST['id_nummer'])){
    $id_nummer = $_POST['id_nummer'];
}

$Zertifizierungsnummer = '';
if(isset($_POST['Zertifizierungsnummer'])){
    $Zertifizierungsnummer = $_POST['Zertifizierungsnummer'];
}

$Fassungsvermoegen = '';
if(isset($_POST['Fassungsvermoegen'])){
    $Fassungsvermoegen = $_POST['Fassungsvermoegen'];
}

$Anzahl_Ebenen = '';
if(isset($_POST['Anzahl_Ebenen'])){
    $Anzahl_Ebenen = $_POST['Anzahl_Ebenen'];
}


// Insert method
$success = $database->insertIntoFiliale_Parkplatz($id_nummer, $Zertifizierungsnummer, $Fassungsvermoegen, $Anzahl_Ebenen);

// Check result
if ($success){

    echo "Filiale_Parkplatz '{$id_nummer} {$Zertifizierungsnummer} {$Fassungsvermoegen} {$Anzahl_Ebenen}' successfully added!";
}
else{
    echo "Error can't insert Filiale_Parkplatz '{$id_nummer} {$Zertifizierungsnummer} {$Fassungsvermoegen} {$Anzahl_Ebenen}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>