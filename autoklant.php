<?php
include 'db.php';

$db = new Database();

$cars = $db->getAllCars();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Information</title>
    <link rel="stylesheet" href="autoklant.css">
</head>
<body>
<header>
    <img src="car_rental_2_go.png" alt="...">
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="autoklant.php">Autos</a>
    <a href="admin1.php">Verhuren</a>
    <a href="#">meer over onze</a>
    <a href="#">Inloggen</a>
</nav>

<div class="car-container">
    <?php
    if ($cars) {
        foreach ($cars as $car) {
            $autoID = $car['AutoID'];
            $merk = $car['Merk'];
            $model = $car['Model'];
            $jaar = $car['Jaar'];
            $kenteken = $car['Kenteken'];
            $beschikbaarheid = $car['Beschikbaarheid'];
            $foto = $car['foto'];

            echo "<div class='car-info'>";
           ;
            echo "<p>Merk: $merk</p>";
            echo "<p>Model: $model</p>";
            echo "<p>Jaar: $jaar</p>";
            echo "<p>Kenteken: $kenteken</p>";
            echo "<p>Beschikbaarheid: $beschikbaarheid</p> </br>";
            echo "<a href='verhuring.php?autoID=$autoID' class='reserve-button'>Reserveren</a>";

            echo "</div>";
            
            // Display the image below the text
            echo "<div class='car-image'>";
            echo "<img src='$foto' alt='Car Photo'>";
            echo "</div>";
        }
    } else {
        echo "<p>No cars found!</p>";
    }
    ?>
</div>

</body>
</html>
