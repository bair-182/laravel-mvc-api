<?php

namespace App\Models\Enums;


/**
 * статус заказа
 */
enum StatusState: string
{
    case ACTIVE = 'active';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';
}
