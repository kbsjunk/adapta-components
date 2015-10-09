<?php namespace Adapta\Components\Converters;

use Adapta\Components\Support\OptionableTrait;
use Primal\Color\Parser;

class ColorConverter implements ConverterInterface
{
	use OptionableTrait;
	
	public function __construct($format, $object = false)
	{
		$this->options = compact('format', 'object');
	}
	
	public function convert($input)
	{
		if (is_array($input)) {
			$input = "rgb({$input[0]},{$input[1]},{$input[2]})";
		}
		
		$this->parser = Parser::Parse($input);
		
		$format = $this->getOption('format');
		
		if ($format == 'array')
		{
			$output = $this->parser->toRGB();
			
			return [
				$output->red,
				$output->green,
				$output->blue,
			];
		}
		else {
			$format = strtoupper($format);
			$output = call_user_func([$this->parser, 'to'.$format]);
		}
		
		if (!$this->getOption('object')) {
			$output = $output->toCSS();
		}
		
		return $output;

	}
}