<?php
	$sql = "INSERT INTO test (name,email,phone_number) ";
	$sql = $sql . " values ('$_POST[txtName]','$_POST[txtEmail]','$_POST[txtPhoneNumber]')";

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

	// Execute INSERT sql statement		
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Execute SELECT sql statement
	$sql = "SELECT * from test";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // Output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "Name: " . $row["name"]. " - Email: " . $row["email"]. " - Phone Number: " . $row["phone_number"]. "<br>";
	    }
	} else {
	    echo "0 results";
	}

	$conn->close();
?>

