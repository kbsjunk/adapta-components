<?php namespace Adapta\Components\Formatters;

use Temperature\Factory\DefaultFactory as TemperatureFactory;

class TemperatureFormatter implements FormatterInterface
{
	protected $factory;
	protected $format;

	public function __construct($format)
	{
		$this->factory = new TemperatureFactory();
		$this->factory->getFormatter()->setShowSymbolMode(true);
		$this->format = ucfirst($format);
	}

	public function format($input)
	{
		$temperature = $this->factory->build($input, $this->format);
		return $temperature->convert($this->format);
	}
}