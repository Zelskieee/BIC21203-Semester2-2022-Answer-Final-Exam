<?php
// (a) Set the output of the image to jpeg format
header('Content-Type: image/jpeg');

// (b) Write TWO (2) arrays to initialize the data for Date and the Number of New Cases
$dates = ['14/Oct', '11/Oct', '12/Oct', '13/Oct', '15/Oct', '16/Oct', '17/Oct'];
$newCases = [8084, 6709, 7276, 7950, 7420, 7509, 6145];

// (c) Use imagecreate function to setup the image canvas with 255 (height) and 320 (width) in size
$imageWidth = 320;
$imageHeight = 255;
$image = imagecreate($imageWidth, $imageHeight);

// (d) Use imagecolorallocate function to set the canvas background color to white
$backgroundColor = imagecolorallocate($image, 255, 255, 255);

// (e) Draw black lines for the X and Y axis of the bar chart
$axisColor = imagecolorallocate($image, 0, 0, 0);
imageline($image, 10, 5, 10, 230, $axisColor);  // Y-axis
imageline($image, 10, 230, 300, 230, $axisColor); // X-axis

// (f) Initialize the fill color for all graph bar to blue
$barColor = imagecolorallocate($image, 0, 0, 255);

// (g) Initialize the first graph bar location to (15, 230), the bar width to 20, and max bar height to 10000
$barWidth = 20;
$maxBarHeight = 10000;
$barX = 15;
$barY = 230;

// (h) Use for loop to populate each bar
for ($i = 0; $i < count($dates); $i++) {
    $barHeight = ($newCases[$i] / $maxBarHeight) * ($imageHeight - 30);
    imagefilledrectangle($image, $barX, $barY - $barHeight, $barX + $barWidth, $barY, $barColor);
    $barX += $barWidth + 10; // Adjust the space between bars
}

// (i) Put label for X axis as the Date, and for Y axis as the number of New Cases
$textColor = imagecolorallocate($image, 0, 0, 0);
for ($i = 0; $i < count($dates); $i++) {
    imagestring($image, 5, $i * ($barWidth + 10) + 20, $imageHeight - 10, $dates[$i], $textColor);
    imagestring($image, 5, 5, $imageHeight - $i * ($imageHeight / count($newCases)) - 15, $newCases[$i], $textColor);
}

// Output the image as JPEG
imagejpeg($image);

// Free up memory
imagedestroy($image);
?>
