#!/usr/bin/php
<?php
if ($argc != 1)
{
	$tmp = preg_replace("/\s+/" , " ", $argv[1]);
	$str = trim($tmp);
	echo $str;
	echo "\n";
}
?>
