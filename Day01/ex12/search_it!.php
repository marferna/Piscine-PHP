#!/usr/bin/php
<?php
$key = $argv[1].":";
$i = 2;
$keylen = strlen($key);

while ($argv[$i])
{
	if (strpos($argv[$i], "$key") === 0)
		$value = substr($argv[$i], $keylen);
	$i++;
}
if ($value)
	echo "$value\n";
?>
