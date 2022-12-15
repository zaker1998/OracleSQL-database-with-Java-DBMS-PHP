<?php
// Include DatabaseHelper.php file and variables
require_once('DatabaseHelper.php');
require_once('variable.php');

// Instantiate DatabaseHelper class
$database = new DatabaseHelper();


//Fetch data from database
$auto_array = $database->selectAllAuto($Motorseriennummer, $Zertifizierungsnummer, $Klasse, $Vermietungspreis);
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


<h2>Auto Search:</h2>
<form method="get">

    <div>
        <label for="Motorseriennummer">Motorseriennummer:</label>
        <input id="Motorseriennummer" name="Motorseriennummer" type="number" value='<?php echo $Motorseriennummer; ?>' min="0">
    </div>
    <br>


    <div>
        <label for="Klasse">Klasse:</label>
        <input id="Klasse" name="Klasse" type="text" value='<?php echo $Klasse; ?>'
               maxlength="20">
    </div>
    <br>


    <div>
        <label for="Zertifizierungsnummer">Zertifizierungsnummer:</label>
        <input id="Zertifizierungsnummer" name="Zertifizierungsnummer" type="number"
               value='<?php echo $Zertifizierungsnummer; ?>' maxlength="20">
    </div>
    <br>
	
	<div>
        <label for="Vermietungspreis">Vermietungspreis:</label>
        <input id="Vermietungspreis" name="Vermietungspreis" type="number"
               value='<?php echo $Vermietungspreis; ?>' maxlength="20">
    </div>
    <br>


    <div>
        <button id='submit' type='submit'>
            Search
        </button>
    </div>
</form>
<br>
<hr>

<!-- Search result -->
<h2>Person Search Result:</h2>
<table>
    <tr>
        <th>Motorseriennummer</th>
        <th>Klasse</th>
        <th>Zertifizierungsnummer</th>
		<th>Vermietungspreis</th>
    </tr>
    <?php foreach ($auto_array as $auto) : ?>
        <tr>
            <td><?php echo $auto['Motorseriennummer']; ?>  </td>
            <td><?php echo $auto['Klasse']; ?>  </td>
            <td><?php echo $auto['Zertifizierungsnummer']; ?>  </td>
			<td><?php echo $auto['Vermietungspreis']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>