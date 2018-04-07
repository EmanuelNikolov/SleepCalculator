<?php

namespace App;


use App\Calculators\CalculatorInterface;
use App\Calculators\Calculator;
use App\IO\IOInterface;
use DateTime;
use DateTimeZone;

class ConsoleApp implements ApplicationInterface
{

    private const CONSOLE_PROMPT =
      "On the next line input desired number of sleep cycles!" .
      "(if omitted, default value of 5 will be used";

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
        $this->io->write($this->outputData());
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
        $this->io->write(self::CONSOLE_PROMPT);
        $sleepCycles = intval($this->io->read());

        $currentTimeZone = new DateTimeZone('Europe/Sofia');
        $dateTime = new DateTime('now', $currentTimeZone);
        $this->calculator = new Calculator($dateTime, $sleepCycles);
    }

    public function outputData(): string
    {
        $wakeUpTime = $this->calculator->getWakeTime()->format('H:i');

        return "You should get up at {$wakeUpTime}";
    }
}