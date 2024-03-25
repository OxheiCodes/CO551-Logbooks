<?php
// Establish a database connection
$conn = mysqli_connect("localhost", "rich", "JHYQX)52]o8*8d0d", "logbook");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start the session at the beginning if you plan to use session variables
session_start();

if (isset($_POST['selweek'])) {
    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM lotto WHERE wk = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $_POST['selweek']); // Assuming 'wk' is an integer. Use 's' if 'wk' is a string.
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        echo "Number 1 is " . htmlspecialchars($row['number1']) . "<br/>";
        echo "Number 2 is " . htmlspecialchars($row['number2']) . "<br/>";
        echo "Number 3 is " . htmlspecialchars($row['number3']) . "<br/>";
        echo "Number 4 is " . htmlspecialchars($row['number4']) . "<br/>";
        echo "Number 5 is " . htmlspecialchars($row['number5']) . "<br/>";
        echo "Number 6 is " . htmlspecialchars($row['number6']) . "<br/>";
    } else {
        echo "No results found.";
    }
    
    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    $sql = "SELECT * FROM lotto;";
    $result = mysqli_query($conn, $sql);

    // Use htmlspecialchars to avoid XSS attacks
    $self = htmlspecialchars($_SERVER['PHP_SELF']);

    echo "<form action='{$self}' method='post'>";
    echo "<br/>Select the lottery week ";
    echo "<select name='selweek'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $wkValue = htmlspecialchars($row['wk']);
        echo "<option value='{$wkValue}'>{$wkValue}</option>";
    }
    echo "</select><br/>";
    echo "<input type='submit' value='Select' />";
    echo "</form>";
}

// Close the database connection
mysqli_close($conn);
?>



