<?php namespace Adapta\Components\Validators\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class TfnException extends ValidationException
{
    public static $defaultTemplates = array(
        self::MODE_DEFAULT => array(
            self::STANDARD => '{{input}} must be an TFN',
        ),
        self::MODE_NEGATIVE => array(
            self::STANDARD => '{{input}} must not be an TFN',
        )
    );
}