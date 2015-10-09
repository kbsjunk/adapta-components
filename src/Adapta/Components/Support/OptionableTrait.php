<?php namespace Adapta\Components\Support;

trait OptionableTrait
{
	protected $options = [];
	
	public function __construct($options = [])
	{
		$this->options = $options;
	}
	
	public function getOption($option)
	{
		return isset($this->options[$option]) ? $this->options[$option] : null;
	}
	
	public function getOptions()
	{
		return $this->options;
	}
	
	public function setOption($option, $value)
	{
		$this->options[$option]  = $value;
	}
	
	public function setOptions($options)
	{
		$this->options = array_merge($this->options, $options);
	}
}