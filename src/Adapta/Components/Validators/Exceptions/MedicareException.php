<?php namespace Adapta\Components\Validators\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class MedicareException extends ValidationException
{
    public static $defaultTemplates = array(
        self::MODE_DEFAULT => array(
            self::STANDARD => '{{input}} must be a Medicare number',
        ),
        self::MODE_NEGATIVE => array(
            self::STANDARD => '{{input}} must not be a Medicare number',
        )
    );
}