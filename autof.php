<?php
include 'db.php';
$db = new Database();
$pdo = $db->pdo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $merk = $_POST["merk"];
    $model = $_POST["model"];
    $jaar = $_POST["jaar"];
    $kenteken = $_POST["kenteken"];
    $beschikbaarheid = $_POST["beschikbaarheid"];

    // File upload handling
    $uploadDirectory = "uploads/";  // Specify your upload directory
    $uploadFile = $uploadDirectory . basename($_FILES["foto"]["name"]);

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadFile)) {
        // File uploaded successfully, now insert data into the database
        $db->addCar($merk, $model, $jaar, $kenteken, $beschikbaarheid, $uploadFile);

        header("Location: autooverzicht.php");
        exit();
    } else {
        echo "Error uploading file.";
    }
    if (isset($_FILES["foto"]) && is_uploaded_file($_FILES["foto"]["tmp_name"])) {
        // Proceed with file handling
    } else {
        echo "No file uploaded.";
    }
    
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klant toevoegen</title>
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
    
    
</nav>


    <form method="post" enctype="multipart/form-data" >
        <h2>Auto Toevoegen</h2>
        <label for="merk">Merk:</label>
        <input type="text" name="merk" id="merk" placeholder="Merk" required>

        <label for="model">Model:</label>
        <input type="text" name="model" id="model" placeholder="Model" required>

        <label for="jaar">Jaar:</label>
        <input type="text" name="jaar" id="jaar" placeholder="Jaar" required>

        <label for="kenteken">Kenteken:</label>
        <input type="text" name="kenteken" id="kenteken" placeholder="Kenteken" required>

        <label for="beschikbaarheid">Beschikbaarheid:</label>
        <input type="text" name="beschikbaarheid" id="beschikbaarheid" placeholder="Beschikbaarheid" required>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" accept="image/*" required><br><br> 

        <input type="submit" value="Toevoegen">
    </form>
   

</body>
</html>
