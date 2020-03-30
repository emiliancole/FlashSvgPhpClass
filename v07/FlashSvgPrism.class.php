<?php
// FlashSvgPrism.class.php
// =======================================================
// 3d Military View public static functions Class for Svg
// =======================================================
// 
include('FlashSvgMilitary.class.php');
class_alias('FlashSvgPrism', 'fp');

class FlashSvgPrism {

//cube($cx, $cy, $r, $startDeg, $style)
public static function cube($cx=100, $cy=100, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') {
prismSquareDeg($cx, $cy, $r, $r, $startDeg,$style);
}

// hexagonDegZ($cx, $cy, $cz, $r, $start, $style)
public static function hexagonDegZ($cx=100, $cy=100, $cz=0, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/6; $start=deg2rad($startDeg);
$arr1=returnCartesian($r,$start);
$arr2=returnCartesian($r,$start+$alpha);
$arr3=returnCartesian($r,$start+2*$alpha);
$arr4=returnCartesian($r,$start+3*$alpha);
$arr5=returnCartesian($r,$start+4*$alpha);
$arr6=returnCartesian($r,$start+5*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1]-$cz;
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1]-$cz;
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1]-$cz;
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1]-$cz;
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1]-$cz;
$x6=$cx+$arr6[0]; $y6=$cy+$arr6[1]-$cz;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5,$x6,$y6);
}

// hexagonRadZ($cx, $cy, $cz, $r, $start, $style)
public static function hexagonRadZ($cx=100, $cy=100, $cz=0, $r=50, $start=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/6;
//circle($cx,$cy,$r);
$arr1=returnCartesian($r,$start);
$arr2=returnCartesian($r,$start+$alpha);
$arr3=returnCartesian($r,$start+2*$alpha);
$arr4=returnCartesian($r,$start+3*$alpha);
$arr5=returnCartesian($r,$start+4*$alpha);
$arr6=returnCartesian($r,$start+5*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1]-$cz;
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1]-$cz;
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1]-$cz;
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1]-$cz;
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1]-$cz;
$x6=$cx+$arr6[0]; $y6=$cy+$arr6[1]-$cz;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5 $x6,$y6'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5,$x6,$y6);
}

// pentagonDegZ($cx, $cy, $cz, $r, $start, $style)
public static function pentagonDegZ($cx=100, $cy=100, $cz=0, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/5; $start=deg2rad($startDeg);
$arr1=returnCartesian($r,$start);
$arr2=returnCartesian($r,$start+$alpha);
$arr3=returnCartesian($r,$start+2*$alpha);
$arr4=returnCartesian($r,$start+3*$alpha);
$arr5=returnCartesian($r,$start+4*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1]-$cz;
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1]-$cz;
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1]-$cz;
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1]-$cz;
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1]-$cz;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5);
}

// pentagonRadZ($cx, $cy, $cz, $r, $start, $style)
public static function pentagonRadZ($cx=100, $cy=100, $cz=0, $r=50, $start=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/5;
$arr1=returnCartesian($r,$start);
$arr2=returnCartesian($r,$start+$alpha);
$arr3=returnCartesian($r,$start+2*$alpha);
$arr4=returnCartesian($r,$start+3*$alpha);
$arr5=returnCartesian($r,$start+4*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1]-$cz;
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1]-$cz;
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1]-$cz;
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1]-$cz;
$x5=$cx+$arr5[0]; $y5=$cy+$arr5[1]-$cz;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4 $x5,$y5'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4,$x5,$y5);
}


