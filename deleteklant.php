<?php
include 'db.php';

try {
    $db = new Database();

    // Check if the 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $klantID = $_GET['id'];
        echo "Gebruiker met ID verwijderen: $klantID<br>";
        $db->deleteklant($klantID);
        header("Location: klantenoverzicht.php");
    } else {
        echo "Gebruiker ID niet opgegeven.";
    }
} catch (Exception $e) {
    echo "Fout: " . $e->getMessage();
}
?>
