<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">

<html>
<head><title>Database Tests!!</title>
<style>
th { text-align: left; }

table, th, td {
  border: 2px solid grey;
  border-collapse: collapse;
}

th, td {
  padding: 0.2em;
}
</style>
</head>

<body>
<h1>Database test page</h1>

<p>Showing contents of current shopping items:</p>

<table border="1">
<tr><th>Item Name</th><th>Added by</th></tr>

<?php
 
$db_host   = '127.0.0.1';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM items");

while($row = $q->fetch()){
  echo "<tr><td>".$row["item_name"]."</td><td>".$row["added_by"]."</td></tr>\n";
}

?>
</table>
</body>
</html>
