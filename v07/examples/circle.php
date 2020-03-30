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
//circle($cx, $cy, $r, $style)
fs::circle(100,50,25,'stroke:navy;fill:red;');
fs::point(100,50);
fs::text(130,30,'circle(cx, cy, r, style)');
//circleArcCw($mx, $my, $r, $x, $y, $style)
fs::point(100,150);
fs::circleArcCw(100,150,50,80,120);
fs::text(110,130,'circleArcCw(mx, my, r, x, y, style)');
//circleArcCcw($mx, $my, $r, $x, $y, $style)
fs::point(100,300);
fs::circleArcCcw(100,300,30,40,200);
fs::text(130,210,'circleArcCcw(mx, my, r, x, y, style)');
fs::point(200,300); fs::point(250,300);
fs::circleArcCw(200,300,80,250,300,'stroke:red;fill:none;');
fs::text(220,280,'circleArcCw(mx, my, r, x, y, style)');
fs::circleArcCcw(200,300,80,250,300,'stroke:green;fill:none;');
fs::text(220,430,'circleArcCcw(mx, my, r, x, y, style)');
//circleArcCcw90($mx, $my, $r, $style)
fs::point(250,100);
fs::circleArcCcw90(250,100,25);
fs::text(270,90,'circleArcCcw90(mx, my, r, style)');
fs::circleArcCw90(250,100,25);
fs::text(40,90,'circleArcCw90(mx, my, r, style)');
fs::svgClose();
include("footer.html");
?>

