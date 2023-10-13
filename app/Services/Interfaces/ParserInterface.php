<?php

namespace App\Services\Interfaces;

use Illuminate\View\View;

interface ParserInterface
{
    public function setLink(string $link): ParserInterface;

    public function saveParseData(): void;
}
