<?php

use AutovermietungPHP\Controller\HomeController;
ini_set('display_errors', 1);

require_once __DIR__ . '/config/Environment.php';
require_once __DIR__ . '/autoload.php';
// require_once __DIR__ . '/Routes/Routes.php';
require_once __DIR__ . '/Database/Database.php';
require_once __DIR__ . '/Model/Car.php';
require_once __DIR__ . '/Library/View.php';
require_once __DIR__ . '/Controller/HomeController.php';

new HomeController();