// prismHexagonDeg($cx, $cy, $cz, $r, $startDeg, $style)
public static function prismHexagonDeg($cx=100, $cy=100, $cz=20, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
if ($startDeg>30 or $startDeg<-30) { exit(); }
else {
$arrB=hexagonDeg($cx,$cy,$r,$startDeg,$style);
$x1=$arrB[0];$y1=$arrB[1]; 
$x2=$arrB[2];$y2=$arrB[3];
$x3=$arrB[4];$y3=$arrB[5];
$x4=$arrB[6];$y4=$arrB[7];
$x5=$arrB[8];$y5=$arrB[9];
$x6=$arrB[10];$y6=$arrB[11];
wall($x4,$y4,$x5,$y5,$cz,$style);
wall($x5,$y5,$x6,$y6,$cz,$style);
wall($x6,$y6,$x1,$y1,$cz,$style);
wall($x1,$y1,$x2,$y2,$cz,$style);
wall($x2,$y2,$x3,$y3,$cz,$style);
wall($x3,$y3,$x4,$y4,$cz,$style);
$arrT=hexagonDegZ($cx,$cy,$cz,$r,$startDeg,$style);
$x1z=$arrT[0];$y1z=$arrT[1];
$x2z=$arrT[2];$y2z=$arrT[3];
$x3z=$arrT[4];$y3z=$arrT[5];
$x4z=$arrT[6];$y4z=$arrT[7];
$x5z=$arrT[8];$y5z=$arrT[9];
$x6z=$arrT[10];$y6z=$arrT[11];
return array($arrB,$arrT);
	}
}


// prismHexagonRad($cx, $cy, $cz, $r, $start, $style)
public static function prismHexagonRad($cx=100, $cy=100, $cz=20, $r=50, $start=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
if ($start>1.2566370614359 or $start<-1.2566370614359) { exit(); }
else {
$arrB=hexagonRad($cx,$cy,$r,$start,$style);
$x1=$arrB[0];$y1=$arrB[1]; 
$x2=$arrB[2];$y2=$arrB[3];
$x3=$arrB[4];$y3=$arrB[5];
$x4=$arrB[6];$y4=$arrB[7];
$x5=$arrB[8];$y5=$arrB[9];
$x6=$arrB[10];$y6=$arrB[11];
wall($x4,$y4,$x5,$y5,$cz,$style);
wall($x5,$y5,$x6,$y6,$cz,$style);
wall($x6,$y6,$x1,$y1,$cz,$style);
wall($x1,$y1,$x2,$y2,$cz,$style);
wall($x2,$y2,$x3,$y3,$cz,$style);
wall($x3,$y3,$x4,$y4,$cz,$style);
$arrT=hexagonRadZ($cx,$cy,$cz,$r,$start,$style);
$x1z=$arrT[0];$y1z=$arrT[1];
$x2z=$arrT[2];$y2z=$arrT[3];
$x3z=$arrT[4];$y3z=$arrT[5];
$x4z=$arrT[6];$y4z=$arrT[7];
$x5z=$arrT[8];$y5z=$arrT[9];
$x6z=$arrT[10];$y6z=$arrT[11];
return array($arrB,$arrT);
	}
}

// prismPentagonDeg($cx, $cy, $cz, $r, $startDeg, $style)
public static function prismPentagonDeg($cx=100, $cy=100, $cz=20, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
if ($startDeg>=0 and $startDeg<=72) { 
$arrB=pentagonDeg($cx,$cy,$r,$startDeg,$style);
$x1=$arrB[0];$y1=$arrB[1]; 
$x2=$arrB[2];$y2=$arrB[3];
$x3=$arrB[4];$y3=$arrB[5];
$x4=$arrB[6];$y4=$arrB[7];
$x5=$arrB[8];$y5=$arrB[9];
wall($x3,$y3,$x4,$y4,$cz,$style);
wall($x4,$y4,$x5,$y5,$cz,$style);
wall($x5,$y5,$x1,$y1,$cz,$style);
wall($x1,$y1,$x2,$y2,$cz,$style);
wall($x2,$y2,$x3,$y3,$cz,$style);
$arrT=pentagonDegZ($cx,$cy,$cz,$r,$startDeg,$style);
$x1z=$arrT[0];$y1z=$arrT[1];
$x2z=$arrT[2];$y2z=$arrT[3];
$x3z=$arrT[4];$y3z=$arrT[5];
$x4z=$arrT[6];$y4z=$arrT[7];
$x5z=$arrT[8];$y5z=$arrT[9];
return array($arrB,$arrT);
	}
    else {exit();}
}

