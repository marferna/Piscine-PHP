#!/usr/bin/php
<?php
$i = 0;
$str = array();

$tmp = trim($argv[1]);
$str = preg_split("/ +/", $tmp);
foreach ($str as $element)
{
	if ($i != 0)
		echo "$element ";
	$i++;
}
if ($argc > 1)
	echo "$str[0]\n";
?>
