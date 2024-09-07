<?php
// Database connection
$db_host   = '192.168.56.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';
$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

// Retrieve the ID of the entry to delete
$id = $_POST['id'];

// Delete the entry from the database
$stmt = $pdo->prepare("DELETE FROM power_costs WHERE id = ?");
$stmt->execute([$id]);

// Redirect back to the admin page
header("Location: power-cost-admin.php?deleted=1");
?>
