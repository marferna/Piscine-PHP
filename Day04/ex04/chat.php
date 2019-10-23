<?php
session_start();
date_default_timezone_set("Europe/Paris");

if ($_SESSION['loggued_on_user'])
{
	if (file_exists("../private/chat"))
	{
		$lecture = file_get_contents("../private/chat");
		$compte = unserialize($lecture);
		foreach ($compte as $key)
		{
			echo "[";
			echo date("H:i", $key['time']);
			echo "] ";
			echo "<b>";
			echo $key['login'];
			echo "</b>: ";
			echo $key['msg'];
			echo "<br />";
		}
	}
}
