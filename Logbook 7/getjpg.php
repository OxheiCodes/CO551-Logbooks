<?php
// Set the correct content-type header for JPEG images
header("Content-type: image/jpeg");

// Connect to the database
$conn = mysqli_connect("localhost", "rich", "JHYQX)52]o8*8d0d", "logbook");

// Check if the 'id' GET parameter is set to prevent undefined index notices
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT image FROM monster WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 's', $id);

    // Execute the prepared statement and store the result
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the image data from the result set
    if ($row = mysqli_fetch_assoc($result)) {
        $jpg = $row["image"];
        echo $jpg;
    } else {
        // Handle the case where no image is found for the given ID
        echo 'Image not found.';
    }

    // Free the result set and close the prepared statement
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
} else {
    echo 'No ID provided.';
}

// Close the database connection
mysqli_close($conn);
?>

