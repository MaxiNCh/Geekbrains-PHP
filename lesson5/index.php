<?php

require('uploadImg.php');

/**
 * Функция подключается к базе данных картинок, по этим данным возвращаем блок с кртинками.
 * @param  [string] $dir [адрес папки, где хранятся картинки]
 * @return [string]      [возращает HTML блок с картинками]
 */
function renderImages($dir)
{
	global $link;

	$render = '';
	
	if ($result = mysqli_query($link, 'SELECT * FROM images ORDER BY counter_clicks DESC')) {
		while ($image = mysqli_fetch_assoc($result)) {
			$imageName = $image['name'];
			$imageUrl = $dir . $imageName;
			$imageId = $image['id'];
			$imageCounter = $image['counter_clicks'];
			$render .= 
				"<a class='image-link' href='counter.php?imageId=$imageId' >
					<img class='image' id='$imageId' src='$imageUrl' alt='image-$imageId'>
				</a>";
		}
	}


	mysqli_close($link);
	return $render;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title >Gallery</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h2 class="heading">Gallery</h2>
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
				echo renderImages($DIR);
			?>
		</div>
		
	</section>



	<script>
		
	</script>
</body>
</html>

