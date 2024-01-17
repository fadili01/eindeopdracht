<?php
include 'db.php';

$db = new Database();
$users = $db->selectAllcars();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleauto.css">
</head>
<body>
    
<nav>
    <a href="admin1.php">terug</a>
</nav>

    <table class="table dark">
        <tr>
            <th>autoID</th>
            <th>merk</th>
            <th>medel</th>
            <th>jaar</th>
            <th>kenteken</th>
            <th>beschikbaarheid</th>
            <th colspan="2">Action</th>
        </tr>

        <?php
        $users = $db->selectAllcars(); 
        if ($users) { 
            foreach ($users as $user) {?>
            <tr>
                <td><?php echo $user['AutoID'];?></td>
                <td><?php echo $user['Merk']?></td>
                <td><?php echo $user['Model']?></td>
                <td><?php echo $user['Jaar']?></td>
                <td><?php echo $user['Kenteken']?></td>
                <td><?php echo $user['Beschikbaarheid']?></td>
                <td><a href="edit.php?id=<?php echo $user['AutoID']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $user['AutoID']; ?>">Delete</a></td>
            </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>
