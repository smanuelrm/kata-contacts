<?php

namespace Chicfy\Test\Mock\Dao;
use Chicfy\Core\Dao\ContactDAO;

class ContactDAOMock extends ContactDAO
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
