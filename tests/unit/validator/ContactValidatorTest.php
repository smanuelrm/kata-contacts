<?php

use PHPUnit\Framework\TestCase;

use Chicfy\Core\Validator\ContactValidator;
use Chicfy\Model\Contact;

class ContactValidatorTest extends TestCase
{
    private $contactValidator;

    public function setup()
    {
        $this->contactValidator = new ContactValidator;
    }

    /**
     * @dataProvider validContactProvider
     */
    public function testValidateContact($contact)
    {
        try {
            $this->contactValidator->validate($contact);
        } catch(Exception $e){
            $this->assertFalse(true);
        }
    }

    /**
     * @dataProvider invalidContactProvider
     */
    public function testInvalidateContact($contact)
    {
        try {
            $this->contactValidator->validate($contact);
        } catch(Exception $e){
            $this->assertTrue(true);
        }
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
