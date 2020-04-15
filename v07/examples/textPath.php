<?php
include("header.html");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::title('textPath');
//fs::gOpen('grid');
//fs::grid();
//fs::gClose();
fs::rect(0,0,500,500);

// pathId($id, $d, $style)
fs::text(120, 30, 'pathId($id, $d, $style)'); 
$d='M10,90 Q90,90 90,45 Q90,10 50,10 Q10,10 10,40 Q10,70 45,70 Q70,70 75,50';
fs::pathId('path01', $d);
fs::text(120, 50, 'textOpen(20,0)');
fs::text(120, 70, 'textPath($href, $string, $style)');
fs::text(120, 90, 'textClose()');
fs::textOpen(20,0);
// textPath($href, $string, $style)
fs::textPath('#path01','my name is nobody'); 
fs::textClose();

fs::svgClose();
include("footer.html");
?>

