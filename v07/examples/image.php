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
fs::image(0, 0, 100, 50, 'images/red.horse.png');
fs::image(60, 60, 100, 100, 'images/red.horse.png');
fs::image(160, 60, 100, 100, 'images/red.horse.png');
fs::image(60, 160, 50, 100, 'images/red.horse.png');
fs::image(160, 160, 50, 100, 'images/red.horse.png');
fs::svgClose();
include("footer.html");
?>

