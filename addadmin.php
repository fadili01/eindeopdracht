
<?php
    include 'db.php';

    try {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = htmlspecialchars($_POST['email']);
        $db = new Database();
        $user = $db->login($email);

        if ($user) {
            $wachtwoord = $_POST['password'];
            $verify = password_verify($wachtwoord, $user['wachtwoord']);
            if ($user && $wachtwoord == $verify) {
                session_start();
                $_SESSION['userId'] = $user['id'];
                $_SESSION['naam'] = $user['naam'];
                $_SESSION['role'] = $user['role'];
                header('Location:home.php?ingelogd');
            } else {
                echo "incorrect username or email";
            }
        } else {
            echo "incorrect username or email";
        }
    }
    } catch (\Exception $e) {
        echo $e->getMessage();
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
    <h1>Voeg admin toe</h1>
    <input type="text" name="naam" placeholder="Naam"> <br> 
    <input type="text" name="achternaam" placeholder="Achternaam"> <br> 
    <input type="text" name="email" placeholder="Email"> <br> 
    <input type="password" name="wachtwoord" placeholder="Wachtwoord"> <br><br>
    <input type="submit">
</form>

</body>
</html>