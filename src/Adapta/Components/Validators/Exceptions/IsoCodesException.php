<?php namespace Adapta\Components\Validators\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class IsoCodesException extends ValidationException
{
    public static $defaultTemplates = array(
        self::MODE_DEFAULT => array(
            self::STANDARD => '{{name}} must be a {{code}}',
        ),
        self::MODE_NEGATIVE => array(
            self::STANDARD => '{{name}} must not be a {{code}}',
        )
    );
}