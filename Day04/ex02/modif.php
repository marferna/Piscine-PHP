<?php
$login = $_POST['login'];
$oldpw = $_POST['oldpw'];
$newpw = $_POST['newpw'];
$submit = $_POST['submit'];

if ($login === NULL || $oldpw === NULL || $newpw === NULL || $submit != 'OK')
	exit ("ERROR\n");

$newpwhash = hash('whirlpool', $newpw);
$oldpwhash = hash('whirlpool', $oldpw);
$lecture = file_get_contents("../private/passwd");
$compte2 = unserialize($lecture);
foreach ($compte2 as $i => $element)
{
	if ($login === $element['login'] && $oldpwhash === $element['passwd'])
	{
		$compte2[$i]['passwd'] = $newpwhash;
		$donnee = serialize($compte2);
		file_put_contents("../private/passwd", $donnee);
		exit ("OK\n");
	}
}
exit ("ERROR\n");
?>
