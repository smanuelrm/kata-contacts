<?php

namespace Chicfy\Core\Exception;
use Exception;

class ValidationException extends Exception
{
    private $exceptions;

    function __construct($errors, $code = 0, Exception $previous = null)
    {
        $this->exceptions = $errors;
        parent::__construct(print_r($errors, true), $code, $previous);
    }

    public function getErrors()
    {
        return $this->exceptions;
    }
}
