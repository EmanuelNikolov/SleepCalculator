<?php

namespace App\Calculators;


use DateTime;

interface CalculatorInterface
{

    public const SLEEP_CYCLE = 90; //in Minutes

    public const FALL_ASLEEP_TIME = 15; //in Minutes

    public function setAsleepTime(DateTime $time): void;

    public function getAsleepTime(): DateTime;

    public function setWakeTime(DateTime $time): void;

    public function getWakeTime(): DateTime;

    public function calculate(): void;

    public function getTimeAsleep(): DateTime;
}