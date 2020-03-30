<?php
// LIST ALL DEFINED FUNCTIONS IN A PHP FILE

$lines = file('FlashSvgMilitary.class.php');
$i=0;

foreach ($lines as $line_num => $line) {
$fline=explode(" ",$line);
if ($fline[0]=="//") {
    echo "$i-Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
    $i++;  }
}

echo "<hr>";

?>