<?php
$a = -5;
$b = -3;

if ($a >= 0 && $b >= 0) {
	echo $a - $b;
} elseif ($a < 0 && $b < 0) {
	echo $a * $b;
} elseif (($a > 0 && $b < 0) || ($a < 0 && $b > 0)) {
	echo $a + $b;
}
?>