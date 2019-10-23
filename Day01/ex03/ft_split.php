#!/usr/bin/php
<?php
function ft_split($str)
{
	$str = trim($str);
	$str = explode(" ", $str);
	$str = array_filter($str, 'strlen');
	sort($str);
	return ($str);
}
?>
