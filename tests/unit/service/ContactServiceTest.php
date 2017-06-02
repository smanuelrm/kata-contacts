<?php

use PHPUnit\Framework\TestCase;

use Chicfy\Core\Dao\ContactDAO;
use Chicfy\Core\Service\ContactService;
use Chicfy\Model\Contact;
use Chicfy\Test\Mock\Dao\ContactDAOMock;

class ContactServiceTest extends TestCase
{
    private $contactService;

    public function setup()
    {
        $this->contactService = new ContactService(new ContactDAO);
    }

    /**
     * @dataProvider validContactProvider
     */
    public function testAddValidContact($contact)
    {
        try {
            $this->contactService->add($contact);
        } catch(Exception $e){
            $this->assertFalse(true);
        }
        $this->assertFalse(empty($this->contactService->list()));
    }

    /**
     * @dataProvider validContactProvider
     */
    public function testAddInvalidContact($contact)
    {
        try {
            $this->contactValidator->validate($contact);
        } catch(Exception $e){
            $this->assertTrue(true);
        }
        $this->assertTrue(empty($this->contactService->list()));
    }

    public function validContactProvider()
    {
        return [
            [new Contact("Manu", "123456789")],
            [new Contact("Manu", 123456789)],
        ];
    }

    public function invalidContactProvider()
    {
        return [
            [new Contact("", "123456789")],
            [new Contact("", "12345a678")],
            [new Contact("", 123456789)],
            [new Contact("", 1234567890)],
            [new Contact("", 1.2)],
            [new Contact("", null)],
            [new Contact("")],
            [new Contact(null)],
            [new Contact(null, null)],
            [new Contact("Manu", "")],
            [new Contact("", "")],
            [new Contact()],
        ];
    }

}
