<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Main Interface</title>
    
</head>
<body>
    <h2>Main Interface</h2>
    <p>Welcome, <?php echo $_SESSION["username"]; ?>!</p>
    <a href="add_reservation.php">Add Reservation</a>
</body>
</html>
