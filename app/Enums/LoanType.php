<?php

namespace App\Enums;

enum LoanType: string
{
    case PERSONAL = 'PERSONAL';
    case GUARANTEED = 'GUARANTEED';
    case CONSIGNMENT = 'CONSIGNMENT';

    public function interestRate(): int
    {
        return match ($this) {
            self::PERSONAL => 4,
            self::GUARANTEED => 3,
            self::CONSIGNMENT => 2,
        };
    }
}
