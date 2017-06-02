<?php

namespace Chicfy\Core\Dao;

class ContactDAO
{
    private $contactsList;

    function __construct()
    {
        $this->contactsList = array();
    }

    public function list()
    {
        return $this->contactsList;
    }

    public function save($contact)
    {
        $this->contactsList[] = $contact;
    }
}
