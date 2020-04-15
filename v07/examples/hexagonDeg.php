<?php
include("header.html");
//include("../FlashSvgMath.inc.php");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::rect(0,0,500,500);
fs::title('flashSvg testing');
fs::gOpen('grid');
//fs::grid($w, $h, $dx, $dy, $rows, $cols, $style)
fs::grid();
fs::gClose();
//hexagonDeg($cx, $cy, $r, $startDeg, $style)
fs::hexagonDeg(100,100,30,0,'stroke:navy;stroke-width:1;fill:none;');
//hexagonRad($cx, $cy, $r, $startRad, $style)
fs::hexagonRad(200,100,30,0.2,'stroke:navy;fill:red;');
fs::svgClose();
include("footer.html");
?>

