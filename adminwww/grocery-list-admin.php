<!DOCTYPE HTML>
<html>
<head>
    <title>Admin - Manage Grocery List</title>
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
<body>

<h1>Admin - Grocery List</h1>

<p>Here’s the current grocery list:</p>

<table>
<tr><th>Item Name</th><th>Added By</th><th>Date Added</th><th>Action</th></tr>

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
  echo "<tr><td>".$row["item_name"]."</td><td>".$row["added_by"]."</td><td>".$row["date_added"]."</td>";
  echo "<td><form method='POST' action='delete-item.php'>
          <input type='hidden' name='id' value='".$row['id']."'>
          <input type='submit' value='Delete'>
        </form></td></tr>\n";
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

</body>
</html>
