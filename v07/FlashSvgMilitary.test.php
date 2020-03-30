<?php
include("FlashSvgMilitary.class.php");
class_alias('FlashSvgMilitary', 'f3');

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::title('flashSVGMilitary testing');
fs::gOpen('grid');
fs::grid();
fs::gClose();
//f3::boxRectRotDeg(200,200,100,50,-120,50);
//fs::circle(); f3::circleZ(100,300,20,30,'fill:green;');
f3::cylinder();
//box(); box(100,300,120,350,200,280,150,250);
//boxRectRotDeg(100,300); 
//coneTrunk($cx, $cy, $r, $ra, $a, $style)
//coneRev(); cone(200,200,40,100); 
//coneTrunkRev(100,100,40,50,30); coneTrunk(200,200,40,20,40);
//cross(); crossZ();
//houseRotDeg(300,280,40,20,50,20,'stroke:black;fill:orange');
//line(); lineZ();
//polygonZ4(); polygonZ4(100,100,150,50,120,175,80,150,0);
//polylineZ3P();
//polylineZ4P(); 
//polylineZ4P(100,100,30,150,50,30,200,100,30,250,50,30);
//hexagonRad(); hexagonRadZ();
//pentagonDeg(); pentagonDegZ(100,100,-50,40,30);
//pentagonRad(); pentagonRadZ(100,100,50,30,-0.2);

//pyramidRotDeg(100,100,100,50,120,80);
//rectRotDegZ(); 
//rectZ(); rectZ(200,200,20,100,50,'fill:red;');
//sofaRotDeg(200,200,100,60,120,10,20,50);
//sphere();
//surface3P();
//surface4P();
//tree1(); tree2(300,300,50,30,'stroke:green;fill:lightgreen;');
//tree3(300,300,30,20);
//wall(200,200,220,180,30,'stroke:black;stroke-width:1;fill:red;');
//f3::wallCircle();

fs::svgClose();

?>
