<?php namespace Adapta\Components\Validators\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class AcnException extends ValidationException
{
    public static $defaultTemplates = array(
        self::MODE_DEFAULT => array(
            self::STANDARD => '{{name}} must be an ACN',
        ),
        self::MODE_NEGATIVE => array(
            self::STANDARD => '{{name}} must not be an ACN',
        )
    );
}