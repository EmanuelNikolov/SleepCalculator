<?php

namespace App\Calculators;


use DateInterval;
use DateTime;

class Go2BedNowCalculator implements CalculatorInterface
{

    public const RECOMMENDED_SLEEP_CYCLES = 5;

    /**
     * @var DateTime
     */
    private $asleepTime;

    /**
     * @var DateTime
     */
    private $wakeTime;

    private $timeAsleep;

    public function __construct(DateTime $startTime)
    {
        $this->setAsleepTime($startTime);
        $this->calculate();
    }

    public function setAsleepTime(DateTime $time): void
    {
        $this->asleepTime = $time;
    }

    public function getAsleepTime(): DateTime
    {
        return $this->asleepTime;
    }

    public function setWakeTime(DateTime $time): void
    {
        $this->wakeTime = $time;
    }

    public function getWakeTime(): DateTime
    {
        return $this->wakeTime;
    }

    public function calculate(): void
    {
        $sleepInterval =
          CalculatorInterface::SLEEP_CYCLE * self::RECOMMENDED_SLEEP_CYCLES;

        $sleepIntervalFinal =
          CalculatorInterface::FALL_ASLEEP_TIME + $sleepInterval;

        $tempTime = $this->asleepTime;
        $tempTime->add(new DateInterval("PT{$sleepIntervalFinal}M"));
        $this->setWakeTime($tempTime);
        $this->timeAsleep = $tempTime->diff($this->asleepTime);
    }

    public function getTimeAsleep(): DateTime
    {
        return $this->timeAsleep;
    }
}