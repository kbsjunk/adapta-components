<?php namespace Adapta\Components\Validators\Rules;

use Respect\Validation\Rules\Sf;

class UsNpi extends Sf
{
 	// https://en.wikipedia.org/wiki/National_Provider_Identifier // 80840
	
	public function __construct($params = array())
    {
        parent::__construct('Luhn', $params);
    }
	
	public function validate($input)
	{
		$input = '80840'.$input;
		return parent::validate($input);
	}
	
	public function assert($input)
	{		
		if($this->validate($input))
		{
			return true;
		}
		throw $this->reportError($input);
	}
}