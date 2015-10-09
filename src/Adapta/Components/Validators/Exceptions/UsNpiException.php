<?php namespace Adapta\Components\Validators\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class UsNpiException extends ValidationException
{
    public static $defaultTemplates = array(
        self::MODE_DEFAULT => array(
            self::STANDARD => '{{input}} must be an NPI',
        ),
        self::MODE_NEGATIVE => array(
            self::STANDARD => '{{input}} must not be an NPI',
        )
    );
}