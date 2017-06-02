<?php

namespace Chicfy\Core\Validator;

use Chicfy\Model\Contact;
use Chicfy\Core\Exception\ValidationException;

class ContactValidator
{
    const PHONE_LENGTH = 9;

    public function validate($contact)
    {
        $errors = [];
        $this->addError($this->isValidObject($contact), $errors);
        $this->addError($this->isValidName($contact), $errors);
        $this->addError($this->isEmptyPhone($contact), $errors);
        $this->addError($this->isValidPhoneLength($contact), $errors);
        $this->addError($this->isNumericPhone($contact), $errors);
        if(!empty($errors)){
            throw new ValidationException($errors);
        }
    }

    private function isValidObject($contact)
    {
        if(!$contact instanceof Contact){
            return "Objeto contacto inválido";
        } else {
            return null;
        }
    }

    private function isValidName($contact)
    {
        $contactName = trim($contact->getName());
        if(empty($contactName)){
            return "El nombre está vacío";
        } else {
            return null;
        }
    }

    private function isEmptyPhone($contact)
    {
        $phone = trim($contact->getPhone());
        if(empty($phone)){
            return "El teléfono está vacío";
        } else {
            return null;
        }
    }

    private function isValidPhoneLength($contact)
    {
        $phone = trim($contact->getPhone());
        if(strlen($phone) != self::PHONE_LENGTH){
            return "El teléfono no tiene una longitud de " . self::PHONE_LENGTH . " caracteres";
        } else {
            return null;
        }
    }

    private function isNumericPhone($contact)
    {
        $phone = trim($contact->getPhone());
        if(!is_numeric($phone)){
            return "El teléfono no es numérico";
        } else {
            return null;
        }
    }

    private function addError($error, &$errors)
    {
        if(isset($error)){
            $errors[] = $error;
        }
    }
}
