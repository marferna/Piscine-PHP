#!/usr/bin/php
<?php
if ($argc != 4)
	exit ("Incorrect Parameters\n");

$nbr1 = trim($argv[1]);
$ope = trim($argv[2]);
$nbr2 = trim($argv[3]);

if ($argc == 4)
{
	if ($ope == "+")
		echo $nbr1 + $nbr2;
	if ($ope == "-")
		echo $nbr1 - $nbr2;
	if ($ope == "*")
		echo $nbr1 * $nbr2;
	if ($ope == "/")
		echo $nbr1 / $nbr2;
	if ($ope == "%")
		echo $nbr1 % $nbr2;
	echo "\n";
}
?>
