<?php

namespace AutovermietungPHP\Controller;

use AutovermietungPHP\Model\Car\Car;
use AutovermietungPHP\Library\View;

class HomeController
{
    private array $carsToShow;
    public function __construct()
    {
        $carsToShow = new Car()->getAllCars();
        echo View::render(__DIR__ . '/../test.phtml', ['labels' => 'TESTTTTTT']);
    }
}