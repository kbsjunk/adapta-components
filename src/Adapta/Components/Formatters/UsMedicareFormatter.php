<?php namespace Adapta\Components\Formatters;

class UsMedicareFormatter extends AbstractCodeFormatter implements FormatterInterface
{
	
	/*
	Accepted formats are 0-3 alpha, 9 digits, and 1-3 alpha-numeric with or without spaces and dashes:
	AAA-000-00-0000-AAA
	https://gist.github.com/jgornick/466447572cdc89e6fc9d
	/^([a-z]{0,3})[-\s]?(\d{3})[-\s]?(\d{2})[-\s]?(\d{4})[-\s]?([0-9a-z]{1,3})$/i
	*/
	
	protected $format = 'ZZZ-000-00-0000-AMM';
	
}