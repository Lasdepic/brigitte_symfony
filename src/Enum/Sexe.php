<?php

namespace App\Enum;

enum Sexe: string
{
    case MASCULIN = 'M';
    case FEMININ = 'F';

    public function label(): string
    {
        return match ($this) {
            self::MASCULIN => 'Masculin',
            self::FEMININ => 'Féminin',
        };
    }
}
