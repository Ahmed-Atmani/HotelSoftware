<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'testDB';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientID = $_POST["clientID"];
    $roomID = $_POST["roomID"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // Insert the reservation into the database
    $query = "INSERT INTO reservation (roomID, clientID, startDate, endDate) 
              VALUES ('$roomID', '$clientID', '$startDate', '$endDate')";
    
    if ($conn->query($query) === TRUE) {
        echo "Reservation added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>
