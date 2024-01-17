<?php
    include 'db.php';

    try {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = htmlspecialchars($_POST['email']);
        $db = new Database();
        $user = $db->loginadmin($email);

        if ($user) {
            $wachtwoord = $_POST['password'];
            $verify = password_verify($wachtwoord, $user['wachtwoord']);
            if ($user && $wachtwoord == $verify) {
                session_start();
                $_SESSION['userId'] = $user['id'];
                $_SESSION['naam'] = $user['naam'];
                $_SESSION['role'] = $user['role'];
                header('Location:index.php?ingelogd');
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
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
<header>
    <img src="car_rental_2_go.png" alt="..." st>
</header>


<h1>Login</h1>
<div class= "login">
    <form method="POST">
        <div class="mb-3">
            <label for="email" class="email">Email address</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="email">
        </div>
        <div class="mb-3">
            <label for="password" class="password">Password</label>
            <input type="password" name="password" class="password" id="password">
        </div>
        <button type="submit">inloggen</button>
    </form>

</div>

</body>
</html>
<footer>
    <p>&copy; 2023 Rent a Car</p>
</footer>

</body>
</html>