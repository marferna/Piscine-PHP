<?php
function auth($login, $passwd)
{
	$compte = file_get_contents("../private/passwd");
	$content = unserialize($compte);
	$pwhash = hash('whirlpool', $passwd);
	foreach ($content as $element)
	{
		if ($login === $element['login'] && $pwhash === $element['passwd'])
			return (TRUE);
	}
	return (FALSE);
}
?>
