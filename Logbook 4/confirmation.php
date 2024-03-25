<?php
session_start();

$qty = $_SESSION['selqty'];
$size = $_SESSION['selsize'];
$colour = $_POST['selcolour'];
$price = 0;

switch ($size) {
    case "Small":
        $price = 15.75;
        break;
    case "Medium":
        $price = 16.75;
        break;
    case "Large":
        $price = 17.75;
        break;
    case "ExtraLarge":
        $price = 18.75;
        break;
}

$total_cost = $qty * $price;

echo "<h2>Your order quantity is $qty</h2>";
echo "<h2>Selected size: $size (£$price)</h2>";
echo "<h2>Selected colour: $colour</h2>";
echo "<h2>Total cost: £$total_cost</h2>";
?>
