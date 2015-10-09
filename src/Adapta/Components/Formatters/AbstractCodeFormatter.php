<?php namespace Adapta\Components\Formatters;

abstract class AbstractCodeFormatter
{
	protected $format;
	
	public function setFormat($format)
	{
		$this->format = $format;
	}
	
	public function getFormat()
	{
		$formats = [
			'%' => '%%',
			'A' => '%s',
			'0' => '%u',
		];
		
		return str_replace(array_keys($formats), array_values($formats), $this->format);
	}
	
	public function unformat($input)
	{
		return preg_replace('/\W/', '', $input);
	}
	
	public function format($input)
	{
		$output = $this->unformat($input);
 		$output = $this->split($output);
		
		array_unshift($output, $this->getFormat());
		
		set_error_handler(function() { /* ignore errors */ });
		$output = call_user_func_array('sprintf', $output) ?: $input;
		restore_error_handler();
		
		return $output;
	}
	
	public function split($input)
	{
		return str_split($input, 1);
	}
}