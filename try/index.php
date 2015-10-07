<?php
header('Content-type: text/plain');
require '../vendor/autoload.php';

//https://github.com/Respect/Validation/blob/master/docs/VALIDATORS.md
//http://symfony.com/doc/current/book/validation.html#constraints
//http://framework.zend.com/manual/current/en/index.html#zend-validator
//

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationExceptionInterface;

v::with('Adapta\\Components\\Validators\\Rules\\');

$number = '80 599 556 158';

try {
	v::abn()->assert($number);
} catch(NestedValidationExceptionInterface $exception) {
	echo $exception->getFullMessage();
}

echo PHP_EOL;

$number = '010 499 966';

try {
	v::acn()->assert($number);
} catch(NestedValidationExceptionInterface $exception) {
	echo $exception->getFullMessage();
}

echo PHP_EOL;

$number = '2428 77813 2/1';

try {
	v::medicare()->assert($number);
} catch(NestedValidationExceptionInterface $exception) {
	echo $exception->getFullMessage();
}

echo PHP_EOL;

$number = '373513414';

try {
	v::tfn()->assert($number);
} catch(NestedValidationExceptionInterface $exception) {
	echo $exception->getFullMessage();
}

echo PHP_EOL;

$number = '4024742F';

try {
	v::medicareProvider()->assert($number);
} catch(NestedValidationExceptionInterface $exception) {
	echo $exception->getFullMessage();
}

echo PHP_EOL;

$number = 'SW4 6QU';

try {
	v::postalCode('GB')->assert($number);
} catch(NestedValidationExceptionInterface $exception) {
	echo $exception->getFullMessage();
}

echo PHP_EOL;

$number = '2540';

try {
	v::postalCode('AU')->assert($number);
} catch(NestedValidationExceptionInterface $exception) {
	echo $exception->getFullMessage();
}

echo PHP_EOL;

$number = '4111111111111111';

try {
	v::sf('CardScheme', ['schemes' => 'VISA'])->assert($number);
} catch(NestedValidationExceptionInterface $exception) {
	echo $exception->getFullMessage();
}
