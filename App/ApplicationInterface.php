<?php

namespace App;


use App\Calculators\CalculatorInterface;
use App\IO\IOInterface;

interface ApplicationInterface
{

    public function __construct(IOInterface $IO);

    public function start(): void;

    public function getCalculator(): CalculatorInterface;

    public function getIO(): IOInterface;

    public function inputData(): void;

    public function processData(): void;

    public function outputData(): string;
}