<?php
$login = $_POST['login'];
$passwd = $_POST['passwd'];
$submit = $_POST['submit'];

if ($login === NULL || $passwd === NULL || $submit != 'OK')
{
	header("Location: index.html");
	exit ("ERROR\n");
}
$start = 0;
$passwdhash = hash('whirlpool', $passwd);
if (file_exists("../private/") === FALSE)
	mkdir("../private");
$compte = array(array('login' => $login, 'passwd' => $passwdhash));
if (file_exists("../private/passwd") === FALSE)
	$start = 1;
else
{
	$lecture = file_get_contents("../private/passwd");
	$compte2 = unserialize($lecture);
	foreach ($compte2 as $element)
	{
		if ($login === $element['login'] && $start == 0)
			return (print("ERROR\n"));

	}
}
$compte2[] = [
	'login'=> $login,
	'passwd'=> $passwdhash
];
$donnee = serialize($compte2);
file_put_contents("../private/passwd", $donnee);
header("Location: index.html");
echo "OK\n";
?>
