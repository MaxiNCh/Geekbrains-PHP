<?php

Date_default_timezone_set('Europe/Moscow');

function currentTime()
{
	$hour = date("H");
	$minutes = date("i");

	if ($hour == 1 || $hour == 21) {
		$hourText = 'час';
	} elseif ($hour >= 5 && $hour <= 20 || $hour == 0 ) {
		$hourText = 'часов';
	} else {
		$hourText = 'часа';
	}

	if ($minutes % 10 == 1 && $minutes != 11) {
		$minutesText = 'минута';
	} elseif (($minutes % 10 == 2 || $minutes % 10 == 3 || $minutes % 10 == 4) &&
				($minutes != 12 || $minutes != 13 || $minutes != 14)) {
		$minutesText = 'минуты';
	} else {
		$minutesText = 'минут';
	}

	return "$hour $hourText $minutes $minutesText";
}

$time = currentTime();


echo
"<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Lesson 2.7</title>
</head>
<body>
	<h2> Lesson 2.7 </h2>
	<p> Текущее время: $time </p>
</body>
</html>";

?>