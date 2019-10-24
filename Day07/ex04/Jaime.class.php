<?php
require_once('Lannister.class.php');

class Jaime extends Lannister
{
	public function sleepWith($name)
	{
		if ($name instanceof Cersei)
			echo "With pleasure, but only in a tower in Winterfell, then.\n";
		else if ($name instanceof Lannister)
			echo "Not even if I'm drunk !\n";
		else
			echo "Let's do this.\n";
	}
}
?>
