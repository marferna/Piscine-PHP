#!/usr/bin/php
<?php
$str = array();
$tab = array();

foreach ($argv as $element)
{
	if ($element != $argv[0])
	{
		trim($element);
		$tmp = preg_split("/ +/", $element);
		$str = array_merge($str, $tmp);
	}
}
natcasesort($str);
foreach ($str as $element)
{
	if (ctype_alpha($element))
		array_push($tab, $element);
}
sort($str, SORT_STRING);
foreach ($str as $element)
{
	if (ctype_digit($element))
		array_push($tab, $element);
}
foreach ($str as $element)
{
	if (!ctype_digit($element) && !ctype_alpha($element))
		array_push($tab, $element);
}
foreach ($tab as $element)
	echo "$element\n";
?>
