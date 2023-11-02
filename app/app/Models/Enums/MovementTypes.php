<?php

namespace App\Models\Enums;

/**
 * типы движения товаров
 *
 * Движение - любое изменение количества товара на остатке склада.
 */
enum MovementTypes: string
{
    //enum('selling', 'returning', 'income', 'transfer', 'write_off')
    case SELLING = 'selling';
    case RETURNING = 'returning';
    case INCOME = 'income';
    case TRANSFER = 'transfer';
    case WRITE_OFF = 'write_off';
}
