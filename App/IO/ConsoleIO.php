<?php

namespace App\IO;


class ConsoleIO implements IOInterface
{

    public const PROMPT =
      "On the next line input desired number of sleep cycles!" .
      "(if omitted, default value of 5 will be used";

    public function read(): string
    {
        return trim(fgets(STDIN));
    }

    public function write(string $text): void
    {
        echo $text . PHP_EOL;
    }

    public function getPrompt(): string
    {
        return self::PROMPT;
    }
}