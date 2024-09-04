<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $item_name = $_POST['item_name'];
  $added_by = $_POST['added_by'];

  $db_host   = '192.168.56.12';
  $db_name   = 'fvision';
  $db_user   = 'webuser';
  $db_passwd = 'insecure_db_pw';

  $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

  $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

  // Add the new item to the list
  $stmt = $pdo->prepare("INSERT INTO items (item_name, added_by) VALUES (?, ?)");
  $stmt->execute([$item_name, $added_by]);

  // Redirect to same grocery list page 
  header("Location: grocery-list-admin.php");
  exit();
}
?>
