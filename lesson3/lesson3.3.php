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

	foreach ($rus as $region => $cities) {
		$strCities = implode(', ', $cities);
		echo 
			"<b>$region:</b><br>
			$strCities<br>";	 	
	} 

?>