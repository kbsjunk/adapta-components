<?php namespace Adapta\Components\Converters;

use Cartalyst\Converter\Converter;
use Cartalyst\Converter\Exchangers\NativeExchanger;

abstract class AbstractCartalystConverter implements ConverterInterface
{
	protected $converter;
	protected $name;
	protected $from;
	protected $to;

	public function __construct($from, $to)
	{
		$this->name = strtolower(str_replace(['Adapta\\Components\\Converters\\','Converter'], '', get_class($this)));
		$this->from = $from;
		$this->to = $to;
		$config = require dirname(__FILE__).'/../../../config/cartalyst-converter.php';
		$this->converter = new Converter(new NativeExchanger);
		$this->converter->setMeasurements($config['measurements']);
	}
	
	public function convert($input)
	{
		return $this->converter->from($this->name.'.'.$this->from)->to($this->name.'.'.$this->to)->convert($input)->getValue();
	}
}