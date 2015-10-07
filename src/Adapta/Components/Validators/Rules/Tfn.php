<?php namespace Adapta\Components\Validators\Rules;

use Respect\Validation\Rules\AbstractRule;

class Tfn extends AbstractRule
{
	// http://www.clearwater.com.au/code/abn
	public function validate($input)
	{
		$weights = array(1, 4, 3, 7, 5, 8, 6, 9, 10);
		
    	// strip anything other than digits
		$input = preg_replace("/[^\d]/","",$input);
		
    	// check length is 11 digits
		if (strlen($input)==9) {
        	// apply ato check method
			$sum = 0;
			foreach ($weights as $position=>$weight) {
				$digit = $input[$position];
				$sum += $weight * $digit;
			}
			return ($sum % 11)==0;
		} 
		return false;
	}

}