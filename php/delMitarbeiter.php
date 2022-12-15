<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$Personalnummer = '';
if(isset($_POST['Personalnummer'])){
    $Personalnummer = $_POST['Personalnummer'];
}

// Delete method
$error_code = $database->deleteMitarbeiter( $Personalnummer);

// Check result
if ($error_code == 1){
    echo "Person with ID: '{$Personalnummer}' successfully deleted!'";
}
else{
    echo "Error can't delete Person with ID: '{$Personalnummer}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>