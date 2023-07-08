<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'testDB';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve clients from the database
$query = "SELECT clientID, firstName, lastName FROM person";
$clientsResult = $conn->query($query);

// Retrieve available rooms
$query = "SELECT roomID FROM room";
$roomsResult = $conn->query($query);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Add Reservation</title>
    <style>
        label {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Add Reservation</h2>
    <form action="process_reservation.php" method="POST">
        <label for="clientID">Client:</label>
        <select name="clientID" id="clientID">
            <?php
            if ($clientsResult->num_rows > 0) {
                while ($row = $clientsResult->fetch_assoc()) {
                    echo "<option value=\"" . $row["clientID"] . "\">" . $row["firstName"] . " " . $row["lastName"] . "</option>";
                }
            }
            ?>
        </select>

        <label for="roomID">Room:</label>
        <select name="roomID" id="roomID">
            <?php
            if ($roomsResult->num_rows > 0) {
                while ($row = $roomsResult->fetch_assoc()) {
                    echo "<option value=\"" . $row["roomID"] . "\">" . $row["roomID"] . "</option>";
                }
            }
            ?>
        </select>

        <label for="startDate">Start Date:</label>
        <input type="date" name="startDate" id="startDate">

        <label for="endDate">End Date:</label>
        <input type="date" name="endDate" id="endDate">

        <input type="submit" value="Add Reservation">
    </form>
</body>
</html>
