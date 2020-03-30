<?php
include("FlashSvgMath.class.php");
class_alias('FlashSvgMath', 'fm');

echo "<h3>FlashSvgMath.class.php testing</h3>";
echo "<hr>apothem: ";
echo fm::apothem();
echo "<hr>centerRect: ";
print_r(fm::centerRect());
echo "<hr>chordLengthCircleDeg: ";
echo fm::chordLengthCircleDeg();
echo "<hr>chordLengthCircleRad: ";
echo fm::chordLengthCircleRad();
echo "<hr>chordRadAngleCircle: ";
echo fm::chordRadAngleCircle();
echo "<hr>chordDegAngleCircle: ";
echo fm::chordDegAngleCircle();
echo "<hr>circlesIntersection: ";
print_r(fm::circlesIntersection());
echo "<hr>deriv1qBezier: ";
print_r(fm::deriv1qBezier());
echo "<hr>deriv2qBezier: ";
print_r(fm::deriv2qBezier());
echo "<hr>discriminant: ";
print_r(fm::discriminant());
echo "<hr>lineLength: ";
print_r(fm::lineLength());
echo "<hr>lineLineIntersection: ";
print_r(fm::lineLineIntersection());
echo "<hr>lineLinePerpendicular: ";
print_r(fm::lineLinePerpendicular());
echo "<hr>lineMidPoint: ";
print_r(fm::lineMidPoint());
echo "<hr>lineMidPointDown: ";
print_r(fm::lineMidPointDown());
echo "<hr>lineMidPointUp: ";
print_r(fm::lineMidPointUp());
echo "<hr>mirrorPoint: ";
print_r(fm::mirrorPoint());
echo "<hr>parabolaVertex: ";
print_r(fm::parabolaVertex());
echo "<hr>point: ";
print_r(fm::point());
echo "<hr>quadraticBezier: ";
print_r(fm::quadraticBezier());
echo "<hr>rectRotDegArray: ";
print_r(fm::rectRotDegArray());
echo "<hr>returnCartesianDeg: ";
print_r(fm::returnCartesianDeg());
echo "<hr>returnCartesianRad: ";
print_r(fm::returnCartesianRad());
echo "<hr>returnPolarDeg: ";
print_r(fm::returnPolarDeg());
echo "<hr>returnPolarRad: ";
print_r(fm::returnPolarRad());
echo "<hr>tangentsCircleV: ";
print_r(fm::tangentsCircleV());
echo "<hr>tangentsCircle: ";
print_r(fm::tangentsCircle());
echo "<hr>translateLine: ";
print_r(fm::translateLine());
echo "<hr>translatePoint: ";
print_r(fm::translatePoint());
echo "<hr>";
fm::printMatrix();

?>
