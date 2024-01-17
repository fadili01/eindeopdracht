<?php
include 'db.php';

$db = new Database();
$users = $db->selectAllklanten();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klantenoverzicht</title>
    <link rel="stylesheet" href="styleauto.css">
</head>
<body>
    
<nav>
    <a href="admin1.php">terug</a>
</nav>

    <table class="table dark">
        <tr>
            <th>kantID</th>
            <th>naam</th>
            <th>achternaam</th>
            <th>geboortedatum</th>
            <th>email</th>
            <th>wachtwoord</th>
            <th colspan="2">Action</th>
        </tr>

        <?php
        if ($users) { 
            foreach ($users as $user) {?>
            <tr>
                <td><?php echo $user['KlantID'];?></td>
                <td><?php echo $user['naam']?></td>
                <td><?php echo $user['achternaam']?></td>
                <td><?php echo $user['geboortedatum']?></td>
                <td><?php echo $user['email']?></td>
                <td><?php echo $user['wachtwoord']?></td>
                <td><a href="editeklant.php?id=<?php echo $user['KlantID']; ?>">Edit</a></td>
                <td><a href="deleteklant.php?id=<?php echo $user['KlantID']; ?>">Delete</a></td>
            </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>
