<?php 
	
	/**
	 * Данная страница выполняет икремент счетчика при клике на картинку.
	 * Этот функционал выделен в отдельную страницу, чтобы при нажатии 'F5' на странице 
	 * с картинкой счетик автоматически не прибавлялся.
	 */

	require('uploadImg.php');

	$imageId = $_GET['imageId'];

	global $link;

	$update = "UPDATE images SET counter_clicks = counter_clicks + 1 WHERE id = '$imageId'";

	if (!($result = mysqli_query($link, $update))) {
		echo 'UPDATE ERROR';
	}

	mysqli_close($link);

	header("Location: image.php?imageId=$imageId");

?>