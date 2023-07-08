<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'testDB';

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection success";

// Create the database if it doesn't exist
$query = "CREATE DATABASE IF NOT EXISTS $database";
$conn->query($query);

// Select the database
$conn->select_db($database);

// Create the person table
$query = "CREATE TABLE IF NOT EXISTS person (
    clientID INT(11) NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    PRIMARY KEY (clientID)
)";
$conn->query($query);

// Create the room table
$query = "CREATE TABLE IF NOT EXISTS room (
    roomID INT(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (roomID)
)";
$conn->query($query);

// Create the reservation table
$query = "CREATE TABLE IF NOT EXISTS reservation (
    reservationID INT(11) NOT NULL AUTO_INCREMENT,
    roomID INT(11) NOT NULL,
    clientID INT(11) NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    PRIMARY KEY (reservationID),
    FOREIGN KEY (roomID) REFERENCES room(roomID),
    FOREIGN KEY (clientID) REFERENCES person(clientID)
)";
$conn->query($query);

echo "Done with everything"
?>