<?php
include("header.html");
include("../FlashSvgMath.inc.php");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::rect(0,0,500,500);
fs::title('flashSvg testing');
fs::gOpen('grid');
//fs::grid($w, $h, $dx, $dy, $rows, $cols, $style)
fs::grid();
fs::gClose();
//imageArrayH($x, $y, $w, $h, $dx, $cols, $href)
fs::imageArrayH(10, 10, 100, 50, 60, 5, 'images/red.horse.png');
//imageArrayV($x, $y, $w, $h, $dy, $rows, $href)
fs::imageArrayV(10, 100, 100, 50, 60, 5, 'images/red.horse.png');
fs::svgClose();
include("footer.html");
?>