// prismRectDeg($cx, $cy, $cz, $r, $deg1, $deg2, $style)
public static function prismRectDeg($cx=100, $cy=100, $cz=20, $r=50, $deg1=20, $deg2=40,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
//circle($cx, $cy,$r);
$arr1=returnCartesianDeg($r,$deg1); //point($cx+$arr1[0],$cy+$arr1[1]);
$arr2=returnCartesianDeg($r,$deg2); //point($cx+$arr2[0],$cy+$arr2[1]);
//line($cx+$arr1[0],$cy+$arr1[1],$cx+$arr2[0],$cy+$arr2[1]);
$arr3=returnCartesianDeg($r,$deg1+180); //point($cx+$arr3[0],$cy+$arr3[1]);
$arr4=returnCartesianDeg($r,$deg2+180); //point($cx+$arr4[0],$cy+$arr4[1]);
//line($cx+$arr2[0],$cy+$arr2[1],$cx+$arr3[0],$cy+$arr3[1]);
//line($cx+$arr3[0],$cy+$arr3[1],$cx+$arr4[0],$cy+$arr4[1]);
//line($cx+$arr4[0],$cy+$arr4[1],$cx+$arr1[0],$cy+$arr1[1]);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1];
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1];
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1];
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1];
$x1a=$x1; $y1a=$y1-$cz; //point($x1a,$y1a);
$x2a=$x2; $y2a=$y2-$cz; //point($x2a,$y2a);
$x3a=$x3; $y3a=$y3-$cz; //point($x3a,$y3a);
$x4a=$x4; $y4a=$y4-$cz; //point($x4a,$y4a);
if ($deg2>$deg1 and $deg1>0 and $deg1+$deg2<=180) {
wall($x1,$y1,$x4,$y4,$cz,$style);
wall($x4,$y4,$x3,$y3,$cz,$style);
wall($x3,$y3,$x2,$y2,$cz,$style);
wall($x1,$y1,$x2,$y2,$cz,$style);
} 
else if ($deg2<$deg1 and $deg1<0 and $deg1+$deg2>=-180) {
wall($x3,$y3,$x2,$y2,$cz,$style);
wall($x1,$y1,$x2,$y2,$cz,$style);
wall($x1,$y1,$x4,$y4,$cz,$style);
wall($x4,$y4,$x3,$y3,$cz,$style);
} else exit();
polygon4P($x1a,$y1a,$x2a,$y2a,$x3a,$y3a,$x4a,$y4a,$style);
}


// prismSquareDeg($cx, $cy, $cz, $r, $startDeg, $style)
public static function prismSquareDeg($cx=100, $cy=100, $cz=20, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
if ($startDeg>=-45 and $startDeg<=45) { 
$arrB=squareDeg($cx,$cy,$r,$startDeg,$style);
$x1=$arrB[0];$y1=$arrB[1]; 
$x2=$arrB[2];$y2=$arrB[3];
$x3=$arrB[4];$y3=$arrB[5];
$x4=$arrB[6];$y4=$arrB[7];
wall($x3,$y3,$x4,$y4,$cz,$style);
wall($x4,$y4,$x1,$y1,$cz,$style);
wall($x1,$y1,$x2,$y2,$cz,$style);
wall($x2,$y2,$x3,$y3,$cz,$style);
$arrT=squareDegZ($cx,$cy,$cz,$r,$startDeg,$style);
$x1z=$arrT[0];$y1z=$arrT[1];
$x2z=$arrT[2];$y2z=$arrT[3];
$x3z=$arrT[4];$y3z=$arrT[5];
$x4z=$arrT[6];$y4z=$arrT[7];
return array($arrB,$arrT);
	}
    else {exit();}
}

