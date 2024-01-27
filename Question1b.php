<?php
function daysofweek($number) {
    $weeknames = array("Monday", "Tuesday", "Wednesday", "Thursday", 
    "Friday", "Saturday", "Sunday");
    return ($weeknames[$number]);
};
?>
<html>
<head>
    <title>Days of week</title>
</head>
<body>
    <h1>Days of week</h1>
    <?php $dayno = 4; ?>
    <p>Today is <?php print daysofweek($dayno); ?>
</p>
</body>
</html>
