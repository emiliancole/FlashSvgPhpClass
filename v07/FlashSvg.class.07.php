<?php
// FlashSvg.class.07.php
// Version updated with style instead of stroke, stroke-width, and fill.
// List of public static functions and syntax:
// ======================================================================
include('FlashSvgMath.class.php');
class_alias('FlashSvg', 'fs');

class FlashSvg {

// aOpen($href, $target)
public static function aOpen($href='https://google.com', $target='_blank') {
echo "<a href='$href' target='$target' >";
}

// aClose()
public static function aClose() {
echo "</a>";
}

// arcCcwDeg($mx, $my, $r, $deg, $style)
//arc counter-clockwise
//(mx,my) = first point coords
//r = arc radius; deg = arc angle in degrees
public static function arcCcwDeg($mx=100, $my=100, $r=30, $deg=45,  
$style='stroke:black;stroke-width:1;fill:none;') {
$rad=deg2rad($deg); $dx=$r*sin($rad); $dy=$r*(1-cos($rad)); $x=$mx+$dx; $y=$my-$dy;
echo "<path d='M$mx $my A$r $r 0 0 0 $x $y' style='$style' />";
return array($mx,$my,$r,$deg,$x,$y);
}

// arcCwDeg($mx, $my, $r, $deg, $style)
//arc clockwise
public static function arcCwDeg($mx=100, $my=100, $r=30, $deg=45, 
$style='stroke:black;stroke-width:1;fill:none;') {
$rad=deg2rad($deg); $dx=$r*sin($rad); $dy=$r*(1-cos($rad)); $x=$mx-$dx; $y=$my-$dy;
echo "<path d='M$mx $my A$r $r 0 0 1 $x $y' style='$style' />";
return array($mx,$my,$r,$deg,$x,$y);
}

// arcSectorCwDeg($cx, $cy, $r, $degStart, degEnd, $style)
public static function arcSectorCwDeg($mx=100, $my=100, $r=30, $degStart=0, $degEnd=45,
$style='stroke:black;stroke-width:1;fill:none;') {
$line1=fs::polarLineDeg($mx,$my,$r,$degStart); 
$line2=fs::polarLineDeg($mx,$my,$r,$degEnd);
$d='M'.$mx.','.$my.' L'.$line1[2].','.$line1[3].' A'.$r.','.$r.' 0 0 1 '.$line2[2].','.$line2[3].' Z';
fs::path($d,$style);
return array($mx,$my,$line1[2],$line1[3],$line2[2],$line2[3]);
}


// arrowLeft($x1, $y1, $dx, $style)
public static function arrowLeft($x1=100, $y1=100, $dx=20, 
$style='stroke:black;stroke-width:1;') { 
$n=4;
$x2=$x1+$dx; $y2=$y1; $x3=$x1+($dx/$n); $y3=$y2-($dx/$n); $x4=$x3; $y4=$y2+($dx/$n);
echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' style='$style' />";
echo "<line x1='$x1' y1='$y1' x2='$x3' y2='$y3' style='$style' />";
echo "<line x1='$x1' y1='$y1' x2='$x4' y2='$y4' style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// arrowRight($x1, $y1, $dx, $style)
public static function arrowRight($x1=100, $y1=100, $dx=20, 
$style='stroke:black;stroke-width:1;') { $n=4;
$x2=$x1-$dx; $y2=$y1; $x3=$x1-($dx/$n); $y3=$y2-($dx/$n); $x4=$x3; $y4=$y2+($dx/$n);
echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' style='$style' />";
echo "<line x1='$x1' y1='$y1' x2='$x3' y2='$y3' style='$style' />";
echo "<line x1='$x1' y1='$y1' x2='$x4' y2='$y4' style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// arrowUp($x1, $y1, $dx, $style)
public static function arrowUp($x1=100, $y1=100, $dx=20, 
$style='stroke:black;stroke-width:1;') { 
$n=4;
$x2=$x1; $y2=$y1+$dx; $x3=$x1-($dx/$n); $y3=$y1+($dx/$n); $x4=$x1+($dx/$n); $y4=$y3;
echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' style='$style' />";
echo "<line x1='$x1' y1='$y1' x2='$x3' y2='$y3' style='$style' />";
echo "<line x1='$x1' y1='$y1' x2='$x4' y2='$y4' style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// arrowDown($x1, $y1, $dx, $style)
public static function arrowDown($x1=100, $y1=100, $dx=20, 
$style='stroke:black;stroke-width:1;fill:none;') { 
$n=4;
$x2=$x1; $y2=$y1-$dx; $x3=$x1-($dx/$n); $y3=$y1-($dx/$n); $x4=$x1+($dx/$n); $y4=$y3;
echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' style='$style' />";
echo "<line x1='$x1' y1='$y1' x2='$x3' y2='$y3' style='$style' />";
echo "<line x1='$x1' y1='$y1' x2='$x4' y2='$y4' style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// bezierC($mx, $my, $x1, $y1, $x2, $y2, $x, $y, $style)
//C x1 y1, x2 y2, x y (or c dx1 dy1, dx2 dy2, dx dy)
//$mx,$my = starting absolute curve point
//$x1,$y1 = first control point
//$x2,$y2 = second control point
//$x,$y = last absolute curve point
public static function bezierC($mx=100, $my=100, $x1=120, $y1=80, $x2=180, $y2=80, $x=200, $y=100, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='M$mx $my C$x1 $y1, $x2 $y2, $x $y' style='$style' />";
return array($mx,$my,$x1,$y1,$x2,$y2,$x,$y);
}

// bezierS($mx, $my, $cx1, $cy1, $cx2, $cy2, $cx, $cy, $sx2, $sy2, $sx, $sy, $style)
//C x1 y1, x2 y2, x y (or c dx1 dy1, dx2 dy2, dx dy)
//S x2 y2, x y (or s dx2 dy2, dx dy)
//$mx,$my = starting absolute curve point
//$x1,$y1 = first control point
//$x2,$y2 = second control point
//$x,$y = last absolute curve point
public static function bezierS($mx=50, $my=50, $cx1=60, $cy1=30, $cx2=80, $cy2=30, $cx=150, $cy=50, 
$sx2=220, $sy2=120, $sx=250, $sy=50, 
$style='stroke:black;stroke-width:1;fill:none;') {
//echo circle($cx1,$cy1,3,'red'); echo circle($cx2,$cy2,3,'red');
//echo circle($cx,$cy,3,'red'); echo circle($sx2,$sy2,3,'red');
echo "<path d='M$mx $my C$cx1 $cy1, $cx2 $cy2, $cx $cy S$sx2 $sy2, $sx $sy' 
style='$style' />";
return array($mx,$my,$cx1,$cy1,$cx2,$cy2,$cx,$cy,$sx2,$sy2,$sx,$sy);
}

// bezierQ($mx, $my, $x1, $y1, $x, $y, $style)
//Q x1 y1, x y (or q dx1 dy1, dx dy)
//$mx,$my = starting absolute curve point
//$x1,$y1 = unique control point
//$x,$y = last absolute curve point
public static function bezierQ($mx=100, $my=100, $x1=150, $y1=80, $x=200, $y=100, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='M$mx $my Q$x1 $y1, $x $y' 
style='$style' />";
return array($mx,$my,$x1,$y1,$x,$y);
}

// bezierT($mx, $my, $qx1, $qy1, $qx, $qy, $tx, $ty, $style)
//T x y (or t dx dy)
//$mx,$my = starting absolute curve point
//$qx1,$qy1 = Q control point
//$qx,$qy = last absolute Q curve point
//$tx,$ty = last absolute T curve point
public static function bezierT($mx=100, $my=100, $qx1=150, $qy1=180, $qx=200, $qy=100, 
$tx=300, $ty=100,
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='M$mx $my Q$qx1 $qy1 $qx $qy T$tx $ty' 
style='$style' />";
return array($mx,$my,$qx1,$qy1,$qx,$qy,$tx,$ty);
}


// circleOpen($cx, $cy, $r, $style) 
public static function circleOpen($cx=50, $cy=50, $r=50, 
$style='stroke:blak;stroke-width:1;fill:none;') {
echo "<circle cx='$cx' cy='$cy' r='$r' style='$style' >";
}

// circle($cx, $cy, $r, $style) 
public static function circle($cx=100, $cy=100, $r=50, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<circle cx='$cx' cy='$cy' r='$r' style='$style' />";
return array($cx,$cy,$r);
}

// circleClose()
public static function circleClose() {
echo "</circle>";
}

// circleArcCw($mx, $my, $r, $x, $y, $style)
//A r x-axis-rotation large-arc-flag sweep-flag x y
//$mx,$my = starting absolute curve point
//$r = circle radius 
//$xar = x-axis-rotation
//$laflag = large-arc-flag
//$sflag= 1 clockwise sweep-flag
//$x,$y = last absolute curve point
public static function circleArcCw($mx=100, $my=100, $r=20, $x=200, $y=100, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='M$mx $my A$r $r 0 0 1 $x $y' 
style='$style' />";
return array($mx,$my,$r,$x,$y);
}

// circleArcCcw($mx, $my, $r, $x, $y, $style)
//A r x-axis-rotation large-arc-flag sweep-flag x y
//$mx,$my = starting absolute curve point (pixel)
//$r = circle radius (pixel)
//$xar = x-axis-rotation (degree)
//$laflag = large-arc-flag
//$sflag= 1 counter-clockwise sweep-flag
//$x,$y = last absolute curve point
public static function circleArcCcw($mx=100, $my=100, $r=20, $x=200, $y=100, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='M$mx $my A$r $r 0 1 0 $x $y' style='$style' />";
return array($mx,$my,$r,$x,$y);
}

// circleArcCcw90($mx, $my, $r, $style)
public static function circleArcCcw90($mx=100, $my=100, $r=20, 
$style='stroke:black;stroke-width:1;fill:none;') {
$x=$mx+$r; $y=$my-$r;
echo "<path d='M$mx $my A$r $r 0 0 0 $x $y' style='$style' />";
return array($mx,$my,$r,$x,$y);
}

// circleArcCw90($mx, $my, $r, $style)
public static function circleArcCw90($mx=100, $my=100, $r=20, 
$style='stroke:black;stroke-width:1;fill:none;') {
$x=$mx-$r; $y=$my-$r;
echo "<path d='M$mx $my A$r $r 0 0 1 $x $y' style='$style' />";
return array($mx,$my,$r,$x,$y);
}

// circleArcCcw180($mx, $my, $r, $style)
public static function circleArcCcw180($mx=100, $my=100, $r=20, 
$style='stroke:black;stroke-width:1;fill:none;') {
$x=$mx; $y=2*$my;
echo "<path d='M$mx $my A$r $r 0 0 0 $x $y' style='$style' />";
return array($mx,$my,$r,$x,$y);
}

// circleArcCw180($mx, $my, $r, $style)
public static function circleArcCw180($mx=100, $my=100, $r=20, 
$style='stroke:black;stroke-width:1;fill:none;') {
$x=$mx; $y=2*$my;
echo "<path d='M$mx $my A$r $r 0 0 1 $x $y' style='$style' />";
return array($mx,$my,$r,$x,$y);
}

// circleArrayH($cx, $cy, $r, $dx, $cols, $style)
public static function circleArrayH($cx=100, $cy=100, $r=10, $dx=25, $cols=5, 
$style='stroke:black;stroke-width:1;fill:none;') {
for ($i = 0; $i < $cols; $i++) { 
$xi=$cx+$dx*$i; $yi=$cy;
echo fs::circle($xi, $yi, $r, $style);
	}
return array($cx,$cy,$r,$dx,$cols);
}

// circleArrayV($cx, $cy, $r, $dy, $rows, $style)
public static function circleArrayV($cx=100, $cy=100, $r=10, $dy=20, $rows=4, 
$style='stroke:black;stroke-width:1;fill:none;') {
for ($i = 0; $i < $rows; $i++) { 
$xi=$cx; $yi=$cy+$dy*$i;
echo fs::circle($xi, $yi, $r, $style);
	}
return array($cx,$cy,$r,$dy,$rows);
}

// circleArrayHV($cx, $cy, $r, $dx, $rows, $cols, $style)
public static function circleArrayHV($cx=100, $cy=100, $r=5, $dx=20, $rows=3, $cols=4, 
$style='stroke:black;stroke-width:1;fill:none;') {
for ($i = 0; $i < $cols; $i++) { 
$xi=$cx+$dx*$i; $yi=$cy;
fs::circleArrayV($xi, $yi, $r, $dx, $rows, $style);
	}
return array($cx,$cy,$r,$dx,$rows,$cols);
}


// clipPathOpen($id)
public static function clipPathOpen($id='clip01') {
echo "<clipPath id='$id' >";
}

// clipPathClose()
public static function clipPathClose() {
echo "</clipPath>";
}

// cross($cx, $cy, $d, $style)
//(cx,cy) = cross center coords
//d = cross width/height
public static function cross($cx=50, $cy=50, $d=20, 
$style='stroke:red;stroke-width:1') {
$x1=$cx-$d/2; $x2=$cx+$d/2; $y1=$cy-$d/2; $y2=$cy+$d/2;
fs::lineH($x1, $cy, $x2, $style);
fs::lineV($cx, $y1, $y2, $style);
return array($x1,$y1,$x2,$y2);
}

// defsOpen($id)
public static function defsOpen($id='defs01') {
echo "<defs id=$id>";
}

// defsClose()
public static function defsClose() {
echo "</defs>";
}


//first point of diamond to the top
// diamondUp($x1, $y1, $dx, $style)
public static function diamondUp($x1=100, $y1=100, $dx=10, 
$style='stroke:black;stroke-width:1;fill:none;') {
$x2=$x1+$dx/2; $y2=$y1+$dx;
$x3=$x1; $y3=$y1+2*$dx;
$x4=$x1-$dx/2; $y4=$y1+$dx;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4' 
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

//first point of diamond to the bottom
// diamondDown($x1, $y1, $dx, $style)
public static function diamondDown($x1=100, $y1=100, $dx=10, 
$style='stroke:black;stroke-width:1;fill:none;') {
$x2=$x1-$dx/2; $y2=$y1-$dx;
$x3=$x1; $y3=$y1-2*$dx;
$x4=$x1+$dx/2; $y4=$y1-$dx;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3,$x4,$y4' 
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

//first point of diamond to the left
// diamondLeft($x1, $y1, $dx, $style)
public static function diamondLeft($x1=100, $y1=100, $dx=10, 
$style='stroke;black;stroke-width:1;fill:none;') {
$x2=$x1+$dx; $y2=$y1-$dx/2;
$x3=$x1+2*$dx; $y3=$y1;
$x4=$x1+$dx; $y4=$y1+$dx/2;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3,$x4,$y4' 
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

//first point of diamond to the right
// diamondRight($x1, $y1, $dx, $style)
public static function diamondRight($x1=100, $y1=100, $dx=10, 
$style='stroke:black;stroke-width:1;fill:none;') {
$x2=$x1-$dx; $y2=$y1+$dx/2;
$x3=$x1-2*$dx; $y3=$y1;
$x4=$x1-$dx; $y4=$y1-$dx/2;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3,$x4,$y4' 
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// ellipse($cx, $cy, $rx, $ry, $style) 
public static function ellipse($cx=150, $cy=50, $rx=40, $ry=20, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<ellipse cx='$cx' cy='$cy' rx='$rx' ry='$ry' style='$style' />";
return array($cx,$cy,$rx,$ry);
}

// ellipseArc($mx, $my, $rx, $ry, $xar, $laflag, $sflag, $x, $y, $style)
//A rx ry x-axis-rotation large-arc-flag sweep-flag x y
//$mx,$my = starting absolute curve point
//$rx,$ry = ellipse radiuses 
//$xar = x-axis-rotation
//$laflag = large-arc-flag
//$sflag = sweep-flag
//$x,$y = last absolute curve point
public static function ellipseArc($mx=100, $my=100, $rx=20, $ry=50, $xar=0, $laflag=0, $sflag=0, 
$x=200, $y=100, $style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='M$mx $my A$rx $ry $xar $laflag $sflag $x $y' 
style='$style' />";
return array($mx,$my,$rx,$ry,$xar,$laflag,$sflag,$x,$y);
}

// ellipseArcCcw($mx, $my, $rx, $ry, $x, $y, $style)
public static function ellipseArcCcw($mx=100, $my=100, $rx=20, $ry=50,
$x=200, $y=100, $style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='M$mx $my A$rx $ry 0 0 0 $x $y' 
style='$style' />";
return array($mx,$my,$rx,$ry,$x,$y);
}

// ellipseArcCw($mx, $my, $rx, $ry, $x, $y, $style)
public static function ellipseArcCw($mx=100, $my=100, $rx=20, $ry=50, 
$x=200, $y=100, $style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='M$mx $my A$rx $ry 0 1 1 $x $y' 
style='$style' />";
return array($mx,$my,$rx,$ry,$x,$y);
}

// gOpen($id, $transform, $style)
//transform = 'rotate(cx cy angle) translate(dx dy) scale(x y)' 
public static function gOpen($id='g01', $transform='rotate(0 0 0)', 
	$style='') {
echo "<g id='$id' transform='$transform' style='$style' >";
}

// gClose()
public static function gClose() {
echo "</g>";
}

// gridH($w, $dy, $rows, $style)
public static function gridH($w=500, $dy=10, $rows=10, 
$style='stroke:grey;stroke-width=0.5') {
for ($i = 0; $i <= $rows; $i++) { 
	$xi=0; $yi=$dy*$i;
	echo fs::lineH($xi,$yi,$w,$style);
	}
return array($w,$dy,$rows);
}

// gridV($h, $dx, $cols, $style)
public static function gridV($h=500, $dx=10, $cols=10, 
$style='stroke:grey;stroke-width=0.5') {
for ($i = 0; $i <= $cols; $i++) { 
	$yi=0; $xi=$dx*$i;
	echo fs::lineV($xi,$yi,$h,$style);
	}
return array($h,$dx,$cols);
}

// grid($w, $h, $dx, $dy, $rows, $cols, $style)
public static function grid($w=500, $h=500, $dx=10, $dy=10, 
$rows=50, $cols=50, $style='stroke:grey;stroke-width:0.5') {
fs::gOpen('grid');
fs::gridH($w, $dy, $rows);
fs::gridV($h, $dx, $cols);
fs::gClose();
return array($w,$h,$dx,$dy,$rows,$cols);
}

// grid01($x1, $y1, $x2, $y2, $dx, $dy, $rows, $cols, $style)
public static function grid01($x1=0, $y1=0, $x2=500, $y2=500, $dx=10, $dy=10, 
$rows=50, $cols=50, $style='stroke:grey;stroke-width:0.5') {
fs::gOpen('grid');
fs::gridH($x1, $y1, $x2, $dy, $rows);
fs::gridV($x1, $y1, $y2, $dx, $cols);
fs::gClose();
return array($x1,$y1,$x2,$y2,$dx,$dy,$rows,$cols);
}

// hexagonDeg($cx, $cy, $r, $startDeg, $style)
public static function hexagonDeg($cx=100, $cy=100, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/6; $start=deg2rad($startDeg);
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianRad($r,$start);
$arr2=fm::returnCartesianRad($r,$start+$alpha);
$arr3=fm::returnCartesianRad($r,$start+2*$alpha);
$arr4=fm::returnCartesianRad($r,$start+3*$alpha);
$arr5=fm::returnCartesianRad($r,$start+4*$alpha);
$arr6=fm::returnCartesianRad($r,$start+5*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1];
$x6=$cx+$arr6[0]; $y6=$cy+$arr6[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5,$x6,$y6);
}


// hexagonRad($cx, $cy, $r, $startRad, $style)
//(cx,cy) = hexagon center
//r = circle radius
//startRad = start angle in radians
public static function hexagonRad($cx=100, $cy=100, $r=50, $startRad=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/6;
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianRad($r,$startRad);
$arr2=fm::returnCartesianRad($r,$startRad+$alpha);
$arr3=fm::returnCartesianRad($r,$startRad+2*$alpha);
$arr4=fm::returnCartesianRad($r,$startRad+3*$alpha);
$arr5=fm::returnCartesianRad($r,$startRad+4*$alpha);
$arr6=fm::returnCartesianRad($r,$startRad+5*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1];
$x6=$cx+$arr6[0]; $y6=$cy+$arr6[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5,$x6,$y6);
}

// heptagonDeg($cx, $cy, $r, $startDeg, $style)
public static function heptagonDeg($cx=100, $cy=100, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none') { 
$alpha=2*M_PI/7; $start=deg2rad($startDeg);
$arr1=fm::returnCartesianRad($r,$start);
$arr2=fm::returnCartesianRad($r,$start+$alpha);
$arr3=fm::returnCartesianRad($r,$start+2*$alpha);
$arr4=fm::returnCartesianRad($r,$start+3*$alpha);
$arr5=fm::returnCartesianRad($r,$start+4*$alpha);
$arr6=fm::returnCartesianRad($r,$start+5*$alpha);
$arr7=fm::returnCartesianRad($r,$start+6*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1];
$x6=$cx+$arr6[0]; $y6=$cy+$arr6[1];
$x7=$cx+$arr7[0]; $y7=$cy+$arr7[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6 $x7,$y7'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5,$x6,$y6,$x7,$y7);
}


// heptagonRad($cx, $cy, $r, $start, $style)
public static function heptagonRad($cx=100, $cy=100, $r=50, $start=0,
$style='stroke:black;stroke-width:1;fill:none') { 
$alpha=2*M_PI/7;
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianRad($r,$start);
$arr2=fm::returnCartesianRad($r,$start+$alpha);
$arr3=fm::returnCartesianRad($r,$start+2*$alpha);
$arr4=fm::returnCartesianRad($r,$start+3*$alpha);
$arr5=fm::returnCartesianRad($r,$start+4*$alpha);
$arr6=fm::returnCartesianRad($r,$start+5*$alpha);
$arr7=fm::returnCartesianRad($r,$start+6*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1];
$x6=$cx+$arr6[0]; $y6=$cy+$arr6[1];
$x7=$cx+$arr7[0]; $y7=$cy+$arr7[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6 $x7,$y7'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5,$x6,$y6,$x7,$y7);
}


// image($x, $y, $w, $h, $href, $style)
public static function image($x=100, $y=100, $w='100%', $h='100%', $href='aaa.jpg', $style='none') {
echo "<image x=$x y=$y width='$w' height='$h' xlink:href='$href' style='$style' />";
return array($x, $y, $w, $h, $href);
}


// imageArrayH($x, $y, $w, $h, $dx, $cols, $href)
public static function imageArrayH($x=0, $y=100, $w=50, $h=50, $dx=100, 
$cols=5, $href='squareRed.50px.svg') {
for ($i = 0; $i < $cols; $i++) { 
$xi=$x+$dx*$i; $yi=$y;
echo fs::image($xi, $yi, $w, $h, $href);
	}
return array($x,$y,$w,$h,$dx,$cols,$href);
}

// imageArrayV($x, $y, $w, $h, $dy, $rows, $href)
public static function imageArrayV($x=0, $y=100, $w=50, $h=50, $dy=100, 
$rows=5, $href='squareRed.50px.svg') {
for ($i = 0; $i < $rows; $i++) { 
$xi=$x; $yi=$y+$dy*$i;
echo fs::image($xi, $yi, $w, $h, $href);
	}
return array($x,$y,$w,$h,$dy,$rows,$href);
}

// insertSvg($x, $y, $href='svgfileonly.svg')
public static function insertSvg($x=100, $y=100, $href='squareRed.50px.svg') {
echo "<g transform='translate($x,$y)' >";
$obj= file_get_contents($href);
echo $obj;
echo "</g>";
return array($x,$y,$href);
}



// line($x1, $y1, $x2, $y2, $style)
public static function line($x1=50, $y1=50, $x2=100, $y2=100, 
$style='stroke:black;stroke-width:1;') {
echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' style='$style' />";
return array($x1,$y1,$x2,$y2);
}

// lineH($x1, $y1, $x2, $style)
public static function lineH($x1=50, $y1=50, $x2=100, 
$style='stroke:black;stroke-width:1') {
echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y1' style='$style' />";
return array($x1,$y1,$x2,$y2);
}

// lineSlope($x1, $y1, $x2, $m, $style)
public static function lineSlope($x1=100, $y1=100, $x2=200, $m=0,
	$style='stroke:black;stroke-width:1') {
$y2=$m*($x2-$x1)+$y1;
fs::point($x1,$y1);
fs::line($x1, $y1, $x2, $y2, $style);
return array($x1,$y1,$x2,$y2);
}

// lineV($x1, $y1, $y2, $style)
public static function lineV($x1=50, $y1=50, $y2=140, 
$style='stroke:black;stroke-width:1') {
echo "<line x1='$x1' y1='$y1' x2='$x1' y2='$y2' style='$style' />";
return array($x1,$y1,$x2,$y2);
}

// lineTo($mx, $my, $x1, $y1, $style)
public static function lineTo($mx=100, $my=100, $x1=150, $y1=150, 
$style='stroke:black;stroke-width:1;') {
echo "<path d='M$mx $my L$x1 $y1' style='$style' />";
return array($mx,$my,$x1,$y1);
}

// lineToH($mx, $my, $x1, $x2, $style)
public static function lineToH($mx=100, $my=100, $x1=200, 
$style='stroke:black;stroke-width:1;') {
echo "<path d='M$mx $my H$x1' style='$style' />";
return array($mx,$my,$x1,$my);
}

// lineToV($mx, $my, $y1, $y2, $style)
public static function lineToV($mx=100, $my=100, $y1=200, 
$style='stroke:black;stroke-width:1;') {
echo "<path d='M$mx $my V$y1' style='$style' />";
array($mx,$my,$mx,$y1);
}


// lineParallel($x1, $y1, $x2, $y2, $dx, $dy, $style)
//(x1,y1)-(x2,y2) = base line points coords
//(dx,dy) = parallel line distances
public static function lineParallel($x1=50, $y1=50, $x2=100, $y2=100, $dx=10, $dy=0, 
$style='stroke:black;stroke-width:1;') {
$x3=$x1+$dx; $y3=$y1+$dy;
$x4=$x2+$dx; $y4=$y2+$dy;
//line($x1, $y1, $x2, $y2, $style);
line($x3, $y3, $x4, $y4, $style);
return array($x3, $y3, $x4, $y4);
}

// linePerpendicular($x1, $y1, $x2, $y2, $x3, $y3, $style) 
//(x1,y1,x2,y2) = base line coords
//(x3,y3) = external point
//(x3,y3,x3,y4) = perpendicular line to base line coords
public static function linePerpendicular($x1=100, $y1=100, $x2=200, $y2=200, $x3=150, $y3=300, 
	 $style='stroke:black;stroke-width:1') {
if ($m!==0) {
$m = ($y2-$y1)/($x2-$x1);
$x4=($m*$x3+$y3+$m*$x1-$y1)/(2*$m);
$y4=$m*($x4-$x1)+$y1;
//line($x1,$y1,$x2,$y2,$style);
//point($x3,$y3); point($x4,$y4,2,'fill:red;');
fs::line($x3, $y3, $x4, $y4, $style);
return array($x3,$y3,$x4,$y4);
	} else exit();
}


// mirrorLine($x1,$y1,$x2,$y2,$xr1,$yr1,$xr2,$yr2,$style) 
//($x1,$y1,$x2,$y2) = existing line coords
//($xr1,$yr1,$xr2,$yr2) = reference line coords
public static function mirrorLine($x1=10,$y1=50,$x2=20,$y2=70,$xr1=10,$yr1=10,
$xr2=200,$yr2=200, $style='stroke:black;stroke-width:1') {
$arrP1=fm::mirrorPoint($x1,$y1,$xr1,$yr1,$xr2,$yr2);
$arrP2=fm::mirrorPoint($x2,$y2,$xr1,$yr1,$xr2,$yr2);
$res=fs::line($arrP1[0], $arrP1[1], $arrP2[0], $arrP2[1], $style);
return $res;
}

// mirrorPoint($x, $y, $x1, $y1, $x2, $y2, $r, $style) 
//(x,y) = existing point 
//(x1,y1,x2,y2) = line coords
public static function mirrorPoint($x=100,$y=100,$x1=100,$y1=200,$x2=200,$y2=100,$r=2,
	$style='stroke:black;stroke-width:1;fill:none;') {
$arrP=fm::mirrorPoint($x, $y, $x1, $y1, $x2, $y2);
//point($x,$y); line($x1,$y1,$x2,$y2);
//$px=$arrP[2]; $py=$arrP[3];
//point($px,$py);
//$dx=$px-$x; $dy=$py-$y;
//$xs=$px+$dx; $ys=$py+$dy;
$px=$arrP[0]; $py=$arrP[1];
fs::point($px,$py,$r,$style);
return array($px,$py);
}


// moveTo($x1, $y1, $style)
public static function moveTo($x1=100, $y1=100, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='M$x1 $y1' style='$style' />";
return array($x1,$y1);
}


// octagonRad($cx, $cy, $r, $start, $style)
//C = (cx,cy) = center of array coords
//r = radius; start = start angle in radians
public static function octagonRad($cx=100, $cy=100, $r=50, $start=0,
$style='stroke:black;stroke-width:1;fill:none') { 
$alpha=2*M_PI/8;
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianRad($r,$start);
$arr2=fm::returnCartesianRad($r,$start+$alpha);
$arr3=fm::returnCartesianRad($r,$start+2*$alpha);
$arr4=fm::returnCartesianRad($r,$start+3*$alpha);
$arr5=fm::returnCartesianRad($r,$start+4*$alpha);
$arr6=fm::returnCartesianRad($r,$start+5*$alpha);
$arr7=fm::returnCartesianRad($r,$start+6*$alpha);
$arr8=fm::returnCartesianRad($r,$start+7*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1];
$x6=$cx+$arr6[0]; $y6=$cy+$arr6[1];
$x7=$cx+$arr7[0]; $y7=$cy+$arr7[1];
$x8=$cx+$arr8[0]; $y8=$cy+$arr8[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6 $x7,$y7 $x8,$y8'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5,$x6,$y6,$x7,$y7,$x8,$y8);
}

// octagonDeg($cx, $cy, $r, $startDeg, $style)
//C = (cx,cy) = center of array coords
//r = radius; start = start angle in degrees
public static function octagonDeg($cx=100, $cy=100, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none') { 
$alpha=2*M_PI/8; $start=deg2rad($startDeg);
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianDeg($r,$start);
$arr2=fm::returnCartesianDeg($r,$start+$alpha);
$arr3=fm::returnCartesianDeg($r,$start+2*$alpha);
$arr4=fm::returnCartesianDeg($r,$start+3*$alpha);
$arr5=fm::returnCartesianDeg($r,$start+4*$alpha);
$arr6=fm::returnCartesianDeg($r,$start+5*$alpha);
$arr7=fm::returnCartesianDeg($r,$start+6*$alpha);
$arr8=fm::returnCartesianDeg($r,$start+7*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1];
$x6=$cx+$arr6[0]; $y6=$cy+$arr6[1];
$x7=$cx+$arr7[0]; $y7=$cy+$arr7[1];
$x8=$cx+$arr8[0]; $y8=$cy+$arr8[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6 $x7,$y7 $x8,$y8'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5,$x6,$y6,$x7,$y7,$x8,$y8);
}

// patternOpen($id, $w, $h, $patternUnits)
public static function patternOpen($id='pattern01', $w=10, $h=10, $patternUnits='userSpaceOnUse') {
echo "<pattern id=$id width=$w height=$h patternUnits=$patternUnits >";
return array($id,$w,$h,$patternUnits);
}


// path($d, $style)
public static function path($d='M100,100 200,200', 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<path d='$d' style='$style' />";
return $d;
}

// pathId($id, $d, $style)
public static function pathId($id='path01', $d='M10,110 120,120', 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<path id=$id d='$d' style='$style' />";
return array($id,$d);
}


// patternClose()
public static function patternClose() {
echo "</pattern>";
}


// patternHatch($id, $w, $h, $patternTransform, $patternUnits)
public static function patternHatch($id='diagonalHatch', $w=10, $h=10, $patternTransform='rotate(45)', 
	$patternUnits='userSpaceOnUse') {
echo "<pattern id=$id width=$w height=$h patternTransform=$patternTransform patternUnits=$patternUnits >";
echo "<line x1='0' y1='0' x2='0' y2='10' />";
echo "</pattern>";
return array($id,$w,$h,$patternTransform,$patternUnits);
}

// pentagonDeg($cx, $cy, $r, $start, $style)
public static function pentagonDeg($cx=100, $cy=100, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/5; $start=deg2rad($startDeg);
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianDeg($r,$start);
$arr2=fm::returnCartesianDeg($r,$start+$alpha);
$arr3=fm::returnCartesianDeg($r,$start+2*$alpha);
$arr4=fm::returnCartesianDeg($r,$start+3*$alpha);
$arr5=fm::returnCartesianDeg($r,$start+4*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5);
}

// pentagonRad($cx, $cy, $r, $start, $style)
public static function pentagonRad($cx=100, $cy=100, $r=50, $start=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/5; 
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianRad($r,$start);
$arr2=fm::returnCartesianRad($r,$start+$alpha);
$arr3=fm::returnCartesianRad($r,$start+2*$alpha);
$arr4=fm::returnCartesianRad($r,$start+3*$alpha);
$arr5=fm::returnCartesianRad($r,$start+4*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5);
}

// point($cx, $cy, $r, $style)
public static function point($cx=100, $cy=100, $r=2, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<circle cx='$cx' cy='$cy' r='$r' style='$style' />";
return array($cx,$cy,$r);
}

// polarLineDeg($cx, $cy, $r, $deg, $style)
//C = (cx,cy) = center of array coords
//r = radius; n = number of lines centered in C
//alphaDeg = line angle in degrees
public static function polarLineDeg($cx=100, $cy=100, $r=50, $deg=0, 
$style='stroke:black;stroke-width=1') {
$rad=deg2rad($deg);
$array=fm::returnCartesianRad($r,$rad);
$x = $array[0]; $y = $array[1];
$x1=$cx+$x; $y1=$cy+$y;
fs::line($cx,$cy,$x1,$y1,$style);
return array($cx,$cy,$x1,$y1);
}


// polarLineRad($cx, $cy, $r, $rad, $style)
//C = (cx,cy) = center of array coords
//r = radius; n = number of lines centered in C
//alpha = line angle in radians
public static function polarLineRad($cx=100, $cy=100, $r=50, $rad=0, 
$style='stroke:black;stroke-width=1') {
$array=fm::returnCartesianRad($r,$rad);
$x = $array[0]; $y = $array[1];
$x1=$cx+$x; $y1=$cy+$y;
fs::line($cx,$cy,$x1,$y1,$style);
return array($cx,$cy,$x1,$y1);
}


// polarLineArrayRad($cx, $cy, $r, $n, $alpha, $style)
//C = (cx,cy) = center of array coords
//r = radius; n = number of lines centered in C
//alpha = step angle in radians
public static function polarLineArrayRad($cx=100, $cy=100, $r=50, $n=6, $alpha=M_PI/8, 
$style='stroke:black;stroke-width:1;') {
for ($i = 1; $i <= $n; $i++) {
$array=fm::returnCartesianRad($r,$i*$alpha);
$x = $array[0]; $y = $array[1];
//point($cx,$cy);
$x1=$cx+$x; $y1=$cy+$y;
//point($x1,$y1);
fs::line($cx,$cy,$x1,$y1,$style);
	}
return array($cx,$cy,$r,$n,$alpha);
}

// polarLineArrayDeg($cx, $cy, $r, $n, $alphaDeg, $style)
//C = (cx,cy) = center of array coords
//r = radius; n = number of lines centered in C
//alpha = step angle in degrees
public static function polarLineArrayDeg($cx=100, $cy=100, $r=50, $n=6, $alphaDeg=10, 
$style='stroke:black;stroke-width:1;') {
$alpha=deg2rad($alphaDeg);
for ($i = 1; $i <= $n; $i++) {
$array=fm::returnCartesianRad($r,$i*$alpha);
$x = $array[0]; $y = $array[1];
//point($cx,$cy);
$x1=$cx+$x; $y1=$cy+$y;
//point($x1,$y1);
line($cx,$cy,$x1,$y1,$style);
	}
return array($cx,$cy,$r,$n,$alphaDeg);
}


// polarPointArrayDeg($cx, $cy, $r, $n, $alphaDeg, $style)
//C = (cx,cy) = center of array coords
//r = radius; n = number of points
//alphaDeg = step angle in degrees
public static function polarPointArrayDeg($cx=100, $cy=100, $r=50, $n=4, $alphaDeg=45, 
$style='stroke:black;stroke-width:1;fill:none;') {
$alpha=deg2rad($alphaDeg);
for ($i = 0; $i <= $n-1; $i++) {
$array=fm::returnCartesianRad($r,$i*$alpha);
$x = $array[0]; $y = $array[1];
//point($cx,$cy,3,'fill:red;');
$x1=$cx+$x; $y1=$cy+$y;
fs::point($x1,$y1,1,$style);
//line($cx,$cy,$x1,$y1);
	}
return array($cx,$cy,$r,$n,$alphaDeg);
}

// polarPointDeg($cx, $cy, $r, $alphaDeg, $style)
//C = (cx,cy) = center of array coords
//r = radius (distance from C)
//alphaDeg = angle in degrees
public static function polarPointDeg($cx=100, $cy=100, $r=10, $alphaDeg=45, 
$style='stroke:black;stroke-width:1;fill:none;') {
$alpha=deg2rad($alphaDeg);
$array=fm::returnCartesianRad($r,$alpha);
$x = $array[0]; $y = $array[1];
//point($cx,$cy,3,'fill:red;');
$x1=$cx+$x; $y1=$cy+$y;
fs::point($x1,$y1,1,$style);
//line($cx,$cy,$x1,$y1);
return array($x1,$y1);
}

// polarPointArrayRad($cx, $cy, $r, $n, $alpha, $style)
//C = (cx,cy) = center of array coords
//r = radius; n = number of points
//alpha = step angle in radians
public static function polarPointArrayRad($cx=100, $cy=100, $r=50, $n=4, $alpha=M_PI/4, 
$style='stroke:black;stroke-width:1;fill:none;') {
for ($i = 0; $i <= $n-1; $i++) {
$array=fm::returnCartesianRad($r,$i*$alpha);
$x = $array[0]; $y = $array[1];
//point($cx,$cy,3,'fill:red;');
$x1=$cx+$x; $y1=$cy+$y;
fs::point($x1,$y1,1,$style);
//line($cx,$cy,$x1,$y1);
	}
return array($cx,$cy,$r,$n,$alpha);
}

// polarRhombus($cx, $cy, $r, $style)
public static function polarRhombus($cx=100, $cy=100, $r=50, 
$style='stroke:black;stroke-width:1;fill:none') { 
$alpha=2*M_PI/4;
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianRad($r,0);
$arr2=fm::returnCartesianRad($r,$alpha);
$arr3=fm::returnCartesianRad($r,2*$alpha);
$arr4=fm::returnCartesianRad($r,3*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// polygon($points, $style)
public static function polygon($points='50,50 50,100 100,100', 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<polygon points='$points'  
style='$style' />";
return $points;
}

// polygon3P($x1, $y1, $x2, $y2, $x3, $y3, $style)
public static function polygon3P($x1=100,$y1=100,$x2=150,$y2=100,$x3=125,$y3=125, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<polygon points='$x1,$y1 $x2,$y2  $x3,$y3'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3);
}

// polygon4P($x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4, $style)
public static function polygon4P($x1=100,$y1=100,$x2=150,$y2=50,
	$x3=200,$y3=150,$x4=100,$y4=150,
    $style='stroke:black;stroke-width:1;fill:none;') {
echo "<polygon points='$x1,$y1 $x2,$y2  $x3,$y3 $x4,$y4'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// polygon4($arrx, $arry, $style)
public static function polygon4($arrx=array(100,200,175,125), $arry=array(100,100,50,50), 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<polygon points='$arrx[0],$arry[0] $arrx[1],$arry[1] 
$arrx[2],$arry[2] $arrx[3],$arry[3]'  
style='$style' />";
return array($arrx[0],$arry[0],$arrx[1],$arry[1],$arrx[2],$arry[2],$arrx[3],$arry[3]);
}

// polyline($points, $style)
public static function polyline($points='100,50 200,50 200,100', 
$style='stroke:black;stroke-width:1;fill:none') {
echo "<polyline points='$points'  
style='$style' />";
return $points;
}

// polyline4($arrx, $arry, $style)
public static function polyline4($arrx=array(100,200,175,125), $arry=array(100,100,50,50), 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<polyline points='$arrx[0],$arry[0] $arrx[1],$arry[1] 
$arrx[2],$arry[2] $arrx[3],$arry[3]'  
style='$style' />";
return array($arrx[0],$arry[0],$arrx[1],$arry[1],$arrx[2],$arry[2],$arrx[3],$arry[3]);
}


// quotePoints($x1, $y1, $x2, $y2, $style)
public static function quotePoints($x1=100, $y1=100, $x2=200, $y2=200, 
$style='stroke:black;stroke-width:1;fill:black;') { 
echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' style='$style' />";
fs::circle($x1,$y1,3,'$style');
fs::circle($x2,$y2,3,'$style');
}

// quoteH($x1, $y1, $x2, $dx, $style)
public static function quoteH($x1=100, $y1=100, $x2=200, $dx=20, 
$style='stroke:black;stroke-width:1;fill:none;') { 
$y2=$y1; 
echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' style='$style' />";
fs::arrowLeft($x1, $y1, $dx, $style);
fs::arrowRight($x2, $y2, $dx, $style);
}

// quoteV($x1, $y1, $x2, $dx, $style)
public static function quoteV($x1=100, $y1=100, $y2=200, $dx=20, 
$style='stroke:black;stroke-width:1;') { $x2=$x1; 
echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' style='$style' />";
fs::arrowUp($x1, $y1, $dx, $style);
fs::arrowDown($x2, $y2, $dx, $style);
}

// rectOpen($x, $y, $w, $h, $style')
public static function rectOpen($x=100, $y=100, $w=100, $h=50, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<rect x='$x' y='$y' width='$w' height='$h' style='$style' >";
}

// rect($x, $y, $w, $h, $style)
public static function rect($x=100, $y=100, $w=100, $h=50, 
$style='stroke:black;stroke-width:1;fill:none;') {
echo "<rect x='$x' y='$y' width='$w' height='$h' style='$style' />";
return array($x,$y,$w,$h);
}

// rectRotDeg($x1, $y1, $w, $h, $deg, $style)
//rect rotation around the point (x1,y1)
//(x1,y1) = initial top left corner
//w = rect width
//h = rect height
//return array(xi,yi) = rect rotated points coords
public static function rectRotDeg($x1=100, $y1=100, $w=100, $h=50, $deg=45, 
$style='stroke:black;stroke-width:1;fill:none') {
$rad=deg2rad($deg);
$x2=$x1+$w*cos($rad); $y2=$y1-$w*sin($rad);
//point($x1,$y1); point($x2,$y2);
$x3=$x2+$h*sin($rad); $y3=$y2+$h*cos($rad);
$x4=$x1+$h*sin($rad); $y4=$y1+$h*cos($rad);
//point($x3,$y3); point($x4,$y4);
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4' style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// rectClose()
public static function rectClose() {
echo "</rect>";
}

// rectRounded($x, $y, $w, $h, $rx, $ry, $style)
public static function rectRounded($x=100, $y=100, $w=150, $h=50, $rx=10, $ry=10, 
$style='stroke:black;stroke-width:1;fill:none') {
echo "<rect x='$x' y='$y' width='$w' height='$h' rx='$rx' ry='$ry' 
style='$style' />";
return array($x,$y,$w,$h,$rx,$ry);
}


// squareDeg($cx, $cy, $r, $startDeg, $style)
public static function squareDeg($cx=100, $cy=100, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/4; $start=deg2rad($startDeg);
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianRad($r,$start);
$arr2=fm::returnCartesianRad($r,$start+$alpha);
$arr3=fm::returnCartesianRad($r,$start+2*$alpha);
$arr4=fm::returnCartesianRad($r,$start+3*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// squareRad($cx, $cy, $r, $start, $style)
public static function squareRad($cx=100, $cy=100, $r=50, $start=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/4; 
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianRad($r,$start);
$arr2=fm::returnCartesianRad($r,$start+$alpha);
$arr3=fm::returnCartesianRad($r,$start+2*$alpha);
$arr4=fm::returnCartesianRad($r,$start+3*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}


// style($type, $content)
public static function style($type='text/css', $content='line {stroke: navy;}') {
echo "<style type=$type>";
echo "$content</style>";
}

// styleCss($content)
public static function styleCss($content='line {stroke: navy;}') {
echo "<style type='text/css' >";
echo "$content</style>";
}


// svgOpen($w, $h, $xmlns)
public static function svgOpen($w=500, $h=500, $xmlns='http://www.w3.org/2000/svg') {
echo "<svg width='$w' height='$h' viewBox='0 0 $w $h' xmlns='$xmlns'>";
return array($w,$h);
}

// svgClose()
public static function svgClose() {
echo "</svg>";
}

// symbolOpen($id)
public static function symbolOpen($id='sym01') {
echo "<symbol id='$id' >";
}

// symbolViewboxOpen($id, $preserveAspectRatio, $viewBox)
public static function symbolViewboxOpen($id='sym01', $preserveAspectRatio='yes', $viewBox='0 0 500 500') {
echo "<symbol id=$id preserveAspectRatio=$preserveAspectRatio viewBox=$viewBox >";
}

// symbolClose()
public static function symbolClose() {
echo "</symbol>";
}

// tagOpen($tag)
public static function tagOpen($tag) {
echo "<$tag>";
}

// tagClose($tag)
public static function tagClose($tag) {
echo "</$tag>";
}


// textOpen($x, $y, $string, $style,)
public static function textOpen($x=100, $y=100, $string='aaa', 
$style='fill:black;font-family:Verdana;font-size:14;') {
echo "<text x='$x' y='$y' style='$style' >$string";
}

// tspan($string, $style)
public static function tspan($string='string', 
$style='fill:black;font-family:Verdana;font-size:14;') {
echo "<tspan style='$style' >$string</tspan>";
}

// text($x, $y, $string, $style)
public static function text($x=100, $y=100, $string='string', 
$style='fill:black;font-family:Georgia;font-size:14') {
echo "<text x='$x' y='$y' style='$style' >$string</text>";
return array($x,$y);
}

// textBox($x, $y, $w, $h, $r, $string, $style)
public static function textBox($x=100, $y=100, $w=150, $h=50, $r=10, $string='string',
$style="stroke:black;stroke-width:1;fill:none;") { $ry=$rx;
echo "<rect x='$x' y='$y' width='$w' height='$h' rx='$r' ry='$r' 
style='$style' />";
fs::text($x+$w/2, $y+$h/2, $style, $string);
return array($x,$y,$w,$h,$r);
}

// title($string, $style)
public static function title($string='TITLE', $style='stroke-width:1; stroke:blue;') {
echo "<title style='$style' >$string";
echo "</title>";
return $string;
}


// triangle($x1, $y1, $x2, $y2, $x3, $y3, $style)
public static function triangle($x1=200, $y1=50, $x2=140, $y2=140, $x3=200, 
$y3=120, $style='stroke:black;stroke-width:1;fill:none;') {
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3' style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3);
}

// triangleRad($cx, $cy, $r, $start, $style)
public static function triangleRad($cx=100, $cy=100, $r=50, $start=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/3;
//circle($cx,$cy,$r);
$arr1=fm::returnCartesianRad($r,$start);
$arr2=fm::returnCartesianRad($r,$start+$alpha);
$arr3=fm::returnCartesianRad($r,$start+2*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3);
}

// triangleDeg($cx, $cy, $r, $startDeg, $style)
public static function triangleDeg($cx=100, $cy=100, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/3; $start=deg2rad($startDeg);
$arr1=fm::returnCartesianRad($r,$start);
$arr2=fm::returnCartesianRad($r,$start+$alpha);
$arr3=fm::returnCartesianRad($r,$start+2*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3);
}

// useSymbol($x, $y, $w, $h, $href)
public static function useSymbol($x=100, $y=100, $w=500, $h=500, $href='#sym01') {
echo "<use x=$x y=$y width=$w height=$h href='$href' />";
return array($x, $y, $w, $h, $href);
}

} 
//*** END OF CLASS ***

?>
