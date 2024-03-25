<?php
session_start();
$_SESSION['selsize'] = $_POST['selsize'];
?>
<html>
<head>
    <title>Colour Selection Page</title>
</head>
<body>
    <form action="confirmation.php"  method="post">
        Select the colour for the <?php echo $_SESSION['selqty'] ?> <?php echo $_SESSION['selsize'] ?> widgets you are ordering:
        <select name="selcolour">
            <option>white</option>
            <option>red</option>
            <option>yellow</option>
            <option>green</option>
            <option>blue</option>
        </select>
        <br/><br/>
        <input type="submit" value="Proceed to Confirmation"/>
    </form>
</body>
</html>
