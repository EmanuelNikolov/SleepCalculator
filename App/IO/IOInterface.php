<?php

namespace App\IO;


interface IOInterface
{

    public function read(): string;

    public function write(string $text): void;
}