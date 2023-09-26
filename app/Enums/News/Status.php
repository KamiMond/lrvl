<?php

namespace App\Enums\News;

enum Status: string
{
    case DRAFT = 'DRAFT';
    case ACTIVE = 'ACTIVE';
    case BLOCKED = 'BLOCKED';

    public static function getEnums(): array
    {
        return [
            self::DRAFT->value,
            self::ACTIVE->value,
            self::BLOCKED->value
        ];
    }
}
