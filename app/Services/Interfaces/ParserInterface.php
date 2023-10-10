<?php

namespace App\Services\Interfaces;

interface ParserInterface
{
    public function setLink(string $link): ParserInterface;

    public function saveParseData(): array;
}
