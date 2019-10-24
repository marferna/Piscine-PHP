<?php
abstract class Lannister
{
	public function sleepWith($name)
	{
		if ($name instanceof Lannister)
			echo "Not even if I'm drunk !\n";
		else
			echo "Let's do this.\n";
	}
}
?>
