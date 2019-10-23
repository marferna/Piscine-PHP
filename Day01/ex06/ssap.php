#!/usr/bin/php
<?php
$str = array();

foreach ($argv as $element)
{
	if ($element != $argv[0])
	{
		trim($element);
		$tmp = preg_split("/ +/", $element);
		$str = array_merge($str, $tmp);
	}
}
sort($str);
foreach ($str as $element)
	echo "$element\n";
?>
