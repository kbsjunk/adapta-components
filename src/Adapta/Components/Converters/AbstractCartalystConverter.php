<?php namespace Adapta\Components\Converters;

use Adapta\Components\ThirdParty\Cartalyst\CartalystConverterFactory;
use Adapta\Components\ThirdParty\Cartalyst\CartalystConverterTrait;

abstract class AbstractCartalystConverter implements ConverterInterface
{
	use CartalystConverterTrait;
	
	protected $factory;

	public function __construct($from, $to)
	{
		$name = strtolower(str_replace(['Adapta\\Components\\Converters\\','Converter'], '', get_class($this)));
		$this->factory = new CartalystConverterFactory($name, compact('from', 'to'));
	}
	
	public function convert($input)
	{
		return $this->getConverter()->from($this->getFactory()->getName().'.'.$this->getFactory()->getOption('from'))->to($this->getFactory()->getName().'.'.$this->getFactory()->getOption('to'))->convert($input)->getValue();
	}
}