<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<h2>Monster Details</h2>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 Monster name:
 <input type="text" name="txtname" size="15" class="form-control" />
 </br></br>
 Monster image:
 <input type="file" name="monsterimage" accept="image/jpeg" class="form-control" />
 </br></br>
 Monster Sound:
 <input type="file" name="monsteraudio" accept="audio/basic" class="form-control" />
 </br></br>
 <input type="submit" class="btn btn-default" value="Save" />
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = mysqli_connect("localhost", "rich", "JHYQX)52]o8*8d0d", "logbook");

    // Check for upload errors
    if ($_FILES['monsterimage']['error'] === UPLOAD_ERR_OK && $_FILES['monsteraudio']['error'] === UPLOAD_ERR_OK) {
        $imagePath = $_FILES['monsterimage']['tmp_name'];
        $audioPath = $_FILES['monsteraudio']['tmp_name'];

        // Read the file's binary data
        $imageData = mysqli_real_escape_string($db, file_get_contents($imagePath));
        $audioData = mysqli_real_escape_string($db, file_get_contents($audioPath));
        
        $stmt = mysqli_prepare($db, "INSERT INTO monster (name, image, audio) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $_POST['txtname'], $imageData, $audioData);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<p>Monster saved successfully!</p>";
        } else {
            echo "<p>Error saving monster.</p>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<p>Error uploading files.</p>";
    }

    mysqli_close($db);
}
?>
