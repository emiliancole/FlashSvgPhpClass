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
//ellipse($cx, $cy, $rx, $ry, $style)
fs::ellipse(100,50,50,25,'stroke:navy;fill:red;');
fs::point(100,50);
fs::text(130,30,'ellipse(cx, cy, rx, ry, style)');
//ellipseArc($mx, $my, $rx, $ry, $xar, $laflag, $sflag, $x, $y, $style)
fs::point(50,150);
fs::ellipseArc(50,150,50,25,0,1,1,200,150);
fs::text(110,140,'ellipseArc(mx, my, rx, ry, xar, laflag, sflag, x, y, style)');
//ellipseArcCcw($mx, $my, $rx, $ry, $x, $y, $style)
fs::point(50,250); fs::point(200,200);
fs::ellipseArcCcw(50,250,50,25,200,200);
fs::text(110,250,'ellipseArcCcw(mx, my, rx, ry, x, y, style)');
//ellipseArcCw($mx, $my, $rx, $ry, $x, $y, $style)
fs::ellipseArcCw(50,250,50,25,200,200,'fill:red;opacity:0.3;');
fs::text(25,190,'ellipseArcCw(mx, my, rx, ry, x, y, style)');

fs::svgClose();
include("footer.html");
?>

