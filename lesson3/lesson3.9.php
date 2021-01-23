<?php

	function translit($text)
	{
		$letTable = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'];
		
		$textArr = explode(' ', $text);

		$result = '';

		foreach ($textArr as &$word) {
			// длина элемента указан 2, т.к. буква кириллицы занимает 2 байта.
			$wordArr = str_split($word, 2);
			foreach ($wordArr as &$letter) {
				$letter = isset($letTable[$letter]) ? $letTable[$letter] : $letter;
			}
			$word = implode('', $wordArr);
			$result = $result . $word . ' ';
		}
		//Убираем последний пробел.
		return preg_filter('/\s$/', '', $result);
	};

	function spaceReplace($text)
	{
		return str_replace(' ', '_', $text);
	}


	echo spaceReplace(translit('Мир всему миру!'));

?>