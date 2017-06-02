<?php

namespace Chicfy\Core\Service;

use Chicfy\Core\Validator\ContactValidator;

class ContactService
{
    private $contactValidator;
    private $contactRepository;

    function __construct($repository)
    {
        $this->contactValidator = new ContactValidator;
        $this->contactRepository = $repository;
    }

    public function add($contact)
    {
        $this->contactValidator->validate($contact);
        $this->contactRepository->save($contact);
    }

    public function list()
    {
        return $this->contactRepository->list();
    }
}
