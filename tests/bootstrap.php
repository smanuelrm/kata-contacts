<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

include_once(dirname(__FILE__) . "/../src/core/dao/ContactDAO.php");
include_once(dirname(__FILE__) . "/../src/core/validator/ContactValidator.php");
include_once(dirname(__FILE__) . "/../src/core/exception/ValidationException.php");
include_once(dirname(__FILE__) . "/../src/core/service/ContactService.php");

include_once(dirname(__FILE__) . "/../src/model/Agenda.php");
include_once(dirname(__FILE__) . "/../src/model/Contact.php");

include_once(dirname(__FILE__) . "/unit/mock/ContactDAOMock.php");
