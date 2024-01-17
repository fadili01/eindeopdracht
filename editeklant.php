<?php
include 'db.php';

try {
    $db = new Database();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $naam = $_POST['naam'];
        $achternaam = $_POST['achternaam'];
        $geboortedatume = $_POST['geboortedatume'];
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];

        // Retrieve klantID from the query parameters
        $klantID = $_GET['id'];

        // Convert the date to the correct format
        $geboortedatum = date('Y-m-d', strtotime($geboortedatume));

        // Update the klant information
        $db->updateklant($naam, $achternaam, $geboortedatum, $email, $wachtwoord, $klantID);

        // Redirect to the klantenoverzicht.php page after the update
        header("Location: klantenoverzicht.php");
        exit();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Klant</title>
    <style>
        /* Your styles here */
        body {
            background-color: #f0f8f0; 
            color: #a8a8a8;; 
            font-family: Arial, sans-serif;
        }

        nav a {
            color: white; 
            text-decoration: none;
            background-color: #4caf50;
            padding: 10px;
            border: 2px solid #4caf50; 
            border-radius: 5px;
            margin: 10px;
        }

        nav a:hover {
            background-color: #4caf50; 
            color: #f0f8f0; 
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 51, 0, 0.1); 
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #4caf50; /* dark green */
            border-radius: 5px;
            box-sizing: border-box;
            
        }

        input[type="submit"] {
            background-color: #003300; /* dark green */
            color: #f0f8f0; /* light green */
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4caf50; /* green */
        }
    </style>
</head>
<body>
<nav>
    <a href="klantenoverzicht.php">terug</a>
</nav>
<form method="POST">
    <input type="text" name="naam" placeholder="naam"> <br> 
    <input type="text" name="achternaam" placeholder="achternaam"> <br>
    <input type="date" name="geboortedatume" placeholder="geboortedatume"> <br>
    <input type="text" name="email" placeholder="email"> <br>
    <input type="password" name="wachtwoord" placeholder="wachtwoord"> <br>
    <input type="submit">
</form>
</body>
</html>



