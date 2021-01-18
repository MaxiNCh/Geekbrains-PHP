<?php

$a = 14;

$b = 7;

function add($a, $b)
{
	return $a + $b;
}

function sub($a, $b)
{
	return $a - $b;
}

function div($a, $b)
{
	return $a / $b;
}

function mult($a, $b)
{
	return $a * $b;
}

echo add($a, $b);
echo "<br>";
echo sub($a, $b);
echo "<br>";
echo div($a, $b);
echo "<br>";
echo mult($a, $b);


?>