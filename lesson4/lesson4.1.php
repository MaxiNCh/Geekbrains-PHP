<?php

$DIR = 'images/';

function rednderImages($dir)
{
	$imagesArr = scandir($dir);
	$render = '';

	foreach ($imagesArr as $imageName) {

		$imageUrl = $dir . $imageName;
		if ($imageName != '.' && $imageName != '..') {
			$render .= "<button class='open-btn'><img class='image' src=$imageUrl alt=$imageName></button>";
		}
	}
	
	echo $render;
}

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
		} else {
			echo "<br>Неверный формат файла.";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title >Lesson 4</title>
	<link rel="stylesheet" href="styles.css">
	
</head>
<body>
	<h2 class="heading">Lesson 4</h2>
	<section class="section">
		
		<div class="upload">
			<form enctype="multipart/form-data" method="post">
				<!-- Ограничивает максимальный размер файл 1Мб -->
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
				<input type="file" id="avatar" name="avatar" accept=".jpg,.png">
				<input value="Загрузить" type="submit">
			</form>
			<?php
				uploadImg($DIR);
			?>
		</div>

		<div class="images">
			<?php
				rednderImages($DIR);
			?>
		</div>
		
	</section>

	<div class="modal" id="modal">
		<div class="modal-content">
			<span class="close-btn">&times;</span>
			<img class="modal-image" id="modal-image" src="" alt="modal-image">
		</div>
	</div>

	<script>
		const modal = document.getElementById('modal')
		const openBtn = document.getElementsByClassName('open-btn')
		const closeBtn = document.getElementsByClassName('close-btn')[0]
		
		function openModal(e) {
			const imageUrl = e.target.getAttribute('src') ?? e.target.firstChild.getAttribute('src');
			console.log(e.target)
			modal.style.display = 'flex';
			modalImage = document.getElementById('modal-image');
			modalImage.setAttribute('src', imageUrl)
		}
		for (let i = 0; i < openBtn.length; i++) {
			openBtn[i].onclick = openModal;
		}
		window.onclick = function (e) {
			if (e.target == modal) {
				modal.style.display = 'none';
			}
		}
		closeBtn.onclick = function () {
			modal.style.display = 'none';
		}

	</script>
</body>
</html>

