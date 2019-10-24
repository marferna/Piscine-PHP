<?php
class UnholyFactory
{
	public $arr = array();
	public function absorb($name)
	{
		if ($name instanceof Fighter)
		{
			if (in_array($name, $this->arr))
				echo "(Factory already absorbed a fighter of type " . $name->getType() . ")\n";
			else
			{
				$this->arr[get_class($name)] = $name;
				echo "(Factory absorbed a fighter of type " . $name->getType() . ")\n";
			}
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)\n";
	}
	public function fabricate($rf)
	{
		foreach ($this->arr as $element => $value)
		{
			if ($value->getType() == $rf)
			{
				$fighter = clone $this->arr[$element];
				echo "(Factory fabricates a fighter of type " . $rf . ")\n";
				return $fighter;
			}
		}
		echo "(Factory hasn't absorbed any fighter of type " . $rf . ")\n";
	}
}
?>
