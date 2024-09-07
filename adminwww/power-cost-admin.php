<!DOCTYPE HTML>
<html>
<head>
    <title>Admin - Power Cost Management</title>
    <link rel="stylesheet" href="admin-style.css">
    <link rel="stylesheet" href="style.css">

</head>
<body class="admin-page">
<div class="container">

<h1>Admin - Power Cost Calculation & Management</h1>

<!-- Part 1: View and Delete Power Costs -->
<h2>View and Delete Power Costs</h2>
<form method="POST" action="">
    <label for="view_month">Select Month:</label><br>
    <select id="view_month" name="view_month">
        <option value="">Select Month</option>
        <?php
        // Database connection
        $db_host   = '192.168.56.12';
        $db_name   = 'fvision';
        $db_user   = 'webuser';
        $db_passwd = 'insecure_db_pw';
        $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

        // Fetch distinct months with power costs
        $q = $pdo->query("SELECT DISTINCT month FROM power_costs ORDER BY month DESC");
        while ($row = $q->fetch()) {
            echo "<option value='".$row['month']."'>".$row['month']."</option>";
        }
        ?>
    </select>
    <input type="submit" value="View Costs">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['view_month']) && $_POST['view_month'] !== '') {
    $view_month = $_POST['view_month'];

    // Fetch power costs for the selected month
    $stmt = $pdo->prepare("SELECT * FROM power_costs WHERE month = ?");
    $stmt->execute([$view_month]);

    echo "<h3>Power Costs for $view_month</h3>";
    echo "<table><tr><th>Person</th><th>Cost</th><th>Action</th></tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr><td>".$row['person']."</td><td>$".$row['calculated_cost']."</td>";
        echo "<td><form method='POST' action='delete-power-cost.php'>
                  <input type='hidden' name='id' value='".$row['id']."'>
                  <input type='hidden' name='month' value='".$row['month']."'>
                  <input type='submit' value='Delete'>
              </form></td></tr>";
    }
    echo "</table>";
}
?>

<!-- Part 2: Power Cost Calculation -->
<h2>Enter Power Cost Data</h2>
<form method="POST" action="calculate-power-cost.php">
  <label for="month">Month:</label><br>
  <input type="text" id="month" name="month" required placeholder="e.g., October 2024"><br><br>

  <label for="total_cost">Total Power Cost:</label><br>
  <input type="number" step="0.01" id="total_cost" name="total_cost" required><br><br>

  <h3>Enter Days Present for Each Person</h3>

  <label for="person1">Person 1 Name:</label><br>
  <input type="text" id="person1" name="person1_name" required><br><br>
  <label for="person1_days">Days Present:</label><br>
  <input type="number" id="person1_days" name="person1_days" required><br><br>

  <label for="person2">Person 2 Name:</label><br>
  <input type="text" id="person2" name="person2_name" required><br><br>
  <label for="person2_days">Days Present:</label><br>
  <input type="number" id="person2_days" name="person2_days" required><br><br>

  <label for="person3">Person 3 Name:</label><br>
  <input type="text" id="person3" name="person3_name" required><br><br>
  <label for="person3_days">Days Present:</label><br>
  <input type="number" id="person3_days" name="person3_days" required><br><br>

  <label for="person4">Person 4 Name:</label><br>
  <input type="text" id="person4" name="person4_name" required><br><br>
  <label for="person4_days">Days Present:</label><br>
  <input type="number" id="person4_days" name="person4_days" required><br><br>

  <label for="person5">Person 5 Name:</label><br>
  <input type="text" id="person5" name="person5_name" required><br><br>
  <label for="person5_days">Days Present:</label><br>
  <input type="number" id="person5_days" name="person5_days" required><br><br>

  <input type="submit" value="Calculate Costs">
</form>

<?php
if (isset($_GET['calculated_costs']) && isset($_GET['days_present'])) {
    $calculated_costs = json_decode($_GET['calculated_costs'], true);
    $days_present = json_decode($_GET['days_present'], true); // Retrieve days present

    $month = $_GET['month']; // Get the month from the URL
    $total_cost = $_GET['total_cost']; // Get the total cost

    echo "<h2>Calculated Costs:</h2><table>";
    foreach ($calculated_costs as $person => $cost) {
        echo "<tr><td>$person</td><td>\$$cost</td><td>{$days_present[$person]} days</td></tr>";
    }
    echo "</table>";

    // Add a hidden input to store total_cost, days_present, and calculated costs
    echo "<form method='POST' action='confirm-power-cost.php'>";
    echo "<input type='hidden' name='calculated_costs' value='" . htmlentities(json_encode($calculated_costs)) . "'>";
    echo "<input type='hidden' name='days_present' value='" . htmlentities(json_encode($days_present)) . "'>"; // Pass days present
    echo "<input type='hidden' name='month' value='" . htmlentities($month) . "'>"; // Pass month
    echo "<input type='hidden' name='total_cost' value='" . htmlentities($total_cost) . "'>";  // Pass total cost
    echo "<input type='submit' value='Confirm Costs'>";
    echo "</form>";
}
?>


</div>
</body>
</html>
