<?php namespace Adapta\Components\Validators\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class MedicareProviderException extends ValidationException
{
    public static $defaultTemplates = array(
        self::MODE_DEFAULT => array(
            self::STANDARD => '{{name}} must be a Medicare Provider number',
        ),
        self::MODE_NEGATIVE => array(
            self::STANDARD => '{{name}} must not be a Medicare Provider number',
        )
    );
}