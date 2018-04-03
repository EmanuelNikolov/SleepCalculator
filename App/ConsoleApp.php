<?php

namespace App;


use App\Calculators\CalculatorInterface;
use App\Calculators\Go2BedNowCalculator;
use App\IO\IOInterface;
use DateTime;
use DateTimeZone;

class ConsoleApp implements ApplicationInterface
{

    private const CONSOLE_PROMPT =
      "Press Enter to calculate when to get up if you go to bed now";

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
        $this->inputData();
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

    public function inputData(): void
    {
        $this->io->write(self::CONSOLE_PROMPT);
        $this->io->read();
    }

    public function processData(): void
    {
        $currentTimeZone = new DateTimeZone('Europe/Sofia');
        $dateTime = new DateTime('now', $currentTimeZone);
        $this->calculator = new Go2BedNowCalculator($dateTime);
    }

    public function outputData(): string
    {
        $wakeUpTime = $this->calculator->getWakeTime()->format('H:i');

        return "You should get up at {$wakeUpTime}";
    }
}