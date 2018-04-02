<?php

namespace App\Calculator;


use DateTime;

interface CalculatorInterface
{

    public const SLEEP_CYCLE = 90; //in Minutes

    public function setAsleepTime(DateTime $time): void;

    public function getAsleepTime(): DateTime;

    public function setWakeTime(DateTime $time): void;

    public function getWakeTime(): DateTime;

    public function calculate(): void;

    public function getCalculation(): DateTime;
}