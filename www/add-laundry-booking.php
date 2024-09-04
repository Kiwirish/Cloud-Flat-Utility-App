<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_date = $_POST['booking_date'];
    $booked_by = $_POST['booked_by'];

    $db_host   = '192.168.56.12';
    $db_name   = 'fvision';
    $db_user   = 'webuser';
    $db_passwd = 'insecure_db_pw';

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    // Insert the new booking
    $stmt = $pdo->prepare("INSERT INTO laundry_bookings (booking_date, booked_by) VALUES (?, ?)");
    $stmt->execute([$booking_date, $booked_by]);

    // Redirect back to the laundry booking page
    header("Location: laundry-booking.php");
    exit();
}
?>
