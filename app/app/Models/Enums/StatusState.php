<?php

namespace App\Models\Enums;

enum StatusState: string
{
    case ACTIVE = 'active';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';
}
