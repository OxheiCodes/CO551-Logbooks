<?php
switch ($_POST["radcourse"]) {
    case "HNC":
        echo "You have selected an HNC course";
    case "HND":
        echo "You have selected an HND course";
    case "BSC":
        echo "You have selected a BSC course";
    case "Part Time BSC": // Handling for Part Time BSC option
        echo "You have selected a Part Time BSC course";
    default:
        echo "No course selected";
}
?>

