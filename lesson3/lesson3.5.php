<?php


function spaceReplace($text)
{
	return str_replace(' ', '_', $text);
}

echo spaceReplace('всем привет');

?>