<?php
include 'db.php';

$conn = new Database(); // Create an instance of the Database class

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autoID = $_POST['autoID'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Perform validation and calculate costs based on the rental period
    // Placeholder calculation, replace it with your logic
    $calculatedCosts = 100; // Replace with your actual cost calculation logic

    // Assuming you have a function to insert a reservation into the database
    $conn->insertReservation($autoID, $start_date, $end_date, $calculatedCosts);

    echo "<p>Reservation successful! Costs: $calculatedCosts €</p>";
} else {
    echo "<p>Invalid request!</p>";
}

?>
