<?php

namespace App\Calculator;


use DateInterval;
use DateTime;

class Go2BedNowCalculator implements CalculatorInterface
{

    public const RECOMMENDED_SLEEP_CYCLES = 6;

    /**
     * @var DateTime
     */
    private $asleepTime;

    /**
     * @var DateTime
     */
    private $wakeTime;

    /**
     * @var DateTime
     */
    private $calculation;

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
        $interval =
          CalculatorInterface::SLEEP_CYCLE * self::RECOMMENDED_SLEEP_CYCLES;

        $tempTime = $this->asleepTime;
        $tempTime->add(new DateInterval("PT{$interval}M"));
        $this->setWakeTime($tempTime);
    }

    public function getCalculation(): DateTime
    {
        return $this->calculation;
    }
}