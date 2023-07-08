<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'testDB';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert sample records into the person table
$query = "INSERT INTO person (firstName, lastName) VALUES
    ('John', 'Doe'),
    ('Jane', 'Smith'),
    ('Michael', 'Johnson'),
    ('Emily', 'Davis'),
    ('David', 'Wilson'),
    ('Sarah', 'Anderson')";
$conn->query($query);

// Insert sample records into the room table
$query = "INSERT INTO room () VALUES
    (),
    (),
    (),
    (),
    (),
    ()";
$conn->query($query);

// Get the IDs of the inserted rooms
$roomIDs = $conn->insert_id;

// Insert sample records into the reservation table
$query = "INSERT INTO reservation (roomID, clientID, startDate, endDate) VALUES
    ($roomIDs-5, 1, '2023-07-08', '2023-07-12'),
    ($roomIDs-4, 2, '2023-07-09', '2023-07-15'),
    ($roomIDs-3, 3, '2023-07-10', '2023-07-13'),
    ($roomIDs-2, 4, '2023-07-11', '2023-07-14'),
    ($roomIDs-1, 5, '2023-07-12', '2023-07-17'),
    ($roomIDs, 6, '2023-07-13', '2023-07-16')";
$conn->query($query);

echo "Sample records inserted successfully!";
?>
