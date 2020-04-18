<?php
/*
class	AppleDevice
{
	protected		$ram = "3GB";
	protected		$mem = "20GB";
	protected		$spec = 1900;
	const	YOY = 123;

	public	function set_ram($ram, $mem, $spec)
	{
		$this->ram = $ram;
		$this->mem = $mem;
		$this->spec = $spec;
	}
	public	function print_cont()
	{
		echo "YOY is = " . self::YOY;
	}
}

class	sony extends AppleDevice
{
	private		$soso = 150;
	public	function set_ram($ram = "5GB", $mem = "5GB", $spec = "5GB")
	{
		$this->ram = $ram;
		$this->mem = $mem;
		$this->spec = $spec;
		echo "here you go";
	}
}

$obj = new AppleDevice();
$soso = new sony();

$obj->set_ram("5GB", "256GB", "190$");


echo "<pre>";
print_r($obj);
echo "</pre>";
echo "<pre>";
print_r($soso);
echo "</pre>";

$obj->print_cont();


$soso->set_ram();
*/

// abstraction
/*abstract class prof
{
	abstract	function goto();
}

class	student extends prof
{
	function goto()
	{
		echo "Hello World..!";
	}
}*/

// polymorphism
/*interface	inter
{
	function	ito();
	function	gogo();
}

class	kiri implements inter
{
	function	ito()
	{
		echo "test 1 1 ..!";
	}
	function	gogo()
	{
		echo "test 2 2 ..!";
	}
}*/

