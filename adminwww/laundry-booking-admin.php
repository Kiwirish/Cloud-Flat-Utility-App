<!DOCTYPE HTML>
<html>
<head>
    <title>Admin - Laundry Booking Management</title>
    <link rel="stylesheet" href="admin-style.css">
    <link rel="stylesheet" href="style.css">

</head>
<body class="admin-page">
<div class="container">


<h1>Admin - Laundry Booking System</h1>

<table>
<tr><th>Booked By</th><th>Date</th><th>Action</th></tr>

<?php
$db_host   = '192.168.56.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

// Fetch all laundry bookings
$q = $pdo->query("SELECT * FROM laundry_bookings ORDER BY booking_date ASC");

while ($row = $q->fetch()) {
    echo "<tr><td>".$row['booked_by']."</td><td>".$row['booking_date']."</td>";
    echo "<td><form method='POST' action='delete-laundry-booking.php'>
            <input type='hidden' name='id' value='".$row['id']."'>
            <input type='submit' value='Delete'>
          </form></td></tr>\n";
}
?>
</table>
</div>

</body>
</html>
