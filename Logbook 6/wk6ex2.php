<?php
// Connect to server and select database
$servername = "localhost"; // Change this to your server name if different
$username = "rich"; // Change this to your database username
$password = "JHYQX)52]o8*8d0d"; // Change this to your database password
$dbname = "logbook"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM test";
$result = $conn->query($sql);
?>

<html>
<body>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<a href=\"wk6ex2action.php?id=$row[name]\">$row[name]</a><br>";   
}
?>

</body>
</html>

<?php
$conn->close();
?>


