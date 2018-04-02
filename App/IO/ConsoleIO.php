<?php

namespace App\IO;


class ConsoleIO implements IOInterface
{

    public function read(): string
    {
        return trim(fgets(STDIN));
    }

    public function write(string $text): void
    {
        echo $text;
    }
}