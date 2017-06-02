<?php

namespace Chicfy\Model;

class Contact
{
    private $name;
    private $phone;

    function __construct($name = null, $phone = null)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}
