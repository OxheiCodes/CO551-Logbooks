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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the delete button is clicked
    if(isset($_POST['btndelete'])) {
        // Delete the record from the database
        $name = $_GET['id'];
        $sql = "DELETE FROM test WHERE name='$name'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            // Redirect to a different page after deletion
            header("Location: wk6ex2.php");
            exit;
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

// Retrieve the record to display
$sql = "SELECT * FROM test WHERE name = '" . $_GET['id'] . "'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>

<html>
<body>
<form action="" method="post">

    Name :
    <input type="text" name="txtname" value="<?php echo $row['name']; ?>" readonly /><br>
    Phone number :
    <input type="text" name="txttelno" value="<?php echo $row['phone_number']; ?>" /><br>
    Email :
    <input type="text" name="txtemail" value="<?php echo $row['email']; ?>" /><br>
    <input type="submit" name="btnsubmit" value="Save Changes"/>
    <input type="submit" name="btndelete" value="Delete Record" onclick="return confirm('Are you sure you want to delete this record?');"/>
</form>
</body>
</html>

<?php
$conn->close();
?>


