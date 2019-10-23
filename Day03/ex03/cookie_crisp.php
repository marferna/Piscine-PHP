<?php
$action = $_GET['action'];
$name = $_GET['name'];
$value = $_GET['value'];

if ($action == 'set')
	setcookie($name, $value, time() + 1*24*3600);
if ($action == 'get')
	echo $_COOKIE[$name];
if ($action == 'del')
	setcookie($name, NULL, time() -1);
?>
