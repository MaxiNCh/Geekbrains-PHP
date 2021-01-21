<?php

	$fc = [
		'Italy' => [
			'Juventus',
			'Milan',
			'Inter',
		],
		'Spain' => [
			'Barcelona',
			'Real Madrid',
			'Atletico',
		],
		'England' => [
			'Liverpool',
			'Manchester United',
			'Manchester City',
			'Chelsea',
		],
		'Germany' => [
			'Bayern',
			'Borussia',
			'Gerta'
		]
	];

	echo "<h2> Football clubs </h2>";
	echo "<ul>";
		
	foreach ($fc as $country => $clubs) {
		echo "<li> $country";
		echo "<ul>";
		foreach ($clubs as $club) {
			echo "<li> $club </li>";
		}
		echo "</ul>";
		echo "</li>";
	}
	echo "</ul>";

?>