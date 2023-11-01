<?php

namespace App\Models\Enums;

enum MovementTypes: string
{
    //enum('selling', 'returning', 'income', 'transfer', 'write_off')
    case SELLING = 'selling';
    case RETURNING = 'returning';
    case INCOME = 'income';
    case TRANSFER = 'transfer';
    case WRITE_OFF = 'write_off';
}
