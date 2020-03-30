<?php
include("header.html");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::rect(0,0,500,500);
fs::title('flashSvg testing');
fs::gOpen('grid');
fs::grid();
fs::gClose();
//arcCcwDeg($mx, $my, $r, $deg, $style)
fs::point(60,50);
fs::arcCcwDeg(60,50,50,80,'stroke:navy;fill:red;');
fs::text(150,20,'arcCcwDeg(mx, my, r, deg, $style)');
// arcCwDeg($mx, $my, $r, $deg, $style)
fs::point(60,150);
fs::arcCwDeg(60,150,50,80,'stroke:navy;fill:red;');
fs::text(70,120,'arcCwDeg(mx, my, r, deg, $style)');
fs::svgClose();
include("footer.html");
?>

