<?php namespace Adapta\Components\Converters;

use Temperature\Factory\DefaultFactory as TemperatureFactory;

class TemperatureConverter implements ConverterInterface
{
	protected $factory;
	protected $from;
	protected $to;

	public function __construct($from, $to)
	{
		$this->factory = new TemperatureFactory();
		$this->factory->getFormatter()->setShowSymbolMode(false);
		$this->from = ucfirst($from);
		$this->to = ucfirst($to);
	}

	public function convert($input)
	{
		$temperature = $this->factory->build($input, $this->from);
		return $temperature->convert($this->to);
	}
}