<?php 

$DIR = 'images/';

$link = mysqli_connect('localhost:3306', 'root', 'MyNewPass', 'geekbrains');


/**
 * Функция копирует в папку новую картинку и добавляет информацию о ней в базу данных
 * @param  [string] $dir [адрес папки с картинками]
 * @return [void]      [ничего не возвращает]
 */
function uploadImg($dir)
{
	if (count($_FILES)) {
		$newImg = $_FILES['avatar'];
		// Проверка на ошибки и на правильный тип файла (.png или .jpg)
		if (($newImg['error'] == UPLOAD_ERR_OK) &&
			($newImg['type'] == 'image/png' || $newImg['type'] == 'image/jpeg'))
		{
			$name = basename($newImg['name']);
			move_uploaded_file($newImg['tmp_name'], "$dir/$name");
			imgToServer($name, $dir);
			
		} else {
			echo "<br>Неверный формат файла.";
		}
	}
}

/**
 * Функцию добавляет данные новую картинку в базу данных по названию.
 * @param  [string] $imgName [Название картинки]
 * @param  [string] $dir     [адрес папки]
 * @return [void]          [Ничего не возращает]
 */
function imgToServer($imgName, $dir)
{
	global $link;

	$insert = "INSERT INTO images (name, counter_clicks) VALUES ('$imgName', '0') ";

	if (!($result = mysqli_query($link, $insert))) {
		echo 'ERROR';
	}

	mysqli_close($link);
}

?>