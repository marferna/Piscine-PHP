<?php
session_start();
date_default_timezone_set("Europe/Paris");

if ($_POST['submit'] === "SEND")
{
	if ($_SESSION['loggued_on_user'])
	{
		if (file_exists("../private/chat"))
		{
			$file = fopen("../private/chat", 'a+');
			flock($file, LOCK_EX || LOCK_SH);
			$compte = file_get_contents("../private/chat");
			$content = unserialize($compte);
		}
		else
		{
			file_put_contents("../private/chat", NULL);
			$file = fopen("../private/chat", 'a+');
			flock($file, LOCK_EX || LOCK_SH);
			$content = array();
		}
		$content[] = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);
		$donnee = serialize($content);
		file_put_contents("../private/chat", $donnee);
		flock($file, LOCK_UN);
		header("Location: speak.php");
		return ;
	}
}
?>
<html><head><script langage="javascript">top.frames['chat'].location = 'chat.php';</script></head>
<body>
	<form action="speak.php" method="POST">
		<input type="text" name="msg" value="">
		<input type="submit" name="submit" value="SEND">
	</form>
</body></html>