// prismTriangleDeg($cx, $cy, $cz, $r, $startDeg, $style)
//(cx,cy,cz) = top center coords of circumscribed circle
//r = radius of circumscribed circle; 
//startDeg >= 0 and startDeg <= 120;
//arrB = base triangle
public static function prismTriangleDeg($cx=100, $cy=100, $cz=20, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
$arrB=triangleDeg($cx,$cy,$r,$startDeg,$style);
$x1=$arrB[0];$y1=$arrB[1]; 
$x2=$arrB[2];$y2=$arrB[3];
$x3=$arrB[4];$y3=$arrB[5];
if ($startDeg>=0 and $startDeg<=120) { 
wall($x2,$y2,$x3,$y3,$cz,$style);
wall($x3,$y3,$x1,$y1,$cz,$style);
wall($x1,$y1,$x2,$y2,$cz,$style);
$arrT=triangleDegZ($cx,$cy,$cz,$r,$startDeg,$style);
$x1z=$arrT[0];$y1z=$arrT[1];
$x2z=$arrT[2];$y2z=$arrT[3];
$x3z=$arrT[4];$y3z=$arrT[5];
$x4z=$arrT[6];$y4z=$arrT[7];
return array($arrB,$arrT);	
	}
	else {exit();}
}

// pyramidHexagonDeg($cx, $cy, $a, $r, $startDeg, $style)
//(cx,cy) = center coords of circumscribed circle
//a = pyramid height; r = radius of circumscribed circle
//startDeg >= 0 and startDeg <= 60;
public static function pyramidHexagonDeg($cx=100, $cy=100, $a=40, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
$arrB=hexagonDeg($cx,$cy,$r,$startDeg,$style);
$x1=$arrB[0];$y1=$arrB[1]; 
$x2=$arrB[2];$y2=$arrB[3];
$x3=$arrB[4];$y3=$arrB[5];
$x4=$arrB[6];$y4=$arrB[7];
$x5=$arrB[8];$y5=$arrB[9];
$x6=$arrB[10];$y6=$arrB[11];
if ($startDeg>=0 and $startDeg<=60) { 
polygon3P($x4,$y4,$x5,$y5,$cx,$cy-$a,$style);
polygon3p($x5,$y5,$x6,$y6,$cx,$cy-$a,$style);
polygon3p($x6,$y6,$x1,$y1,$cx,$cy-$a,$style);
polygon3P($x1,$y1,$x2,$y2,$cx,$cy-$a,$style);
polygon3P($x2,$y2,$x3,$y3,$cx,$cy-$a,$style);
polygon3p($x3,$y3,$x4,$y4,$cx,$cy-$a,$style);
}
else {exit();}
$arrT=array($cx,$cy,$cz);
return array($arrB,$arrT);	
}

// pyramidPentagonDeg($cx, $cy, $a, $r, $startDeg, $style)
//(cx,cy) = center coords of circumscribed circle
//a = pyramid height; r = radius of circumscribed circle
//startDeg >= 0 and startDeg <= 36;
public static function pyramidPentagonDeg($cx=100, $cy=100, $a=40, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
if ($startDeg>=-36 and $startDeg<=36) { 
$arrB=pentagonDeg($cx,$cy,$r,$startDeg,$style);
$x1=$arrB[0];$y1=$arrB[1]; 
$x2=$arrB[2];$y2=$arrB[3];
$x3=$arrB[4];$y3=$arrB[5];
$x4=$arrB[6];$y4=$arrB[7];
$x5=$arrB[8];$y5=$arrB[9];
polygon3P($x4,$y4,$x5,$y5,$cx,$cy-$a,$style);
polygon3p($x5,$y5,$x1,$y1,$cx,$cy-$a,$style);
polygon3p($x1,$y1,$x2,$y2,$cx,$cy-$a,$style);
polygon3p($x3,$y3,$x4,$y4,$cx,$cy-$a,$style);
polygon3P($x2,$y2,$x3,$y3,$cx,$cy-$a,$style);
$arrT=array($cx,$cy,$cz);
return array($arrB,$arrT);
	}
	else {exit();}	
}

