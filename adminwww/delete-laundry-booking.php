<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID of the booking to delete
    $id = $_POST['id'];

    // Database connection details
    $db_host   = '192.168.56.12';  // Update to match your DB server's IP
    $db_name   = 'fvision';        // Update to match your database name
    $db_user   = 'webuser';        // Update to match your DB username
    $db_passwd = 'insecure_db_pw'; // Update to match your DB password

    try {
        // Connect to the database
        $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL DELETE statement
        $stmt = $pdo->prepare("DELETE FROM laundry_bookings WHERE id = ?");
        $stmt->execute([$id]);

        // Redirect back to the admin page after deletion
        header("Location: laundry-booking-admin.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
