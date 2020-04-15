<?php
include("header.html");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::title('textBox');
//fs::gOpen('grid');
//fs::grid();
//fs::gClose();
fs::rect(0,0,500,500);

//textBox($x, $y, $w, $h, $r, $string, $style)
fs::text(30,230, 'textBox($x, $y, $w, $h, $r, $string, $stringStyle, $boxStyle)'); 
fs::text(20,120, 'textBox()'); fs::textBox();

fs::textBox(20,160,100,50,5,'red box','stroke:navy;','fill:red;');
fs::textBoxString(50,300,100,20,5,'string','fill:black','fill:red');
fs::textBoxString(50,350,230,80,15,'a very long long string','font-size:20;fill:black','fill:lightgreen');

fs::svgClose();
include("footer.html");
?>

