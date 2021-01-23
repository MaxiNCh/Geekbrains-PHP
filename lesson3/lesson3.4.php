<?php


function translit($text)
	{
		$letTable = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'];
		
		// Разбиваем текст на отдельные слова.
		$textArr = explode(' ', $text);

		$result = '';

		foreach ($textArr as &$word) {
			// Конвертируем каждое слово в массив. 
			// Длина элемента указан 2, т.к. буква кириллицы занимает 2 байта.
			$wordArr = str_split($word, 2);
			foreach ($wordArr as &$letter) {
				// Конвертируем русские буквы в латинские.
				$letter = isset($letTable[$letter]) ? $letTable[$letter] : $letter;
			}
			// Собираем слово обратно.
			$word = implode('', $wordArr);
			// Собираем первоначальную фразу.
			$result = $result . $word . ' ';
		}
		//Убираем последний пробел.
		return preg_filter('/\s$/', '', $result);
	};


	echo translit('Мир всему миру!');

?>