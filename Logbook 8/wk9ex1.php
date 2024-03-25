<?php
// Set the default timezone to avoid warnings
date_default_timezone_set('UTC'); // Change 'UTC' to your timezone

$lottodate = date("Ymd");
echo "The lottery numbers for $lottodate are ";

$numbers = []; // Initialize the array to store lottery numbers
for($n = 0; $n < 6; $n++) {
    $numbers[$n] = rand(1, 49);
    echo "<br/>" . $numbers[$n];
}

// Database connection
$conn = mysqli_connect("localhost", "rich", "JHYQX)52]o8*8d0d", "logbook");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement to prevent SQL injection
$sql = "INSERT INTO lotto (lottodate, number1, number2, number3, number4, number5, number6) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt === false) {
    echo "Error preparing statement: " . mysqli_error($conn);
    exit;
}

// Bind parameters to the prepared statement as integers ('i')
mysqli_stmt_bind_param($stmt, 'iiiiiii', $lottodate, $numbers[0], $numbers[1], $numbers[2], $numbers[3], $numbers[4], $numbers[5]);

// Execute the prepared statement
if (mysqli_stmt_execute($stmt)) {
    echo "<br/>This week's numbers have been saved";
} else {
    echo "<br/>Error: " . mysqli_stmt_error($stmt);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

