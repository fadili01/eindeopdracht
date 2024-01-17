<?php
include 'db.php';

$conn = new Database(); // Create an instance of the Database class

// Assuming you have a function to get a specific car by ID
if (isset($_GET['autoID'])) {
    $autoID = $_GET['autoID'];
    $car = $conn->getCarByID($autoID); // Use $conn instead of $db

    if ($car) {
        // Display car information here

        // Form for reservation
        echo "<form action='process_reservation.php' method='post'>";
        echo "<label for='start_date'>Start Date:</label>";
        echo "<input type='date' name='start_date' required>";

        echo "<label for='end_date'>End Date:</label>";
        echo "<input type='date' name='end_date' required>";

        echo "<input type='hidden' name='autoID' value='$autoID'>";

        echo "<input type='submit' value='Reserve Now'>";
        echo "</form>";

    } else {
        echo "<p>Car not found!</p>";
    }
} else {
    echo "<p>AutoID not provided!</p>";
}

$pso->closeConnection(); // Close the database connection when done
?>
