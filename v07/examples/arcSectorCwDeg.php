<?php
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::title('flashSVGMilitary testing');
fs::gOpen('grid');
fs::grid();
fs::gClose();
fs::rect(0,0,500,500);
$c=fs::point(200,200); $r=100;
//circle($cx, $cy, $r, $style)
fs::text(100,80,'circle($cx, $cy, $r, $style)');
fs::circle($c[0],$c[1],$r,'stroke:black;fill:orange;');
//arcSectorCwDeg($cx, $cy, $r, $degStart, degEnd, $style)
fs::text(50,320,'arcSectorCwDeg($cx, $cy, $r, $degStart, degEnd, $style)');
fs::arcSectorCwDeg(200,200,$r,-45,-10, 'fill:brown;');
//text($x, $y, $string, $style)

fs::svgClose();

?>
