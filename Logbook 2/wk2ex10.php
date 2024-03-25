<?php
$mymarks["year 1"] = 55;
$mymarks["year 2"] = 65;
$mymarks["year 3"] = 75;

// foreach loop to output keys and values
foreach ($mymarks as $index => $value) {
    echo "for $index my grade was $value <br/>";
}

echo "<br/> My best year was Year 3 when I averaged " . $mymarks["year 3"];
?>
