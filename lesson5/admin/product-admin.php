<?php 
/**
 *
 * Просто страница продукта. Необязательная. Можно потом удалить.
 * Вместо нее есть страница product-edit.php
 * 
 */
require('admin-link.php');
require('updateProduct.php');

$productId = $_GET['productId'];

/**
 * Функция подключается к базе данных, возвращает картинку, инкрементирует количество посещений
 * @param  [string] $id  [ID картинки]
 * @param  [string] $dir [Адрес папки с картинками]
 * @return [string]      [Возвращает блок HTML с картинкой]
 */
function renderImage($id, $dir)
{
	global $link;

	$select = "SELECT * FROM products WHERE id = '$id'";
	if ($result = mysqli_query($link, $select)) {
		while ($product = mysqli_fetch_assoc($result)) {
			$name =$product['name'];
			$url = $dir . $name;
			$counter = $product['counter_clicks'];
			$title = $product['title'];
			$price = $product['price'];
			$render = 
				"<div class='product-body'>
					<img class='product-img' src='$url' alt='product-$id'>
				</div>
				<p class='product-text'><b> $title </b></p>
				<p class='product-text'> Price: $price &#8381;</p>
				<p class='product-text'> Популярность: $counter </p>";
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
	<title>Product</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
	<header>
		<h2 class="heading">Product</h2>	
	</header>
	<nav class="nav"><a class="nav-link" href="catalog-admin.php">Gallery</a></nav>

	<section class="product">
			<?php 
				echo renderImage($productId, $DIR);
			?>
		
	</section>
	
</body>
</html>