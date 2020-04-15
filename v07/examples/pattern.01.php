<?php
include("header.html");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::title('pattern');
fs::rect(0,0,500,500);

//patternOpen($id, $xStart, $yStart, $w, $h, $patternUnits)
fs::patternOpen('patt01',10,10,25,25);
fs::circle(10,10,10,'fill:blue;');
fs::rect(5,5,5,5);
fs::patternClose();
fs::rect(20,20,100,100, 'fill:url(#patt01);stroke:blue;');

fs::svgClose();
include("footer.html");
?>

