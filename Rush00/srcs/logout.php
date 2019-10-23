<?php
session_start();
if (isset($_COOKIE['loggued_on_user']))
{
	setcookie($_COOKIE['loggued_on_user'], "", time()-3600, '/', '', false, false);
}
session_destroy();
header("location: ../index.php");
?>
