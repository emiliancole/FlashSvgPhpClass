<?php
include("header.html");
include("../FlashSvgMath.inc.php");
include("../FlashSvg.class.07.php");

//*** TESTING FUNCTIONS ***
fs::svgOpen();
fs::rect(0,0,500,500);
fs::title('flashSvg testing');
fs::gOpen('grid');
fs::grid();
fs::gClose();
//clipPathOpen($id)
fs::text(80,50,'clipPathOpen($id=\'clip01\')');
fs::text(80,70,'rect($x,$y,$w,$h,$style)');
fs::text(80,90,'clipPathClose()');
fs::clipPathOpen($id='clip01');
fs::rect(15,15,40,40);
fs::clipPathClose();
fs::text(80,110,'circle($cx,$cy,$r,\'fill:orange;clip-path:url(#clip01);\')');
fs::circle(25,25,20,'fill:orange;clip-path:url(#clip01);');
fs::rect(15,15,40,40);
fs::clipPathOpen($id='clip02');
fs::rect(200,200,100,80);
fs::clipPathClose();
fs::image(100,100,400,200,'images/handed.men.jpg','clip-path:url(#clip02);');
fs::rect(200,200,100,80);
fs::text(80,300,'clipPathOpen($id=\'clip02\')');
fs::text(80,320,'rect($x,$y,$w,$h,$style)');
fs::text(80,340,'clipPathClose()');
fs::text(80,360,'image($x, $y, $w, $h, $href, $style)');
fs::svgClose();
include("footer.html");
?>

