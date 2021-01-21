<?php
	$rus = [
		'Московская область' => [
			'Мытищи',
			'Химки',
			'Домодедово',
			'Балашиха',
			'Красногорск'
		],
		'Татарстан' => [
			'Казань',
			'Челны',
			'Нижнекамск',
			'Альметьевск'
		],
		'Свердловская область' => [
			'Екатеринбург',
			'Нижний Тагил',
			'Красноуфимск',
			'Серов'
		]
	];


	function isStartsFromK($str) {
		// length is 2 since cyrillic symbols take 2 bytes
		$firstLetter = substr($str, 0, 2);
		if ($firstLetter == 'К') {
			return true;
		} else {
			return false;
		};
	};

	foreach ($rus as $region => $cities) {
		$kCities = array_filter($cities, "isStartsFromK");

		$strCities = implode(', ', $kCities);
		echo "<b>$region:</b><br>";

		echo "$strCities<br>";	 	
	} 

?>