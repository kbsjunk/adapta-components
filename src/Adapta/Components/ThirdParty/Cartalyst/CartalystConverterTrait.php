<?php namespace Adapta\Components\ThirdParty\Cartalyst;

use Adapta\Components\ThirdParty\Cartalyst\CartalystConverterFactory;
use Cartalyst\Converter\Converter;

trait CartalystConverterTrait
{
	public function getFactory()
	{
		return $this->factory;
	}

	public function setFactory(CartalystConverterFactory $factory)
	{
		$this->factory = $factory;
	}

	public function getConverter()
	{
		return $this->getFactory()->getConverter();
	}

	public function setConverter(Converter $converter)
	{
		$factory = $this->getFactory();
		$factory->setConverter($converter);
		$this->setFactory($factory);
	}
}