<?php
abstract class House
{
	public function introduce()
	{
		echo "House " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : " . '"' . $this->getHouseMotto() . '"' . "\n";
	}
	abstract public function getHouseName();
	abstract public function getHouseMotto();
	abstract public function getHouseSeat();
}
?>
