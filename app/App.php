<?php

include_once(dirname(__FILE__) . "/autoload.php");

use Chicfy\Core\Service\ContactService;
use Chicfy\Core\Dao\ContactDAO;
use Chicfy\Model\Contact;

class App
{
    private $contactService;

    function __construct()
    {
        $this->contactService = new ContactService(new ContactDAO);
    }

    public function execute()
    {
        while(true)
        {
            $contacts = $this->contactService->list();
            $this->printContacts($contacts);

            $name = readline("Name: ");
            $phone = readline("Phone: ");
            $contact = new Contact($name, $phone);

            try {
                $this->contactService->add($contact);
            } catch(Exception $e){
                $this->printErrors($e->getErrors());
            }
        }
    }

    private function printErrors($errors)
    {
        if(!empty($errors)){
            echo "Errores: " . count($errors) . "\n";
            foreach($errors as $error){
                $this->printError($error);
            }
            echo "\n\n";
        }
    }

    private function printError($error)
    {
        echo "- " . $error . "\n";
    }

    private function printContacts($contacts)
    {
        echo "AGENDA\n";
        if(empty($contacts)){
            echo "vacía\n";
        } else {
            foreach($contacts as $contact){
                $this->printContact($contact);
            }
        }
        echo "\n\n";
    }

    private function printContact($contact)
    {
        echo $contact->getName() . ": " . $contact->getPhone() . "\n";
    }

}

(new App)->execute();
