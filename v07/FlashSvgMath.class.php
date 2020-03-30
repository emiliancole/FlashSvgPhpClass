<?php
// FlashSvgMath.class.php
// ===================================================
// General Mathematical public static functions Class for Svg
// ===================================================
// 
class_alias('FlashSvgMath', 'fm');

class FlashSvgMath {

// apothem($r, $chord)
//r = circle radius
//$chord = circle chord
//apothem = circle center distance from center chord
public static function apothem($r=30, $chord=50) {
if ($chord <= 2*$r) {
$c = $chord/2;
return sqrt($r*$r - $c*$c);
		}
    else {exit();}
	}


// centerRect($x1, $y1, $w, $h)
//(x1,y1) = top-left rectangle coords
//w = rectangle width; h = rectangle height;
//(cx,cy) = rectangle center coords
public static function centerRect($x1=100, $y1=100, $w=100, $h=50) {
$cx = $x1 + $w/2;
$cy = $y1 + $h/2;
return array($cx,$cy);
	}


// chordLengthCircleDeg($cx, $cy, $r, $deg)
//https://study.com/academy/lesson/chord-of-a-circle-definition-formula.html
//(cx,cy) = center circle coords
//r = circle radius
//deg = angle subtended at the center by the chord in degrees
//rad = chord angle in radiants
//chord = chord lenght
public static function chordLengthCircleDeg($cx=100, $cy=100, $r=50, $deg=45) {
$rad=deg2rad($deg);
$chord=2*$r*sin($rad/2);
return $chord;
	}

// chordLengthCircleRad($cx, $cy, $r, $rad)
//https://study.com/academy/lesson/chord-of-a-circle-definition-formula.html
//(cx,cy) = center circle coords
//r = circle radius
//rad = chord angle in radiants
//chord = chord lenght
public static function chordLengthCircleRad($cx=100, $cy=100, $r=50, $rad=M_PI/4) {
$chord=2*$r*sin($rad/2);
return $chord;
	}

// chordRadAngleCircle($cx, $cy, $r, $chord)
//https://study.com/academy/lesson/chord-of-a-circle-definition-formula.html
public static function chordRadAngleCircle($cx=100, $cy=100, $r=50, $chord=50) {
$d=2*$r;
$rad = 2*(asin($chord/$d) );
return $rad;
	}

// chordDegAngleCircle($cx, $cy, $r, $chord)
//https://study.com/academy/lesson/chord-of-a-circle-definition-formula.html
public static function chordDegAngleCircle($cx=100, $cy=100, $r=50, $chord=50) {
$d=2*$r;
$alpharad = 2*( asin($chord/$d) );
$alphadeg=rad2deg($alpharad);
return $alphadeg;
	}


// circlesIntersection($cx1, $cy1, $r1, $cx2, $cy2, $r2)
//https://stackoverflow.com/questions/3349125/circle-circle-intersection-points
//(cxi,cyi) = center coordinates of circles 
//ri = radius of circles
//array(x3,y3,x4,y4) = 2 circle intersections coords
public static function circlesIntersection($cx1=100, $cy1=100, $r1=40, 
$cx2=150, $cy2=50, $r2=40) {
$d=sqrt( ($cx2-$cx1)**2 + ($cy2-$cy1)**2 );
$a=($r1**2 - $r2**2 + $d**2)/(2*$d);
$h=sqrt( $r1**2 - $a**2 );
$x2 = $cx1 + $a*($cx2-$cx1)/$d;
$y2 = $cy1 + $a*($cy2-$cy1)/$d;
$x3 = $x2 + $h*($cy2 - $cy1)/$d;
$y3 = $y2 - $h*($cx2 - $cx1)/$d;
$x4 = $x2 - $h*($cy2 - $cy1)/$d;
$y4 = $y2 + $h*($cx2 - $cx1)/$d;
return array($x3,$y3,$x4,$y4);
	}

// deriv1qBezier($x0,$y0,$x1,$y1,$x2,$y2,$t)
//(X0,y0) = first point
//(X1,y1) = control point
//(X2,y2) = second point
//t = parameter (0-1)
public static function deriv1qBezier($x0=100, $y0=100, $x1=150, $y1=80, 
$x2=200, $y2=100, $t=0.5) {
$x = 2*(1-$t)*($x1-$x0) + 2*$t*($x2-$x1);
$y = 2*(1-$t)*($y1-$y0) + 2*$t*($y2-$y1);
return array($x,$y);
	}

// deriv2qBezier($x0,$y0,$x1,$y1,$x2,$y2,$t)
//(X0,y0) = first point
//(X1,y1) = control point
//(X2,y2) = second point
//t = parameter (0-1)
public static function deriv2qBezier($x0=100, $y0=100, $x1=150, $y1=80, 
$x2=200, $y2=100, $t=0.5) {
$x = 2*($x2-2*$x1+$x0);
$y = 2*($y2-2*$y1+$y0);
return array($x,$y);
	}

// discriminant($a, $b, $c)
//a*x^2+b*x+c
public static function discriminant($a=1, $b=2, $c=3) {
$dis=$b*$b-4*$a*$c;
return $dis;
}

// lineLength($x1, $y1, $x2, $y2)
//(x1,y1,x2,y2) = line coords
//d = line length
public static function lineLength($x1=50, $y1=250, $x2=150, $y2=50) {
$dx=$x2-$x1; $dy=$y2-$y1;
$d=sqrt($dx*$dx+$dy*$dy);
return $d;
}

// lineLineIntersection($x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4)
//https://en.m.wikipedia.org/wiki/Line%E2%80%93line_intersection
//(x1,y1,x2,y2) = first line coords
//(x3,y3,x4,y4) = second line coords
//t = determinant number
//(x,y) = intersection coords
public static function lineLineIntersection($x1=100, $y1=120, $x2=180, $y2=100, 
$x3=100, $y3=100, $x4=200, $y4=100) {
$tnum=($x1-$x3)*($y3-$y4)-($y1-$y3)*($x3-$x4);
$tden=($x1-$x2)*($y3-$y4)-($y1-$y2)*($x3-$x4);
$t=$tnum/$tden;
$x=$x1+$t*($x2-$x1); $y=$y1+$t*($y2-$y1);
return array($x,$y);
}

// lineLinePerpendicular($x1, $y1, $x2, $y2, $x3, $y3)
//https://en.m.wikipedia.org/wiki/Line%E2%80%93line_perpendicular
//(x1,y1,x2,y2) = given line coords
//(x3,y3) = given start point coords of perpendicular line
//(x4,y4) = end perpendicular line coords
public static function lineLinePerpendicular($x1=50, $y1=250, $x2=150, $y2=50, 
$x3=120, $y3=150) {
$ma=($y2-$y1)/($x2-$x1); $mb=-1/$ma;
$ba=$y1-$ma*$x1; //a intercept
$bb=$y3-$mb*$x3; //b intercept
//ya=ma*xa+ba
//yb=mb*xb+bb
//$ma*$x4+$ba=$mb*$x4+$bb; 
//$x4*($ma-$mb)=$bb-$ba;
$x4=($bb-$ba)/($ma-$mb);
$y4=$ma*$x4+$ba;
return array($x3,$y3,$x4,$y4);
}

// lineMidPoint($x1, $y1, $x2, $y2) 
//(x1,y1) = left point of line
//(x2,y2) = right point of line
//x2>x1
public static function lineMidPoint($x1=100, $y1=100, $x2=200, $y2=200) {
$xm=$x1+abs($x2-$x1)/2; 
if ($y2>$y1) {$ym=$y1+abs($y2-$y1)/2;}
else {$ym=$y1-abs($y2-$y1)/2;}
return array($xm,$ym);
}

// lineMidPointDown($x1, $y1, $x2, $y2) 
//(x1,y1) = left point of line
//(x2,y2) = right point of line
//y2>y1 and x2>x1
public static function lineMidPointDown($x1=100, $y1=100, $x2=200, $y2=200) {
$xm=$x1+abs($x2-$x1)/2; $ym=$y1+abs($y2-$y1)/2;
return array($xm,$ym);
}

// lineMidPointUp($x1, $y1, $x2, $y2) 
//(x1,y1) = left point of line
//(x2,y2) = right point of line
//y2<y1 and x2>x1
public static function lineMidPointUp($x1=100, $y1=100, $x2=200, $y2=50) {
$xm=$x1+abs($x2-$x1)/2; $ym=$y1-abs($y2-$y1)/2;
return array($xm,$ym);
}

// mirrorPoint($x, $y, $x1, $y1, $x2, $y2) 
//(x,y) = existing point 
//(x1,y1,x2,y2) = reference line coords
//(px,py) = perpendicular intersection point
//(dx,dy) = existing point distance from line
//(xs,ys) = symmetrical point coords
public static function mirrorPoint($x=100,$y=100,$x1=100,$y1=200,$x2=200,$y2=100) {
$arrP=fm::lineLinePerpendicular($x1, $y1, $x2, $y2, $x, $y);
$px=$arrP[2]; $py=$arrP[3];
$dx=$px-$x; $dy=$py-$y;
$xs=$px+$dx; $ys=$py+$dy;
return array($xs,$ys);
}

// mirrorPointH($x, $y, $x1) 
//(x,y) = existing point 
//(x1) = reference x-axis coord
public static function mirrorPointH($x=100,$y=100,$x1=100) {
$dx=$x1-$x; 
$xs=$x1+$dx; $ys=$y;
return array($xs,$ys);
}

// mirrorPointV($x, $y, $y1) 
//(x,y) = existing point 
//(y1) = reference y-axis coord
public static function mirrorPointV($x=100,$y=100,$y1=100) {
//point($x,$y); line($x1,$y1,$x2,$y2);
$dy=$y1-$y; 
$ys=$y1+$dy; $xs=$x;
//point($xs,$ys);
return array($xs,$ys);
	}

// parabolaVertex($a, $b, $dis)
//$a*$x^2+$b*$x+c=0
public static function parabolaVertex($a=5, $b=2, $dis=-8) {
$x=-$b/(2*$a);
$y=-$dis/(4*$a);
return array($x,$y);
	}
    
// point($x, $y)
//($x,$y) = 2d point coords
public static function point($x=100, $y=100) {
return array($x,$y);
	}
    
// printMatrix($array, $n)
//$mat = multidimensional array
//$n = number of rows elements
public static function printMatrix(
$mat=array(array(1,2,3),array(4,5,6)), $n=3) {
for ($i = 0; $i < $n; $i++) 
{ 
    for ($j = 0; $j < $n; $j++)  
        echo($mat[$i][$j] . " "); 
    echo "</br>"; 
} 
return array($arr);
	}

// quadraticBezier($x0,$y0,$x1,$y1,$x2,$y2,$t)
//(x0,y0) = starting point
//(x1,y1) = control point
//(x2,y2) = end point
//(0 >= t >= 1) = quadratic parameter 
public static function quadraticBezier($x0=100, $y0=100, $x1=150, $y1=80, 
$x2=200, $y2=100, $t=0.5) {
$x = (1-$t)**2*$x0 + 2*(1-$t)*$t*$x1 + $t*$t*$x2;
$y = (1-$t)**2*$y0 + 2*(1-$t)*$t*$y1 + $t*$t*$y2;
return array($x,$y);
}

// rectRotDegArray($x1, $y1, $w, $h, $deg, $style)
//rect rotation around the point (x1,y1)
//(x1,y1) = initial top left corner
//w = rect width
//h = rect height
//return array(xi,yi) = rect rotated points coords
public static function rectRotDegArray($x1=100, $y1=100, $w=100, $h=50, $deg=45) {
$rad=deg2rad($deg);
$x2=$x1+$w*cos($rad); $y2=$y1-$w*sin($rad);
//point($x1,$y1); point($x2,$y2);
$x3=$x2+$h*sin($rad); $y3=$y2+$h*cos($rad);
$x4=$x1+$h*sin($rad); $y4=$y1+$h*cos($rad);
//point($x3,$y3); point($x4,$y4);
//echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4' style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// returnCartesianRad($r, $rad)
//r = radius
//rad = angle in radians
//(x,y) = cartesian coordinates
public static function returnCartesianRad($r=25, $rad=0.5) { 
    $x = $r*cos($rad);
    $y = $r*sin($rad);  
    return array($x,$y);
}

// returnCartesianDeg($r, $deg)
//r = radius
//deg = angle in degrees
//(x,y) = cartesian coordinates
public static function returnCartesianDeg($r=25, $deg=45) { 
	$rad=deg2rad($deg);
    $x = $r*cos($rad);
    $y = $r*sin($rad);  
    return array($x,$y);
}

// returnPolarDeg($x, $y)
//(x,y) = cartesian  oordinates
//r = sqrt(x^2 + y^2)
//(r,deg) = polar coordinates
public static function returnPolarDeg($x=100, $y=100) { 
    $r = sqrt($x*$x + $y*$y);
    $deg = rad2deg(atan($y/$x));  
    return array($r,$deg);
}

// returnPolarRad($x, $y)
//(x,y) = cartesian  oordinates
//r = sqrt(x^2 + y^2)
//(r,rad) = polar coordinates
public static function returnPolarRad($x=100, $y=100) { 
    $r = sqrt($x*$x + $y*$y);
    $rad = atan($y/$x);  
    return array($r,$rad);
}

// tangentsCircleV($cx, $cy, $h, $r)
//https://en.wikipedia.org/wiki/Tangent_lines_to_circles
//return the 2 points of tangent lines to circle, given the circle(cx,cy,r),
//and the vertical height h: 
public static function tangentsCircleV($cx=200, $cy=200, $h=100, $r=30) {
$xh=$cx; $yh=$cy-$h; //external point coords (xh,yh)
//point($cx,$cy,2,'red'); point($xh,$yh,2,'red');
//line($cx,$cy,$xh,$yh); circle($cx,$cy,$r);
//center of second circle
$rm = $h/2; 
$cmx = $cx;
$cmy = $cy-$h/2; //point($cmx,$cmy,2,'green');
//circle($cmx,$cmy,$rm);
$points = fm::circlesIntersection($cx,$cy,$r,$cmx,$cmy,$rm);
//$points = array($x1,$y1,$x2,$y2);
$x1=$points[0];
$y1=$points[1];
$x2=$points[2];
$y2=$points[3];
//circle($x1,$y1,3); circle($x2,$y2,3);
//line($xh,$yh,$x1,$y1); line($xh,$yh,$x2,$y2);
return array($x1,$y1,$x2,$y2);
}

// tangentsCircle($cx, $cy, $r, $px, $py)
//https://en.wikipedia.org/wiki/Tangent_lines_to_circles
//C=(cx,cy) = circle center coords
//r = circle radius
//P=(px,py) = external to circle point coords
//CM=(cmx,cmy) = middle point C-P
//d = distance C-P
public static function tangentsCircle($cx=100, $cy=200, $r=30, $px=200, $py=100) {
//line($cx,$cy,$px,$py); circle($cx,$cy,$r);
$d=sqrt( ($px-$cx)**2 + ($cy-$py)**2 );
$arrM=fm::lineMidPoint($cx,$cy,$px,$py);
$cmx=$arrM[0]; $cmy=$arrM[1];
//circle($cmx,$cmy,3,'fill:red;');
//circle($cmx,$cmy,$d/2);
$points = fm::circlesIntersection($cx, $cy, $r, $cmx, $cmy, $d/2);
$x1=$points[0]; $y1=$points[1];
$x2=$points[2]; $y2=$points[3];
//circle($x1,$y1,3); circle($x2,$y2,3);
//line($x1,$y1,$px,$py); line($x2,$y2,$px,$py);
return array($x1,$y1,$x2,$y2);
	}
    
// translateLine($x1, $y1, $x2, $y2, $dx1, $dy1, $dx2, $dy2)
//(xi,yi) = original line coords
//(dxi,dyi) = x and y axis translations
public static function translateLine($x1=100, $y1=100, $x2=200, $y2=200, 
	$dx1=10, $dy1=10, $dx2=10, $dy2=5) {
$line=array($x1+$dx1,$y1+$dy1,$x2+$dx2,$y2+$dy2);
return $line;
	}
    
// translatePoint($x, $y, $dx, $dy)
//(x,y) = original point coords
//(dx,dy) = x and y axis translations
public static function translatePoint($x=100, $y=100, $dx=10, $dy=10) {
$point=array($x+$dx,$y+$dy);
return $point;
	}

}
//*** END OF CLASS ***
/**
$mp=fm::mirrorPoint(50,100,50,10,200,200);
print_r($mp);
echo "<hr>";
$ml=fm::mirrorLine(50,100,50,110,50,10,200,200);
print_r($ml);
*/

?>
