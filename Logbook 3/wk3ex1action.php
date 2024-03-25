<html>
<head>
	<title>Response to form</title>
</head>
<body>
<?php
	echo "Your name is " . $_POST['txtname'];
	echo "<br>";
	echo "Your gender is " . $_POST['radsex'];
	echo "<br>";
	echo "Your occupation is " . $_POST['seloccupation'];
?>
</body>
</html>

