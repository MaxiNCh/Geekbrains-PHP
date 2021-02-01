<?php 

require('uploadImg.php');

$imageId = $_GET['imageId'];

/**
 * Функция подключается к базе данных, возвращает картинку, инкрементирует количество посещений
 * @param  [string] $id  [ID картинки]
 * @param  [string] $dir [Адрес папки с картинками]
 * @return [string]      [Возвращает блок HTML с картинкой]
 */
function renderImage($id, $dir)
{
	global $link;

	$select = "SELECT * FROM images WHERE id = '$id'";
	if ($result = mysqli_query($link, $select)) {
		while ($image = mysqli_fetch_assoc($result)) {
			$name =$image['name'];
			$url = $dir . $name;
			$counter = $image['counter_clicks'];
			$render = 
				"<div class='product-body'>
					<img class='product-img' src='$url' alt='image-$id'>
				</div>
				<p class='product-counter'> Кликов: $counter </p>";
		}
	}
	mysqli_close($link);

	return $render;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Image</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<header>
		<h2 class="heading">Image</h2>	
	</header>
	<nav class="nav"><a class="nav-link" href="index.php">Gallery</a></nav>

	<section class="product">
			<?php 
				echo renderImage($imageId, $DIR);
			?>
		
	</section>
	
</body>
</html>