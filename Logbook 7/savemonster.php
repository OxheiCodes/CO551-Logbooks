<?php

$db = mysqli_connect("localhost", "rich", "JHYQX)52]o8*8d0d", "logbook");

// Check for file upload errors and existence of files
if ($_FILES['monsterimage']['error'] === UPLOAD_ERR_OK && $_FILES['monsteraudio']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['monsterimage']['tmp_name']; 
    $audio = $_FILES['monsteraudio']['tmp_name'];

    // Prepare the SQL statement
    $stmt = mysqli_prepare($db, "INSERT INTO monster (name, image, audio) VALUES (?, ?, ?)");

    // Open the files and read the binary content
    $null = NULL;
    mysqli_stmt_bind_param($stmt, "sbb", $_POST['txtname'], $null, $null);

    // Read file contents
    $fpImage = fopen($image, "rb");
    $fpAudio = fopen($audio, "rb");

    // Sending the data in packets to handle large files
    while (!feof($fpImage)) {
        mysqli_stmt_send_long_data($stmt, 1, fread($fpImage, 8192));
    }
    while (!feof($fpAudio)) {
        mysqli_stmt_send_long_data($stmt, 2, fread($fpAudio, 8192));
    }

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($db);

    // Close file handles
    fclose($fpImage);
    fclose($fpAudio);

    echo "File uploaded successfully.";
} else {
    echo "Error uploading files.";
}
?>

