<?php
declare(strict_types=1);

use App\ConsoleApp;
use App\IO\ConsoleIO;

spl_autoload_register(function ($class) {
    require_once "{$class}.php";
});

$consoleIO = new ConsoleIO();
$consoleApp = new ConsoleApp($consoleIO);
$consoleApp->start();