<?php
// Database connection
$db_host   = '192.168.56.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';
$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

// Retrieve the confirmed costs from the form submission
if (isset($_POST['calculated_costs']) && isset($_POST['month'])) {
    $calculated_costs = json_decode($_POST['calculated_costs'], true); // Decoding the JSON costs
    $month = $_POST['month']; // Retrieve the month from hidden input
    $total_cost = $_POST['total_cost']; // Retrieve the total cost from hidden input

    // Retrieve the days_present for each person
    $days_present = json_decode($_POST['days_present'], true);

    // Insert each person's cost and days present into the database
    foreach ($calculated_costs as $person => $cost) {
        // Get the days_present for each person
        $days = isset($days_present[$person]) ? $days_present[$person] : 0;

        // Prepare the SQL insert statement
        $stmt = $pdo->prepare("INSERT INTO power_costs (month, total_cost, person, days_present, calculated_cost) VALUES (?, ?, ?, ?, ?)");

        // Execute the statement for each person
        $stmt->execute([$month, $total_cost, $person, $days, $cost]);
    }

    // Redirect back to admin page with success message
    header("Location: power-cost-admin.php?success=1");
    exit;
} else {
    // If the data isn't set, redirect back to admin page with error message
    header("Location: power-cost-admin.php?error=1");
    exit;
}
