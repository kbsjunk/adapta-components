<?php namespace Adapta\Components\Formatters;

use Cartalyst\Converter\Converter;
use Cartalyst\Converter\Exchangers\NativeExchanger;

abstract class AbstractCartalystFormatter implements FormatterInterface
{
	protected $converter;
	protected $name;
	protected $format;

	public function __construct($format)
	{
		$this->name = strtolower(str_replace(['Adapta\\Components\\Formatters\\','Formatter'], '', get_class($this)));
		$this->format = $format;
		$config = require dirname(__FILE__).'/../../../config/cartalyst-converter.php';
		$this->converter = new Converter(new NativeExchanger);
		$this->converter->setMeasurements($config['measurements']);
	}
	
	public function format($input)
	{
		return $this->converter->to($this->name.'.'.$this->format)->value($input)->format();
	}
}