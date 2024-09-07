<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $month = $_POST['month'];
    $total_cost = $_POST['total_cost'];
    
    // Extract the month and year from the input
    $date_parts = explode(' ', $month);
    $month_name = $date_parts[0];
    $year = isset($date_parts[1]) ? (int)$date_parts[1] : date('Y'); // Default to current year if not specified
    
    // Convert month name to a numeric value
    $month_number = date('n', strtotime($month_name . " 1 " . $year));
    
    // Calculate the number of days in the specified month and year
    $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month_number, $year);

    // Flatmates and their days present
    $flatmates = [
        'Quinn' => $_POST['person1_days'],
        'Salisbury' => $_POST['person2_days'],
        'Simran' => $_POST['person3_days'],
        'Blake' => $_POST['person4_days'],
        'Teeks' => $_POST['person5_days'],
    ];

    // Calculate each person's percentage of time present
    $percentages = [];
    foreach ($flatmates as $person => $days) {
        $percentages[$person] = ($days / $days_in_month) * 100;
    }

    // Sum total percentages
    $total_percentage = array_sum($percentages);

    // Calculate each person's cost based on their percentage of the total
    $calculated_costs = [];
    foreach ($percentages as $person => $percentage) {
        if ($total_percentage > 0) {
            $calculated_costs[$person] = ($percentage / $total_percentage) * $total_cost;
        } else {
            $calculated_costs[$person] = 0;
        }
    }

    // Redirect to admin page with calculated costs and days present for confirmation
    header('Location: power-cost-admin.php?calculated_costs=' . urlencode(json_encode($calculated_costs)) . '&days_present=' . urlencode(json_encode($flatmates)) . '&month=' . urlencode($month) . '&total_cost=' . urlencode($total_cost));
    exit;
}
