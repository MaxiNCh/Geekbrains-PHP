<?php

$title = "Моя первая страница на PHP";
$year = date('Y');
$h1 = "Заголовок моей страницы";

echo 
"<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>$title</title>
</head>
<body>
	<h1> $h1 </h1>
	<p> Год создания моей первой страницы - $year </p>
</body>
</html>";

?>