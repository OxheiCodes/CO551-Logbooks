<html>
<body>

<h3>Gross Wage Calculation:</h3>
<?php
    $hourlyrate = 5.75;
    $hoursperweek = 40;
    $gross = $hourlyrate * $hoursperweek;
    echo $gross;
?>

<h3>Net Wage Calculation (After 22% Tax):</h3>
<?php
    $taxRate = 0.22;
    $net = $gross * (1 - $taxRate);
    echo $net;
?>

</body>
</html>

