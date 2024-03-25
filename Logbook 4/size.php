<?php
session_start();
$_SESSION['selqty'] = $_POST['selqty'];
?>
<html>
<head>
    <title>Size Selection Page</title>
</head>
<body>
    <form action="selectcolour.php"  method="post">
        Select the size for the <?php echo $_SESSION['selqty'] ?> widgets you are ordering:<br>
        <input type="radio" name="selsize" value="Small"> Small (£15.75)<br>
        <input type="radio" name="selsize" value="Medium"> Medium (£16.75)<br>
        <input type="radio" name="selsize" value="Large"> Large (£17.75)<br>
        <input type="radio" name="selsize" value="ExtraLarge"> Extra Large (£18.75)<br>
        <br/><br/>
        <input type="submit" value="Proceed to Colour Selection"/>
    </form>
</body>
</html>
