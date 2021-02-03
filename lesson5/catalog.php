<?php

require('link.php');

/**
 * Функция подключается к базе данных картинок, по этим данным возвращаем блок с кртинками.
 * @param  [string] $dir [адрес папки, где хранятся картинки]
 * @return [string]      [возращает HTML блок с картинками]
 */
function renderImages($dir)
{
	global $link;

	$render = '';
	
	if ($result = mysqli_query($link, 'SELECT * FROM products ORDER BY counter_clicks DESC')) {
		while ($product = mysqli_fetch_assoc($result)) {
			$productName = $product['name'];
			$productUrl = $dir . $productName;
			$productId = $product['id'];
			$productCounter = $product['counter_clicks'];
			$title = $product['title'];
			$price = $product['price'];
			$render .= 
				"
				<div class='catalog__product'>
				<a class='catalog__link' href='counter.php?productId=$productId' >
					<div class='catalog__wrapper'>
						<img class='catalog__image' id='$productId' src='$productUrl' alt='product-$productId'>
					</div>
					<p class='catalog__title'><b>$title</b></p>
					<p class='catalog__price'>Price: $price &#8381;</p>
				</a>
				</div>";
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
	<h2 class="heading">Catalog</h2>
	<section class="section">
		
		<div class="products">
			<?php
				echo renderImages($DIR);
			?>
		</div>
		
	</section>



	<script>
		
	</script>
</body>
</html>

