<?php
include 'db.php';

$db = new Database();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naam = $_POST['naam'];
    $achternaam = $_POST['achternaam'];
    $geboortedatum = $_POST['geboortedatum'];
    $email = $_POST['email'];
    $hash = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

    // voer de functie addklant uit en sla de return waarde op.
    $insertId = $db->addklant($naam, $achternaam, $geboortedatum, $email, $hash);
    
    // print de lastInsertId
    echo "Successfully added " . $insertId;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleautoF.css">
</head>
<body>
<header>
    <img src="car_rental_2_go.png" alt="...">
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="autooverzicht.php">Autos bekijk</a>
    <a href="klantenoverzicht.php">klant bekijken</a>
    <a href="autof.php">Autos tevoegen </a>
    <a href="addklant.php">klant toevoegen</a>
    <a href="admin1.php">Verhuren</a>
    <a href="#">meer over onze</a>
    
</nav>

<form method="POST">
    <h1>Voeg klant toe</h1>
    <input type="text" name="naam" placeholder="Naam"> <br> 
    <input type="text" name="achternaam" placeholder="Achternaam"> <br> 
    <input type="text" name="geboortedatum" placeholder="Geboortedatum"> <br> 
    <input type="text" name="email" placeholder="Email"> <br> 
    <input type="password" name="wachtwoord" placeholder="Wachtwoord"> <br><br>
    <input type="submit">
</form>

</body>
</html>