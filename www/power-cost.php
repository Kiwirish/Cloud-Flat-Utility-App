<!DOCTYPE HTML>
<html>
<head>
    <title>User - View Power Costs</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body class="user-page">
<div class="container">

<h1>Your Power Costs for the Month</h1>

<form method="POST" action="">
  <label for="month">Select Month:</label>
  <input type="text" id="month" name="month" placeholder="e.g., October 2024" required>
  <input type="submit" value="View Costs">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected month from the form
    $month = $_POST['month'];

    // Fetch power costs for the selected month
    $db_host   = '192.168.56.12';
    $db_name   = 'fvision';
    $db_user   = 'webuser';
    $db_passwd = 'insecure_db_pw';
    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    $q = $pdo->prepare("SELECT * FROM power_costs WHERE month = ?");
    $q->execute([$month]);

    echo "<table><tr><th>Person</th><th>Cost</th></tr>";

    while ($row = $q->fetch()) {
        echo "<tr><td>".$row['person']."</td><td>$".$row['calculated_cost']."</td></tr>\n";
    }

    echo "</table>";
}
?>

</div>
</body>
</html>
