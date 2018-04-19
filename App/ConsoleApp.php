<?php

namespace App;


use App\Calculators\CalculatorInterface;
use App\Calculators\Calculator;
use App\IO\IOInterface;
use DateTime;
use DateTimeZone;

class ConsoleApp implements ApplicationInterface
{

    /**
     * @var CalculatorInterface
     */
    private $calculator;

    /**
     * @var IOInterface
     */
    private $io;

    public function __construct(IOInterface $IO)
    {
        $this->io = $IO;
    }

    public function start(): void
    {
        $this->processData();
        $this->outputData();
    }

    public function getCalculator(): CalculatorInterface
    {
        return $this->calculator;
    }

    public function getIO(): IOInterface
    {
        return $this->io;
    }

    public function processData(): void
    {
        $this->io->write($this->io->getPrompt());
        $sleepCycles = intval($this->io->read());

        $currentTimeZone = new DateTimeZone('Europe/Sofia');
        $dateTime = new DateTime('now', $currentTimeZone);
        $this->calculator = new Calculator($dateTime, $sleepCycles);
    }

    public function outputData(): void
    {
        $wakeUpTime = $this->calculator->getWakeTime()->format('H:i');

        $this->io->write("You should get up at {$wakeUpTime}");
    }
}