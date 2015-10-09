<?php namespace Adapta\Components\Formatters;

use Adapta\Components\ThirdParty\Cartalyst\CartalystConverterFactory;
use Adapta\Components\ThirdParty\Cartalyst\CartalystConverterTrait;

abstract class AbstractCartalystFormatter implements FormatterInterface
{
	use CartalystConverterTrait;
	
	protected $factory;

	public function __construct($format)
	{
		$name = strtolower(str_replace(['Adapta\\Components\\Formatters\\','Formatter'], '', get_class($this)));
		$this->factory = new CartalystConverterFactory($name, compact('format'));
	}
	
	public function format($input)
	{
		return $this->getConverter()->to($this->getFactory()->getName().'.'.$this->getFactory()->getOption('format'))->value($input)->format();
	}
	
}