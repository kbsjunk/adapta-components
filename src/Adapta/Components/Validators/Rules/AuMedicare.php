<?php namespace Adapta\Components\Validators\Rules;

use Respect\Validation\Rules\AbstractRule;

class AuMedicare extends AbstractRule
{
	// http://www.clearwater.com.au/code/medicare
	public function validate($input)
	{
		$input = preg_replace("/[^\d]/", "", $input);
		
	    // Check for 11 digits
		$length = strlen($input);
		
		if ($length==11 || $length == 10) {
    	    // Test checksum
			if (preg_match("/^(\d{8})(\d)/", $input, $matches)) {
				$base = $matches[1];
				$checkDigit = $matches[2];
				$sum = 0;
				$weights = array(1,3,7,9,1,3,7,9);
				foreach ($weights as $position=>$weight) {
					$sum += $base[$position] * $weight;
				}
				return ($sum % 10) == intval($checkDigit);
			}
		}
		return false;
	}
}