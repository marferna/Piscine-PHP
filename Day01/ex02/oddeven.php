#!/usr/bin/php
<?php
while (1)
{
	echo "Entrez un nombre: ";

	$nbr = fgets(STDIN);
	$nbr = trim($nbr);

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
	if (feof(STDIN) === TRUE)
		exit ("\n");
}
?>
