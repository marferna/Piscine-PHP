#!/usr/bin/php
<?php
$fichier = file_get_contents("php://stdin");
$fichier = preg_split("/[\s]+/", $fichier);
$array = [];

foreach ($fichier as $element)
{
	$array[$i] = explode(";", $element);
	$i++;
}
$k = 1;
$result = 0;
$iteration = 0;
$user = [];

if ($argv[1] == "moyenne")
{
	while ($array[$k])
	{
		if ($array[$k][2] != "moulinette" && $array[$k][1] !== NULL && ctype_digit($array[$k][1]))
		{
			$result = $result + $array[$k][1];
			$iteration++;
		}
		$k++;
	}
	$result = $result / $iteration;
	exit("$result\n");
}
$j = 1;

if ($argv[1] == "moyenne_user" || $argv[1] == "ecart_moulinette")
{
	sort($array);
	while ($array[$k])
	{
		if (in_array($array[$k][0], $user) === FALSE)
		{
			array_push($user, $array[$k][0]);
			while ($array[$j])
			{
				if (($array[$k][0] == $array[$j][0]) && ctype_digit($array[$j][1]) && $array[$j][2] != "moulinette")
				{
					$result = $result + $array[$j][1];
					$iteration++;
				}
				if (($array[$k][0] == $array[$j][0]) && $array[$j][2] == "moulinette")
					$moulinette = $array[$j][1];
				$j++;
			}
			$j = 1;
			if ($iteration > 0)
			{
				$result = $result / $iteration;
				if ($argv[1] == "ecart_moulinette")
					$result = $result - $moulinette;
				array_push($user, $result);
			}
			$result = 0;
			$iteration = 0;
		}
		$k++;
	}
	$k = 1;
	while ($user[$k])
	{
		echo ($user[$k].":");
		$k++;
		echo("$user[$k]\n");
		$k++;
	}
}
?>
