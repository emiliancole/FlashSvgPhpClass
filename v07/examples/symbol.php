<?php
include("header.html");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::title('symbol');
//fs::gOpen('grid');
//fs::grid();
//fs::gClose();
fs::rect(0,0,500,500);
fs::circle(150,30,10,'fill:red;stroke:black;stroke-width:1;');
//symbolOpen($id)
fs::text(20,20, 'symbolOpen($id)'); 
fs::text(20,40, 'circle(150,30,10)'); 
fs::text(20,60, 'symbolClose()');

fs::symbolOpen('sym01');
fs::circle(150,30,10,'fill:red;stroke:black;stroke-width:1;');
fs::symbolClose();
fs::symbolOpen('rect01');
fs::rect(0,100,30,30,'fill:red;stroke:black;stroke-width:1;');
fs::symbolClose();

//useSymbol($href, $x, $y, $style)
fs::useSymbol('#sym01',30,20); 
fs::useSymbol('#sym01',60,20, 'opacity:0.5;'); 
fs::useSymbol('#sym01',90,20, 'opacity:0.3;'); 

fs::useSymbol('#rect01',50,0,'opacity:0.8;');
fs::useSymbol('#rect01',100,0,'opacity:0.5;');
fs::useSymbol('#rect01',150,0,'opacity:0.2;');
fs::text(50,170, 'useSymbol($href, $x, $y, $style)');
fs::text(50,190, 'Note: in useSymbol() only opacity styling is supported!');

fs::symbolOpen('sym02');
fs::rect(0,200,30,30,'fill:red;stroke:black;stroke-width:1;');
fs::circle(15,215,10,'fill:green;stroke:black;stroke-width:1;');
fs::symbolClose();
fs::useSymbol('#sym02',50,0);
fs::useSymbol('#sym02',100,0,'opacity:0.7;');
fs::useSymbol('#sym02',150,0,'opacity:0.5;');

fs::svgClose();
include("footer.html");
?>

