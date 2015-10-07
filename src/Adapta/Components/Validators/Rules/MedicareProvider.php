<?php namespace Adapta\Components\Validators\Rules;

use Respect\Validation\Rules\AbstractRule;

class MedicareProvider extends AbstractRule
{

//   ValidateMedicareinput
//     Checks medicare provider number for validity
//     using the published checksum algorithm.
//     Returns: true if the number is valid, false otherwise.
// 
//   Note - this allows for a leading 0 to be dropped, 
//     reducing the 6-digit stem to 5 digits.
//
//      Source: http://www.clearwater.com.au/code
//      Author: Guy Carpenter
//     License: The author claims no rights to this code.
//              Use it as you wish.
	
	function validate($input)
	{
    /*
     * The Medicare provider number comprises:
     *  - six digits (provider stem)
     *  -  a practice location character (one alphanum char)
     *  -  a check-digit (one alpha character)
     */
    
    $locTable = '0123456789ABCDEFGHJKLMNPQRTUVWXY';
    $checkTable = 'YXWTLKJHFBA';
    $weights = array(3,5,8,4,2,1);
    $re = "/^(\d{5,6})([{$locTable}])([{$checkTable}])$/";
    
    $input = preg_replace("/[^\dA-Z]/", 
    	"",
    	strtoupper($input));
    if (preg_match($re, $input, $matches)) {
    	$stem = $matches[1];
    	
        // accommodate dropping of leading 0 
    	if (strlen($stem)==5) $stem="0".$stem;  
    	
    	$location = $matches[2];
    	$checkDigit = $matches[3][0];
    	
        // IMPORTANT - letters I, O, S and Z are not included 
        // Some documentation incorrectly removes the digit 1.
    	$plv = strpos($locTable, $location);
    	$sum = $plv * 6;
    	
    	foreach ($weights as $position=>$weight) {
    		$sum += $stem[$position] * $weight;
    	}
    	
    	if ($checkDigit == $checkTable[$sum % 11]) {
    		return true;
    	}
    }
    return false;
}
}