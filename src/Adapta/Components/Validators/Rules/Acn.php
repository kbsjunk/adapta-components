<?php namespace Adapta\Components\Validators\Rules;

use Respect\Validation\Rules\AbstractRule;

class Acn extends AbstractRule
{
	// http://www.clearwater.com.au/code/acn
	public function validate($input)
	{
		$weights = array(8,7,6,5,4,3,2,1);
		
    	// strip anything other than digits
		$input = preg_replace("/[^\d]/","",$input);
		
    	// check length is 9 digits
		if (strlen($input)==9) {
        // apply ato check method 
			$sum = 0;
			foreach ($weights as $position=>$weight) {
				$sum += $weight * $input[$position];
			}
			$check = (10 - ($sum % 10)) % 10;
			return $input[8] == $check;
		} 
		return false;
	}
}