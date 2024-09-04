<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];

  $db_host   = '192.168.56.12';
  $db_name   = 'fvision';
  $db_user   = 'webuser';
  $db_passwd = 'insecure_db_pw';

  $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

  $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

  // Delete the item with the given ID
  $stmt = $pdo->prepare("DELETE FROM items WHERE id = ?");
  $stmt->execute([$id]);

  // Redirect back to the admin page
  header("Location: index.php");
  exit();
}
?>
