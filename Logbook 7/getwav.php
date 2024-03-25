<?php
// Set the header to the correct audio content type
header("Content-type: audio/wav");

// Establish a connection to the database
$conn = mysqli_connect("localhost", "rich", "JHYQX)52]o8*8d0d", "logbook");

// Check if 'id' is set in the URL and prevent SQL injection by using a prepared statement
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT audio FROM monster WHERE id = ?";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $id);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the audio content from the database
    if ($row = mysqli_fetch_assoc($result)) {
        $audio = $row["audio"];
        echo $audio;
    } else {
        // Handle cases where no audio is found
        echo "No audio found for the given ID.";
    }

    // Free result and close the statement
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
} else {
    // Handle cases where 'id' is not provided in the URL
    echo "No ID provided.";
}

// Close the database connection
mysqli_close($conn);
?>
