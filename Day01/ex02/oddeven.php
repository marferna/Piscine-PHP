#!/usr/bin/php
<?php
echo "Entrez un nombre: ";

$nbr = fgets(STDIN);
$nbr = trim($nbr);

if (feof(STDIN) === FALSE)
{
	if (is_numeric($nbr))
	{
		if ($nbr % 2 == 1)
			echo "Le chiffre $nbr est Impair";
		else if ($nbr % 2 == 0)
			echo "Le chiffre $nbr est Pair";
	}
	else
		echo "'$nbr' n'est pas un chiffre";
	echo "\n";
}
if (feof(STDIN) === TRUE)
	echo "^D\n";
?>