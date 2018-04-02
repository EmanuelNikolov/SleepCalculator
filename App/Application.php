<?php

namespace App;


use App\IO\ConsoleIO;

class Application
{

    private $calculator;

    private $io;

    public function __construct($calculator, ConsoleIO $io)
    {
        $this->calculator = $calculator;
        $this->io = $io;
    }

    public function start(): void
    {

    }
}