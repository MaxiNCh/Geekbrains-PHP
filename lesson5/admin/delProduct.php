<?php 
/**
 *
 *	Файл содержит процедуру удаления продукта
 * 
 */
require('admin-link.php');
require('updateProduct.php');

global $link;

$id = $_GET['productId'];

$delete = "DELETE FROM products WHERE id = $id";

if (mysqli_query($link, $delete)) {
	mysqli_close($link);
	header("Location: catalog-admin.php");
} else {
	echo "$id";
	echo 'Ошибка удаления';
}


?>