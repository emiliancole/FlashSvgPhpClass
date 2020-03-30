<?php
include("FlashSvg.class.07.php");

class_alias('FlashSvg', 'fs');
fs::svgOpen();
fs::aOpen();
fs::circle(350,30,15,'stroke:black;fill:red;');
fs::aClose();
fs::arcCcwDeg(60,50,50,80,'stroke:navy;fill:red;');
fs::point(180,50); fs::arcCwDeg(180,50,50,90,'stroke:navy;fill:green;');
fs::arrowLeft(200,10,20); fs::arrowRight(200,20,20);
fs::arrowDown(230,30,20); fs::arrowUp(250,20,20);
fs::bezierC(10,100,50,50,90,50,110,100); fs::bezierS();
$arr=fs::bezierQ(20,100,50,60,100,100); fs::bezierT();
fs::point(200,50); fs::circleArcCw(200,50,130,300,50,'stroke:red;fill:none;');
fs::circleArcCcw(200,50,130,300,50,'stroke:green;fill:none;');
fs::circleArcCcw90(); fs::point(); fs::circleArcCw90();
fs::point(300,200); fs::circleArcCcw180(300,200,50,'stroke:navy;fill:yellow;');
fs::circleArcCw180(300,200,50,'stroke:navy;fill:orange;');
fs::circleArrayHV(300,10,5,15,3,3,'stroke:navy;fill:orange;');
//fs::circle(30,50,15,'fill:brown;');
fs::svgClose();

echo "<hr>";
print_r($arr);

?>
