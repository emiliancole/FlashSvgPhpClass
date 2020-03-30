<?php
include("header.html");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::rect(0,0,500,500);
fs::title('flashSvg testing');
fs::gOpen('grid');
//fs::grid();
fs::gClose();
fs::point(100,50);
//arrowLeft($x1, $y1, $dx, $style)
fs::arrowLeft(100,50,20); 
fs::text(130,50,'arrowLeft(x1, y1, dx, style)');
//arrowRight($x1, $y1, $dx, $style)
fs::arrowRight(100,100,20);
fs::text(130,100,'arrowRight(x1, y1, dx, style)');
//arrowDown($x1, $y1, $dx, $style)
fs::arrowDown(130,150,20); 
fs::text(140,150,'arrowDown(x1, y1, dx, style)');
//arrowUp($x1, $y1, $dx, $style)
fs::arrowUp(130,200,20);
fs::text(140,200,'arrowUp(x1, y1, dx, style)');

fs::arrowLeft(130,250,20,'stroke:red;'); 
fs::line(150,250,250,250,'stroke:red;');
fs::arrowRight(270,250,20,'stroke:red;');
fs::rect(130,260,140,50);
fs::text(190,245,'140');
fs::svgClose();
include("footer.html");
?>

