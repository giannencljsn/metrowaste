<?php
// process_selected.php

// Retrieve the selected employee IDs
$selectedValues = $_POST['selected_values'];

// Display the selected values
echo "<h1>Selected Values:</h1>";

foreach ($selectedValues as $employeeId) {
    // Retrieve the employee details based on the ID and display them
    // Replace this with your own logic to fetch employee details from your data source

    // Example code:
    $employee = getEmployeeDetails($employeeId); // Function to retrieve employee details
    if ($employee) {
        echo "<p>Name: " . $employee->first_name . " " . $employee->last_name . "</p>";
        echo "<p>Employee Code: " . $employee->em_code . "</p>";
        echo "<p>Email: " . $employee->em_email . "</p>";
        echo "<p>Phone: " . $employee->em_phone . "</p>";
        echo "<p>Role: " . $employee->em_role . "</p>";
        echo "<hr>";
    }
}

// Function to retrieve employee details (replace this with your own logic)
function getEmployeeDetails($employeeId)
{
    // Replace this with your own logic to fetch employee details from your data source
    // Example code:
    $employees = [
        [
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'em_code' => '123',
            'em_email' => 'john@example.com',
            'em_phone' => '123456789',
            'em_role' => 'Manager'
        ],
        [
            'id' => 2,
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'em_code' => '456',
            'em_email' => 'jane@example.com',
            'em_phone' => '987654321',
            'em_role' => 'Employee'
        ]
    ];

    foreach ($employees as $employee) {
        if ($employee['id'] == $employeeId) {
            return (object)$employee;
        }
    }

    return null;
}
?>
