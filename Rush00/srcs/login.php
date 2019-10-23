<?php
include ('./function.php');
session_start();

$login = $_POST["login"];
$passwd = $_POST["passwd"];
$loginerror = FALSE;

if (empty($_SESSION['login']) && empty($_SESSION['password']))
	echo "Un probléme est survenue";

if (auth($login, $passwd))
{
	$_SESSION['loggued_on_user'] = $login;
	header("location: ../index.php");
}
else
{
	$_SESSION["loggued_on_user"] = NULL;
	header("location: ../index.php?request=error");
	exit();
}
?>
