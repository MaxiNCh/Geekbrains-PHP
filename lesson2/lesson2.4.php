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

function math($a, $b, $oper)
{
	switch ($oper) {
		case 'add':
			return add($a, $b);
		case 'sub':
			return sub($a, $b);
		case 'mult':
			return mult($a, $b);
		case 'div':
			return div($a, $b);
	}
}

echo math(9, 3, 'add') . "<br>";
echo math(9, 3, 'sub') . "<br>";
echo math(9, 3, 'div') . "<br>";
echo math(9, 3, 'mult') . "<br>";


?>