<?php
include("header.html");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::title('flashSVGMilitary testing');
fs::gOpen('grid');
fs::grid();
fs::gClose();
fs::rect(0,0,500,500);
$p1=fs::point(100,100); 
fs::text(50,50,'lineSlope($x1, $y1, $x2, $m, $style)');
// lineSlope($x1, $y1, $x2, $m, $style)
$line1=fs::lineSlope($p1[0],$p1[1]); 
$line2=fs::lineSlope($p1[0],$p1[1],200,0.2,'stroke:green;stroke-width:1;'); 
$line2=fs::lineSlope($p1[0],$p1[1],200,0.4,'stroke:green;stroke-width:2;'); 
$line2=fs::lineSlope($p1[0],$p1[1],200,0.6,'stroke:green;stroke-width:3;'); 
$line2=fs::lineSlope($p1[0],$p1[1],200,0.8,'stroke:green;stroke-width:4;'); 
$line2=fs::lineSlope($p1[0],$p1[1],200,1.0,'stroke:green;stroke-width:5;'); 
$line2=fs::lineSlope($p1[0],$p1[1],200,1.2,'stroke:green;stroke-width:6;'); 
fs::svgClose();
include("footer.html");
?>

