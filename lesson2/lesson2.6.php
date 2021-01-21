<?php

function power($val, $pow)
{
	if ($pow < 0) {
		$pow++;
		return 1 / $val * power($val, $pow);
	} elseif ($pow > 0) {
		$pow--;
		return $val * power($val, $pow);
	} // elseif ($pow == 0)
	return 1;
}

echo power(2, 4);

?>