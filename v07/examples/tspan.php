<?php
include("header.html");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::title('tspan');
//fs::gOpen('grid');
//fs::grid();
//fs::gClose();
fs::rect(0,0,500,500);

//tspan($x, $y, $dx, $dy, $string, $style)
fs::textOpen(100,100, 'tspan($string, $style)'); 
fs::tspan(100,100,0,20,'line1');
fs::tspan(100,100,0,40,'line2');
fs::textClose();

//text($x, $y, $string, $style)
fs::textOpen(100,200,'textOpen');
fs::tspan(100,200,70,0,'tspan','fill:red;');
fs::textClose();
fs::text(220,200,'text');

fs::svgClose();
include("footer.html");
?>

