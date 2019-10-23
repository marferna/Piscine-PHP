#!/usr/bin/php
<?php
if ($argc != 2)
	exit ("Incorrect Parameters\n");

$legit = sscanf($argv[1], "%d %1[-+/%*] %d %s", $nbr1, $ope, $nbr2, $reste);

if ($legit != 3 || $reste != NULL)
	exit ("Syntax Error\n");

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
?>
