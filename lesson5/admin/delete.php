<?php 
/**
 *
 *	Файл содержит процедуру удаления продукта
 * 
 */
require('./link.php');

global $link;

$id = (int) (int) $_GET['productId'];

$delete = "DELETE FROM products WHERE id = $id";

if (mysqli_query($link, $delete)) {
	mysqli_close($link);
	header("Location: admin.php");
} else {
	echo "$id";
	echo 'Ошибка удаления';
}


?>