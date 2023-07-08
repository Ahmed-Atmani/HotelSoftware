<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'testDB';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT r.roomID, p.firstName, p.lastName, res.startDate, res.endDate
          FROM reservation AS res
          JOIN room AS r ON res.roomID = r.roomID
          JOIN person AS p ON res.clientID = p.clientID";
$result = $conn->query($query);

$reservations = array();
while ($row = $result->fetch_assoc()) {
    $reservations[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Reservations Calendar</title>
    <!-- <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style> -->
</head>
<body>
    <h2>Reservations Calendar</h2>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Room ID</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
        <?php foreach ($reservations as $reservation) { ?>
            <tr>
                <td><?php echo $reservation["firstName"]; ?></td>
                <td><?php echo $reservation["lastName"]; ?></td>
                <td><?php echo $reservation["roomID"]; ?></td>
                <td><?php echo $reservation["startDate"]; ?></td>
                <td><?php echo $reservation["endDate"]; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>