<!DOCTYPE HTML>
<html>
<head>
    <title>User - Grocery List</title>
    <link rel="stylesheet" href="style.css">

    <style>
    table, th, td {
      border: 1px solid grey;
      padding: 10px;
    }
    th, td {
      text-align: left;
    }
    </style>
</head>
<body class="user-page">
<div class="container">

<h1>Grocery List</h1>

<p>Here’s the current grocery list:</p>

<table>
<tr><th>Item Name</th><th>Added By</th><th>Date Added</th></tr>

<?php
// Connect to the database
$db_host   = '192.168.56.12';  // IP of the database server VM
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

// Fetch all items from the shopping list
$q = $pdo->query("SELECT * FROM items");

while($row = $q->fetch()){
  echo "<tr><td>".$row["item_name"]."</td><td>".$row["added_by"]."</td><td>".$row["date_added"]."</td></tr>\n";
}
?>

</table>

<h2>Add a New Item</h2>
<form method="POST" action="add-item.php">
  <label for="item_name">Item Name:</label><br>
  <input type="text" id="item_name" name="item_name" required><br><br>
  <label for="added_by">Added By:</label><br>
  <input type="text" id="added_by" name="added_by" required><br><br>
  <input type="submit" value="Add Item">
</form>
</div>

</body>
</html>