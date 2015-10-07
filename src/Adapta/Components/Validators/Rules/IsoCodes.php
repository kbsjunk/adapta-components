<?php
namespace Adapta\Components\Validators\Rules;

use Respect\Validation\Rules\AbstractRule;
use ReflectionClass;
use ReflectionMethod;
use Respect\Validation\Exceptions\ComponentException;
class IsoCodes extends AbstractRule
{
	protected $messages = array();
	protected $params = array();
	protected $isocodesValidator;
	protected $validatorCode;
	public function __construct($validator, $params = array())
	{
		if (is_object($validator)) {
			return $this->isocodesValidator = $validator;
		}
		if (!is_string($validator)) {
			throw new ComponentException('Invalid Validator Construct');
		}
		$this->validatorCode = $validator;
		$validator = "IsoCodes\\{$validator}";
		$isocodesMirror = new ReflectionClass($validator);
		$this->isocodesValidator = $isocodesMirror->getMethod('validate');
		
		if ($this->isocodesValidator->getNumberOfParameters() > 1) {
			$this->params = $params;
		}
	}
	public function assert($input)
	{
		$validator = $this->isocodesValidator;
		$params = array_unshift($this->params, $input);
		if ($validator->invokeArgs(null, $this->params)) {
			return true;
		}

		throw $this->reportError($input, ['code' => $this->validatorCode]);
	}
	public function validate($input)
	{
		$validator = $this->isocodesValidator;
		$params = array_unshift($this->params, $input);
		if ($validator->invokeArgs(null, $this->params)) {
			return true;
		}
	}
}