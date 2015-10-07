<?php namespace Adapta\Components\Validators\Rules;

use Respect\Validation\Rules\AbstractRule;

class Abn extends AbstractRule
{
	// http://www.clearwater.com.au/code/abn
	public function validate($input)
	{
		$weights = array(10, 1, 3, 5, 7, 9, 11, 13, 15, 17, 19);
		
    	// strip anything other than digits
		$input = preg_replace("/[^\d]/","",$input);
		
    	// check length is 11 digits
		if (strlen($input)==11) {
        	// apply ato check method 
			$sum = 0;
			foreach ($weights as $position=>$weight) {
				$digit = $input[$position] - ($position ? 0 : 1);
				$sum += $weight * $digit;
			}
			return ($sum % 89)==0;
		} 
		return false;
	}

}