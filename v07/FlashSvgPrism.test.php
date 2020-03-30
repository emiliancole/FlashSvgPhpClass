<!DOCTYPE html>
<html>
<body>
<div style="position:absolute;left:0;top:0" onclick="showCoords(event)">

<script>
function showCoords(event) {
    var x = event.clientX;
    var y = event.clientY;
    var coords = "X coords: " + x + ", Y coords: " + y;
    document.getElementById("demo").innerHTML = coords;
}
</script>

<?php
// flashSvgMilitary.test.php - Testing for flashSvgMilitary 3d projection functions
// Sometimes, the elegant implementation is just a function. Not a method.
// Not a class. Not a framework. Just a function. - John Carmack.

include("flashSvg.inc.07.php");
//include("flashSvgTransform.inc.02.php");
include("flashSvgMath.inc.php");
include("flashSvgPrism.inc.php");
include("flashSvgMilitary.inc.php");

//*** TESTING FUNCTIONS ***
svgOpen();
title('flashSVGMilitary testing');
//gOpen('grid');
//grid();
//gClose();
//hexagonRad(); hexagonRadZ();
//pentagonDeg(); pentagonDegZ(100,100,-50,40,30);
//pentagonRad(); pentagonRadZ(100,100,50,30,-0.2);
//prismHexagonDeg(); prismHexagonDeg(200,200,40,30,-20);
//prismHexagonRad(); prismHexagonRad(300,300,40,30,-0.4);
//prismPentagonDeg(100,100,40,30,0); prismPentagonDeg(200,100,40,30,30); 
//prismPentagonDeg(300,100,40,30,72);
prismRectDeg(); prismRectDeg(220,100,60,30,40,50); 
//prismSquareDeg(100,100,40,30,0); prismSquareDeg(200,100,40,30,45); cube(100,200);
//prismTriangleDeg(50,200,40,30,0); prismTriangleDeg(150,200,40,30,45); 
//prismTriangleDeg(250,200,40,30,90); prismTriangleDeg(350,200,40,30,120); 
//pyramidHexagonDeg(100,100,50,30,0); pyramidHexagonDeg(200,100,50,30,60);
//pyramidPentagonDeg(100,100,50,30,0); pyramidPentagonDeg(200,100,50,30,36); 
//pyramidPentagonDeg(300,100,50,30,-36); 
//pyramidSquareDeg(100,100,50,30,0); pyramidSquareDeg(200,100,50,30,30); 
//pyramidTriangleDeg(100,100,50,30,0); pyramidTriangleDeg(200,100,50,30,45);
//pyramidTriangleDeg(300,100,50,30,90); pyramidTriangleDeg(400,100,50,30,120); 

svgClose();

?>
</div>
<div style="position:absolute;left:10px;top:500px;" id="demo"></div>
</body>
</html>
