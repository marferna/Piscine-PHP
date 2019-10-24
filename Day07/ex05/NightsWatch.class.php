<?php
class NightsWatch implements IFighter
{
	private $arr = array();
	public function recruit($perso)
	{
		$this->arr[] = $perso;
	}
	public function fight()
	{
		foreach ($this->arr as $char)
		{
			if (method_exists($char, 'fight'))
				$char->fight();
		}
	}
}
?>
