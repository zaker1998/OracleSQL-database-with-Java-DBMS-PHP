<?php
// Get parameter from GET Request
// Btw. you can see the parameters in the URL if they are set

//Vermieter variable
$AG_nummer = '';
if (isset($_GET['AG_nummer'])) {
    $AG_nummer = $_GET['AG_nummer'];
}

$Gruendungsjahr = '';
if (isset($_GET['Gruendungsjahr'])) {
    $Gruendungsjahr = $_GET['Gruendungsjahr'];
}

$PLZ = '';
if (isset($_GET['PLZ'])) {
    $PLZ = $_GET['PLZ'];
}

$Strasse = '';
if (isset($_GET['Strasse'])) {
    $Strasse = $_GET['Strasse'];
}

//Filiale variable
$id_nummer = '';
if (isset($_GET['id_nummer'])) {
    $id_nummer = $_GET['id_nummer'];
}

$Adresse = '';
if (isset($_GET['Adresse'])) {
    $Adresse = $_GET['Adresse'];
}

$Anzahl_Mitarbeiter = '';
if (isset($_GET['Anzahl_Mitarbeiter'])) {
    $Anzahl_Mitarbeiter = $_GET['Anzahl_Mitarbeiter'];
}

//Filiale_Parkplatz variable
$Zertifizierungsnummer = '';
if (isset($_GET['Zertifizierungsnummer'])) {
    $Zertifizierungsnummer = $_GET['Zertifizierungsnummer'];
}

$Fassungsvermoegen = '';
if (isset($_GET['Fassungsvermoegen'])) {
    $Fassungsvermoegen = $_GET['Fassungsvermoegen'];
}

$Anzahl_Ebenen = '';
if (isset($_GET['Anzahl_Ebenen'])) {
    $Anzahl_Ebenen = $_GET['Anzahl_Ebenen'];
}

//Auto variable

$Motorseriennummer = '';
if (isset($_GET['Motorseriennummer'])) {
    $Motorseriennummer = $_GET['Motorseriennummer'];
}

$Klasse = '';
if (isset($_GET['Klasse'])) {
    $Klasse = $_GET['Klasse'];
}

$Vermietungspreis = '';
if (isset($_GET['Vermietungspreis'])) {
    $Vermietungspreis = $_GET['Vermietungspreis'];
}

//Mitarbeiter variable
$Personalnummer = '';
if (isset($_GET['Personalnummer'])) {
    $Personalnummer = $_GET['Personalnummer'];
}

$Name = '';
if (isset($_GET['Name'])) {
    $Name = $_GET['Name'];
}

$geburtsdatum = '';
if (isset($_GET['geburtsdatum'])) {
    $geburtsdatum = $_GET['geburtsdatum'];
}
?>