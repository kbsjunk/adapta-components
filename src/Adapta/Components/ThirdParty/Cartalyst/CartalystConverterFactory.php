<?php namespace Adapta\Components\ThirdParty\Cartalyst;

use Adapta\Components\Support\OptionableTrait;
use Cartalyst\Converter\Converter;
use Cartalyst\Converter\Exchangers\NativeExchanger;

class CartalystConverterFactory
{
	use OptionableTrait;
	
	protected $converter;
	protected $name;

	public function __construct($name, $options = [])
	{
		$this->name = $name;
		$this->options = (array) $options;
		$config = require dirname(__FILE__).'/config.php';
		$this->converter = new Converter(new NativeExchanger);
		$this->converter->setMeasurements($config['measurements']);
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getConverter()
	{
		return $this->converter;
	}
	
	public function setConverter(Converter $converter)
	{
		$this->converter = $converter;
	}

}