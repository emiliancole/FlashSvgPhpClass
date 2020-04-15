<?php
include("header.html");
include("../FlashSvgMath.inc.php");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::rect(0,0,500,500);
fs::title('flashSvg testing');
//gOpen('grid');
//grid($w, $h, $dx, $dy, $rows, $cols, $style)
fs::grid(300,300,20,10,30,15);
//gClose();
fs::image(50, 50, '10%', '10%', 'images/red.horse.png');
fs::svgClose();
include("footer.html");
?>