// pyramidSquareDeg($cx, $cy, $a, $r, $startDeg, $style)
//(cx,cy) = center coords of circumscribed circle
//a = pyramid height; r = radius of circumscribed circle
//startDeg >= 0 and startDeg <= 90;
public static function pyramidSquareDeg($cx=100, $cy=100, $a=40, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
if ($startDeg>=0 and $startDeg<=90) { 
$arrB=squareDeg($cx,$cy,$r,$startDeg,$style);
$x1=$arrB[0];$y1=$arrB[1]; 
$x2=$arrB[2];$y2=$arrB[3];
$x3=$arrB[4];$y3=$arrB[5];
$x4=$arrB[6];$y4=$arrB[7];
polygon3p($x3,$y3,$x4,$y4,$cx,$cy-$a,$style);
polygon3P($x2,$y2,$x3,$y3,$cx,$cy-$a,$style);
polygon3P($x1,$y1,$x4,$y4,$cx,$cy-$a,$style);
polygon3p($x1,$y1,$x2,$y2,$cx,$cy-$a,$style);
}
else {exit();}
$arrT=array($cx,$cy,$cz);
return array($arrB,$arrT);	
}


// pyramidTriangleDeg($cx, $cy, $a, $r, $startDeg, $style)
//(cx,cy) = center coords of circumscribed circle
//a = pyramid height; r = radius of circumscribed circle
//startDeg >= 0 and startDeg <= 120;
public static function pyramidTriangleDeg($cx=100, $cy=100, $a=40, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:lightgrey;') { 
$arrB=triangleDeg($cx,$cy,$r,$startDeg,$style);
$x1=$arrB[0];$y1=$arrB[1]; 
$x2=$arrB[2];$y2=$arrB[3];
$x3=$arrB[4];$y3=$arrB[5];
if ($startDeg>=0 and $startDeg<90) { 
polygon3P($x3,$y3,$x1,$y1,$cx,$cy-$a,$style);
polygon3P($x2,$y2,$x3,$y3,$cx,$cy-$a,$style);
polygon3p($x1,$y1,$x2,$y2,$cx,$cy-$a,$style);
}
else if ($startDeg>=90 and $startDeg<=120) {
polygon3P($x2,$y2,$x3,$y3,$cx,$cy-$a,$style);
polygon3P($x3,$y3,$x1,$y1,$cx,$cy-$a,$style);
polygon3P($x1,$y1,$x2,$y2,$cx,$cy-$a,$style);
}
else {exit();}
$arrT=array($cx,$cy,$cz);
return array($arrB,$arrT);	
}


// squareDegZ($cx, $cy, $cz, $r, $start, $style)
public static function squareDegZ($cx=100, $cy=100, $cz=0, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/4; $start=deg2rad($startDeg);
$arr1=returnCartesian($r,$start);
$arr2=returnCartesian($r,$start+$alpha);
$arr3=returnCartesian($r,$start+2*$alpha);
$arr4=returnCartesian($r,$start+3*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1]-$cz;
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1]-$cz;
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1]-$cz;
$x4=$cx+$arr4[0]; $y4=$cy+$arr4[1]-$cz;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3 $x4,$y4'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3,$x4,$y4);
}

// triangleDegZ($cx, $cy, $cz, $r, $start, $style)
public static function triangleDegZ($cx=100, $cy=100, $cz=0, $r=50, $startDeg=0,
$style='stroke:black;stroke-width:1;fill:none;') { 
$alpha=2*M_PI/3; $start=deg2rad($startDeg);
$arr1=returnCartesian($r,$start);
$arr2=returnCartesian($r,$start+$alpha);
$arr3=returnCartesian($r,$start+2*$alpha);
$x1=$cx+$arr1[0]; $y1=$cy+$arr1[1]-$cz;
$x2=$cx+$arr2[0]; $y2=$cy+$arr2[1]-$cz;
$x3=$cx+$arr3[0]; $y3=$cy+$arr3[1]-$cz;
echo "<polygon points='$x1,$y1 $x2,$y2 $x3,$y3'  
style='$style' />";
return array($x1,$y1,$x2,$y2,$x3,$y3);
}

} 
#### END OF CLASS ####

?>