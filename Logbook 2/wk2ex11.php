<html>
<head></head>
<title> Marks from Year 1 Computing </title> <?php // Start of Marks script
$mymarks["CO450"] = 50;   // CO450 mark was 50
$mymarks["CO453"] = 79;   // CO453 mark was 79
$mymarks["CO454"] = 66;   // CO453 mark was 79
$mymarks["CO455"] = 57;   // CO453 mark was 79
$mymarks["CO452"] = 68;   // CO453 mark was 79
$mymarks["CO456"] = 65;   // CO453 mark was 79

$total = 0;

foreach ($mymarks as $index => $value) { // Start a loop using foreach
  echo "For $index my grade was $value <br/>";
  $total = $total + $value; // Simplified total calculation
}

$average = $total / count($mymarks); // Calculate average using count()

echo "<br/> My best module was CO453 with " . $mymarks["CO453"] . " marks!";
echo "<br/> My module average was " . $average . " marks!";
?>

</html>
