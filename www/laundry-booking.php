<!DOCTYPE HTML>
<html>
<head>
    <title>Laundry Booking</title>
    <link rel="stylesheet" href="style.css">

</head>
<body class="user-page">
<div class="container">

<h1>Laundry Booking System</h1>

<p>Make a new laundry booking:</p>

<form method="POST" action="add-laundry-booking.php">
    <label for="booking_date">Booking Date:</label><br>
    <input type="date" id="booking_date" name="booking_date" required><br><br>
    <label for="booked_by">Booked By:</label><br>
    <input type="text" id="booked_by" name="booked_by" required><br><br>
    <input type="submit" value="Book Laundry Slot">
</form>

<h2>Existing Bookings</h2>

<table>
<tr><th>Booked By</th><th>Date</th></tr>

<?php
// Connect to the database
$db_host   = '192.168.56.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

// Fetch all laundry bookings
$q = $pdo->query("SELECT * FROM laundry_bookings ORDER BY booking_date ASC");

while ($row = $q->fetch()) {
    echo "<tr><td>".$row['booked_by']."</td><td>".$row['booking_date']."</td></tr>";
}
?>
</table>
</div>

</body>
</html>
